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

// Include the syndicate functions only once
require_once dirname(__FILE__) . '/helper.php';

//Lets get help and params from our helper
$help = new ModCoalaWebNewsHelper();

// Required autoloader for the upcoming namespaces.
if (!is_file(JPATH_PLUGINS . '/system/cwgears/libraries/CoalaWeb/vendor/autoload.php')) {
    return;
}
require_once JPATH_PLUGINS . '/system/cwgears/libraries/CoalaWeb/vendor/autoload.php';


//Check dependencies
$checkOk = $help::checkDependencies();

if ($checkOk['ok'] === false) {
    if ($params->get('debug', '0')) {
        JFactory::getApplication()->enqueueMessage($checkOk['msg'], $checkOk['type']);
    }
    return;
}
// Passed dpendency check so lets use Tools
$tools = new CwGearsHelperTools();

JHtml::_('jquery.framework');

// Load the language files
$jlang = JFactory::getLanguage();

// Module
$jlang->load('mod_coalawebnews', JPATH_SITE, 'en-GB', true);
$jlang->load('mod_coalawebnews', JPATH_SITE, $jlang->getDefault(), true);
$jlang->load('mod_coalawebnews', JPATH_SITE, null, true);

$uniqueId = $module->id;
$doc = JFactory::getDocument();

$list = $help::getList($params);
$checkLinks = $help::checkForLinks($list, $params);

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));
$uikitPrefix = $params->get('uikit_prefix', 'cw');

$itemCount = $params->get('count', 5);
$showReadmore = $params->get('show_readmore', 1);
$alwaysReadmore = $params->get('always_readmore', 0);
$readmoreText = $params->get('readmore_text', JTEXT::_('MOD_CWNEWS_BTN_RM'));
$readmoreType = $params->get('readmore_type', 'l');
$readmoreCustom = $params->get('readmore_custom');
$html = $params->get('strip_html', 1) > 0 ? true : false;
$exclusions = $params->get('html_exclusions', '');
$limit = $params->get('max_char', 200);

//Remore button type
switch ($readmoreType){
    case 'p' :
        $rmTypeCw = $uikitPrefix . '-button ' .$uikitPrefix . '-button-primary';
        break;
    case 's' :
        $rmTypeCw = $uikitPrefix . '-button ' .$uikitPrefix . '-button-success';
        break;
    case 'd' :
        $rmTypeCw = $uikitPrefix . '-button ' .$uikitPrefix . '-button-danger';
        break;
    case 'l' :
        $rmTypeCw = $uikitPrefix . '-button ' .$uikitPrefix . '-button-link';
        break;
    case 'c' :
        $rmTypeCw = $readmoreCustom;
        break;
}

$displayLinks = $params->get('display_links', 0);
$displayDetails = $params->get('show_article_info');
$moreFrom = $params->get('more_from', 0);
$morefromText = $params->get('morefrom_text', JTEXT::_('MOD_CWNEWS_MORE'));
$itemHeading = $params->get('item_heading', 'h4');
$linkHeading = $params->get('link_heading', 'h4');
$linkText = $params->get('link_text', JTEXT::_('MOD_CWNEWS_LINKS'));

$showImg = $params->get('show_image', 1);
//Update old image type options
$imgType = $params->get('image_type', 'image_intro');
$typeUpdate = $help::checkType($imgType);
if ($typeUpdate['changed'] === true){
    $imgType = $typeUpdate['type'];
}

$imgWidthLarge = $params->get('image_width_large', 2);
$imgWidthMedium = $params->get('image_width_medium', 4);
$imgWidthSmall = $params->get('image_width_small', 10);
$columnsLarge = ($params->get('columns_large', 4) > $itemCount ? $itemCount : $params->get('columns_large', 4));
$columnsMedium = ($params->get('columns_medium', 2) > $itemCount ? $itemCount : $params->get('columns_medium', 2));
$columnsSmall = ($params->get('columns_small', 1) > $itemCount ? $itemCount : $params->get('columns_small', 1));
$artWidthLarge = ($showImg ? 10 - $imgWidthLarge : 10);
$artWidthMedium = ($showImg ? 10 - $imgWidthMedium : 10);
$artWidthSmall = ($showImg ? 10 - $imgWidthSmall : 10);

//A bit of redundancy for old settings
$marginsInner = $params->get('grid_margins_inner') === 'preserve' ? 'small' : $params->get('grid_margins_inner', 'small');
$marginsOuter = $params->get('grid_margins_outer') === 'preserve' || 'small' ? '20' : $params->get('grid_margins_outer', '20');
$textAlign = $params->get('text_align', 'justify');
$readmoreAlign = $params->get('readmore_align', 'right');
$titleAlign = $params->get('title_align', 'left');
$detailsAlign = $params->get('details_align', 'left');
$imageAlign = $params->get('image_align', 'left');
$panelType = $params->get('panel_style', 'd');
$dynFilter = $params->get('dynamic_filter', '');
$matchHeight = $params->get('match_height', 0) ? 'data-' . $uikitPrefix . '-grid-match="{row: false}"' : '';

//Panel type
switch ($panelType){
    case 'd' :
        $panelStyle = $uikitPrefix . '-panel-box' ;
        break;
    case 'p' :
        $panelStyle = $uikitPrefix . '-panel-box ' .$uikitPrefix . '-panel-box-primary';
        break;
    case 's' :
        $panelStyle = $uikitPrefix . '-panel-box ' .$uikitPrefix . '-panel-box-secondary';
        break;
    case 'h' :
        $panelStyle = $uikitPrefix . '-panel-hover';
        break;
}

// Do we need to load UIkit?
if ($uikitPrefix === 'cw') {
    $helpFunc = new CwGearsHelperLoadcount();
    $url = JURI::getInstance()->toString();
    $helpFunc::setUikitCount($url);
    $helpFunc::setUikitPlusCount($url);
}

require JModuleHelper::getLayoutPath('mod_coalawebnews', $params->get('layout', 'default'));
