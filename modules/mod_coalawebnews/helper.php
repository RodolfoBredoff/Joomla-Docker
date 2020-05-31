<?php

/**
 * @package     Joomla
 * @subpackage  CoalaWeb News
 * @author      Steven Palmer <support@coalaweb.com>
 * @link        https://coalaweb.com/
 * @license     GNU/GPL V3 or later; https://www.gnu.org/licenses/gpl-3.0.html
 * @copyright   Copyright (c) 2020 Steven Palmer All rights reserved.
 *
 * CoalaWeb News is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 */

defined("_JEXEC") or die("Restricted access");

use Joomla\Utilities\ArrayHelper;
use Joomla\String\StringHelper;

jimport('joomla.filesystem.file');

$com_path = JPATH_SITE . '/components/com_content/';

JLoader::register('ContentHelperRoute', $com_path . 'helpers/route.php');
JModelLegacy::addIncludePath($com_path . 'models', 'ContentModel');

// Load version.php
$version_php = JPATH_SITE . '/modules/mod_coalawebnews/version.php';
if (!defined('MOD_CWNEWS_VERSION') && JFile::exists($version_php)) {
    include_once $version_php;
}

/**
 * Helper for mod_coalawebnews
 *
 * @package     Joomla.Site
 * @subpackage  mod_coalawebnews
 *
 * @since       1.6.0
 */
class ModCoalawebNewsHelper {
	/**
	 * Get a list of the latest articles from the article model
	 *
	 * @param   JRegistry  &$params  object holding the models parameters
	 *
	 * @return  mixed
	 */
	public static function getList(&$params){
		$app = JFactory::getApplication();

		// Get an instance of the generic articles model
		$model = JModelLegacy::getInstance('Articles', 'ContentModel', array('ignore_request' => true));

		// Set application parameters in model
		$appParams = JFactory::getApplication()->getParams();
		$model->setState('params', $appParams);

		// Set the filters based on the module params
		$model->setState('list.start', (int) $params->get('skip', 0));
                
        $model->setState('list.limit', (int) $params->get('count', 5) + (int) $params->get('link_count', 5));

		$model->setState('filter.published', 1);

        // This module does use tags data
        $model->setState('load_tags', true);

		$model->setState('list.select', 'a.fulltext, a.id, a.title, a.alias, a.introtext, a.state, a.catid, a.created, a.created_by, a.created_by_alias,' .
			' a.modified, a.modified_by, a.publish_up, a.publish_down, a.images, a.urls, a.attribs, a.metadata, a.metakey, a.metadesc, a.access,' .
			' a.hits, a.featured, a.language' );

		// Access filter
		$access = !JComponentHelper::getParams('com_content')->get('show_noauth');
		$authorised = JAccess::getAuthorisedViewLevels(JFactory::getUser()->get('id'));
		$model->setState('filter.access', $access);

		// Category filter
		$model->setState('filter.category_id', $params->get('catid', array()));

		// Filter by language
		$model->setState('filter.language', $app->getLanguageFilter());

        // Filer by tag
        $model->setState('filter.tag', $params->get('tag'), array());

		// Set ordering
		$ordering = $params->get('ordering', 'a.publish_up');
		$model->setState('list.ordering', $ordering);

        if (trim($ordering) === 'rand()')
        {
            $model->setState('list.ordering', JFactory::getDbo()->getQuery(true)->Rand());
        }
        else
        {
            $direction = $params->get('direction', 1) ? 'DESC' : 'ASC';
            $model->setState('list.direction', $direction);
            $model->setState('list.ordering', $ordering);
        }

		// Retrieve Content
		$items = $model->getItems();

		foreach ($items as &$item)
		{
			$item->readmore = strlen(trim($item->fulltext));
			$item->slug = $item->id . ':' . $item->alias;

            /** @deprecated Catslug is deprecated, use catid instead. 4.0 */
			$item->catslug = $item->catid . ':' . $item->category_alias;

			if ($access || in_array($item->access, $authorised))
			{
				// We know that user has the privilege to view the article
				$item->link = JRoute::_(ContentHelperRoute::getArticleRoute($item->slug, $item->catid, $item->language));
                $item->catLink = JRoute::_(ContentHelperRoute::getCategoryRoute($item->catid));
				$item->linkText = JText::_('MOD_CWNEWS_READMORE');
			}
			else
			{
                $item->link = new JUri(JRoute::_('index.php?option=com_users&view=login', false));
                $item->link->setVar('return', base64_encode(ContentHelperRoute::getArticleRoute($item->slug, $item->catid, $item->language)));
				$item->linkText = JText::_('MOD_CWNEWS_READMORE_REGISTER');
			}
                    

		}

		return $items;
	}

