<?php
/*------------------------------------------------------------------------
# My Facebook Page
# ------------------------------------------------------------------------
# author    Bilal Kabeer Butt
# copyright Copyright (c) GegaByte Corporation. All Rights reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: http://www.gegabyte.org
-------------------------------------------------------------------------*/
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

//This is the parameter we get from our xml file above
$fb_page_protocal = $params->get('fb_page_protocal');
$fb_page_url = $params->get('fb_page_url');
$Mtab = $params->get('mtabs');
$TimeTab = $params->get('ShowTimeLine');
$EventTab = $params->get('ShowEvents');
$MsgTab = $params->get('ShowMsgs');

$awidth = $params->get('awidth');
$width = $params->get('width');

$aheight = $params->get('aheight');
$height = $params->get('height');

$use_small_header = $params->get('use_small_header');
$adapt = $params->get('adapt');
$hide_cover_photo = $params->get('hide_cover_photo');
$show_faces = $params->get('show_faces');
$show_posts = $params->get('show_posts');

//Returns the path of the layout file
require JModuleHelper::getLayoutPath('mod_my_facebook_page', $params->get('layout', 'default'));