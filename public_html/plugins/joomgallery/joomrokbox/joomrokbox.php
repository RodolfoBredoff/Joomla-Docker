<?php
// $HeadURL: https://joomgallery.org/svn/joomgallery/JG-3/Plugins/JoomRokBox/trunk/joomrokbox.php $
// $Id: joomrokbox.php 4180 2013-04-08 14:39:26Z chraneco $
/****************************************************************************************\
**   Plugin 'JoomRokbox' 3.0                                                            **
**   By: JoomGallery::ProjectTeam                                                       **
**   Copyright (C) 2010 - 2013 JoomGallery::ProjectTeam                                 **
**   Released under GNU GPL Public License                                              **
**   License: http://www.gnu.org/copyleft/gpl.html or have a look                       **
**   at administrator/components/com_joomgallery/LICENSE.TXT                            **
\****************************************************************************************/

defined('_JEXEC') or die('Direct Access to this location is not allowed.');

require_once JPATH_ADMINISTRATOR.'/components/com_joomgallery/helpers/openimageplugin.php';

/**
 * JoomGallery RokBox Plugin
 *
 * With this plugin JoomGallery is able to use
 * RokBox (http://www.rockettheme.com/extensions-joomla/rokbox/)
 * for displaying images.
 *
 * NOTE: Please remember that the system plugin of RokBox has to be installed and
 *       enabled to use RokBox in JoomGallery. You can find this plugin
 *       ('RokBox System Plugin') at the page linked above.
 *
 * @package     Joomla
 * @subpackage  JoomGallery
 * @since       1.5
 */
class plgJoomGalleryJoomRokbox extends JoomOpenImagePlugin
{
  /**
   * Name of this popup box
   *
   * @var   string
   * @since 3.0
   */
  protected $title = 'RokBox';

  /**
   * Initializes the box by adding all necessary JavaScript and CSS files.
   * This is done only once per page load.
   *
   * Not necessary for RokBox because the JavaScript and CSS files are loaded by a system plugin.
   *
   * @return  void
   * @since   3.0
   */
  protected function init()
  {
  }

  /**
   * This method should set an associative array of attributes for the 'a'-Tag (key/value pairs) which opens the image.
   *
   * <code>
   * $attribs['data-rel']   = 'examplebox';
   * $attribs['data-group'] = $group;
   * </code>
   *
   * The example above will create a link tag like that: <a href="<image URL>"  data-rel="examplebox" group="<image group>" ... >
   *
   * ($attribs is passed by references and should only be filled)
   *
   * By default the attribute 'href' is filled with the URL to the image which shall be opened. You only have to set that
   * attribute if you want to change that (the image URL is passed in the third argument of this method).
   *
   * NOTE!!!: You are not allowed to set the attributes 'title' and 'class' because these are handled internally by JoomGallery.
   *
   * @param   array   $attribs  Associative array of HTML attributes which you have to fill
   * @param   object  $image    An object holding all the relevant data about the image to open
   * @param   string  $img_url  The URL to the image which shall be openend
   * @param   string  $group    The name of an image group, most popup boxes are able to group the images with that
   * @param   string  $type     'orig' for original image, 'img' for detail image or 'thumb' for thumbnail
   * @return  void
   * @since   3.0
   */
  protected function getLinkAttributes(&$attribs, $image, $img_url, $group, $type)
  {
    // Add an image file extension so that RokBox knows the correct media type
    if(strpos($attribs['href'], '?') !== false)
    {
      $attribs['href'] = $attribs['href'].'&ext=.jpg';
    }
    else
    {
      $attribs['href'] = $attribs['href'].'?ext=.jpg';
    }

    if($title = JHtml::_('joomgallery.gettitleforatag', $image))
    {
      $attribs['data-rokbox-caption'] = substr($title, 7, -1);
    }

    $attribs['data-rokbox'] = '';
    $attribs['data-rokbox-album'] = $group;
  }
}