    /**
     * Check if we have any links to display
     *
     * @param $list
     * @param $params
     * @return bool
     */
    public static function checkForLinks($list, $params)
    {
        $test = false;
        $list = array_filter($list);

        if (empty($list)) {
            return $test;
        }
        $currentArticles = count($list);

        if ($currentArticles > $params->get('count', 5)) {
            $test = true;
        }
        return $test;

    }

    /**
     * Updating old type choices to current
     *
     * @param $currentType
     * @return array
     */
    public static function checkType($currentType)
    {
        $changed = false;
        $type = null;

        //List of obsolete types
        $obsolete = array(
            '0',
            '1'
        );

        if (in_array($currentType, $obsolete)) {
            switch ($currentType) {
                case '0':
                    $type = 'image_intro';
                    $changed = true;
                    break;
                case '1':
                    $type = 'image_fulltext';
                    $changed = true;
                    break;
            }
        }

        $newType = [
            'changed' => $changed,
            'type' => $type
        ];

        return $newType;
    }

    /**
     * Function to extract an image from an article
     *
     * @param $item
     * @param string $type
     * @return array
     */
    public static function getImage($item, $type = 'image_intro')
    {
        $imagePath = $imageAlt = $imageCaption = '';

        $image = json_decode($item->images);

        switch ($type) {
            case 'image_intro':
                $imagePath = $image->image_intro;
                $imageAlt = $image->image_intro_alt;
                $imageCaption = $image->image_intro_caption;
                break;
            case 'image_fulltext':
                $imagePath = $image->image_fulltext;
                $imageAlt = $image->image_fulltext_alt;
                $imageCaption = $image->image_fulltext_caption;
                break;
        }
        $imageParams = [
            'image_path' => $imagePath,
            'image_alt' => $imageAlt,
            'image_caption' => $imageCaption
        ];

        return $imageParams;
    }

    /**
     * Check dependencies
     *
     * @return array
     */
    public static function checkDependencies() {

        $langRoot = 'MOD_CWNEWS';

        /**
         * Gears dependencies
         */
        $version = (MOD_CWNEWS_MIN_GEARS_VERSION); // Minimum version

        // Classes that are needed
        $assets = [
            'mobile' => false,
            'count' => true,
            'tools' => true,
            'latest' => false
        ];

        // Check if Gears dependencies are meet and return result
        $results = self::checkGears($version, $assets, $langRoot);

        if($results['ok'] == false){
            $result = [
                'ok' => $results['ok'],
                'type' => $results['type'],
                'msg' => $results['msg']
            ];

            return $result;
        }


        // Lets use our tools class from Gears
        $tools = new CwGearsHelperTools();

        /**
         * File and folder dependencies
         * Note: JPATH_ROOT . '/' prefix will be added to file and folder names
         */
        $filesAndFolders = array(
            'files' => array(
            ),
            'folders' => array(
            )
        );

        // Check if they are available
        $exists = $tools::checkFilesAndFolders($filesAndFolders, $langRoot);

        // If any of the file/folder dependencies fail return
        if($exists['ok'] == false){
            $result = [
                'ok' => $exists['ok'],
                'type' => $exists['type'],
                'msg' => $exists['msg']
            ];

            return $result;
        }

        /**
         * Extension Dependencies
         * Note: Plugins always need to be entered in the following format plg_type_name
         */
        $extensions = array(
            'components' => array(
            ),
            'modules' => array(
            ),
            'plugins' => array(
            )
        );

        // Check if they are available
        $extExists = $tools::checkExtensions($extensions, $langRoot);

        // If any of the extension dependencies fail return
        if($extExists['ok'] == false){
            $result = [
                'ok' => $extExists['ok'],
                'type' => $extExists['type'],
                'msg' => $extExists['msg']
            ];

            return $result;
        }

        // No problems? return all good
        $result = ['ok' => true];

        return $result;
    }

    /**
     * Check Gears dependencies
     *
     * @param $version - minimum version
     * @param array $assets - list of required assets
     * @param $langRoot
     * @return array
     */
    public static function checkGears($version, $assets = array(), $langRoot)
    {
        jimport('joomla.filesystem.file');

        // Load the version.php file for the CW Gears plugin
        $version_php = JPATH_SITE . '/plugins/system/cwgears/version.php';
        if (!defined('PLG_CWGEARS_VERSION') && JFile::exists($version_php)) {
            include_once $version_php;
        }

        // Is Gears installed and the right version and published?
        if (
            JPluginHelper::isEnabled('system', 'cwgears') &&
            JFile::exists($version_php) &&
            version_compare(PLG_CWGEARS_VERSION, $version, 'ge')
        ) {
            // Base helper directory
            $helperDir = JPATH_SITE . '/plugins/system/cwgears/helpers/';

            // Do we need the mobile detect class?
            if ($assets['mobile'] == true && !class_exists('Cwmobiledetect')) {
                $mobiledetect_php = $helperDir . 'cwmobiledetect.php';
                if (JFile::exists($mobiledetect_php)) {
                    JLoader::register('Cwmobiledetect', $mobiledetect_php);
                } else {
                    $result = [
                        'ok' => false,
                        'type' => 'warning',
                        'msg' => JText::_($langRoot . '_NOGEARSPLUGIN_HELPER_MESSAGE')
                    ];
                    return $result;
                }
            }

            // Do we need the load count class?
            if ($assets['count'] == true && !class_exists('CwGearsHelperLoadcount')) {
                $loadcount_php = $helperDir . 'loadcount.php';
                if (JFile::exists($loadcount_php)) {
                    JLoader::register('CwGearsHelperLoadcount', $loadcount_php);
                } else {
                    $result = [
                        'ok' => false,
                        'type' => 'warning',
                        'msg' => JText::_($langRoot . '_NOGEARSPLUGIN_HELPER_MESSAGE')
                    ];
                    return $result;
                }
            }

            // Do we need the tools class?
            if ($assets['tools'] == true && !class_exists('CwGearsHelperTools')) {
                $tools_php = $helperDir . 'tools.php';
                if (JFile::exists($tools_php)) {
                    JLoader::register('CwGearsHelperTools', $tools_php);
                } else {
                    $result = [
                        'ok' => false,
                        'type' => 'warning',
                        'msg' => JText::_($langRoot . '_NOGEARSPLUGIN_HELPER_MESSAGE')
                    ];
                    return $result;
                }
            }

            // Do we need the latest class?
            if ($assets['latest'] == true && !class_exists('CwGearsLatestversion')) {
                $latest_php = $helperDir . 'latestversion.php';
                if (JFile::exists($latest_php)) {
                    JLoader::register('CwGearsLatestversion', $latest_php);
                } else {
                    $result = [
                        'ok' => false,
                        'type' => 'warning',
                        'msg' => JText::_($langRoot . '_NOGEARSPLUGIN_HELPER_MESSAGE')
                    ];
                    return $result;
                }
            }
        } else {
            // Looks like Gears isn't meeting the requirements
            $result = [
                'ok' => false,
                'type' => 'warning',
                'msg' => JText::sprintf($langRoot . '_NOGEARSPLUGIN_CHECK_MESSAGE', $version)
            ];
            return $result;
        }

        // Set up our response array
        $result = [
            'ok' => true,
            'type' => '',
            'msg' => ''
        ];

        // Return our result
        return $result;

    }
}