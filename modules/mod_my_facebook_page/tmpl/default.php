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

if ( $fb_page_protocal == "" ){
	$fb_page_protocal = "http";
}else{
	$fb_page_protocal = $fb_page_protocal;
}

if  ( $use_small_header == 1){
	$small_header = "true";
}else{
	$small_header = "false";	
}

if  ( $adapt == 1){
	$adapt_cont = "true";
}else{
	$adapt_cont = "false";	
}

if  ( $hide_cover_photo == 1){
	$hide_cover = "true";
}else{
	$hide_cover = "false";	
}

if  ( $show_faces == 1 ){
	$faces = "true";
}else{
	$faces = "false";	
}

if  ( $show_posts == 1){
	$posts = "true";
}else{
	$posts = "false";	
}

if ( $awidth == 1 ){
	if ($width != "" ){
		$width = $width;
	}else{
		$width = '180';
	}
	if ( $width != "" ){
		$width = 'data-width="' . $width . '"';
	}
}else{
	$width = '';
}

if ( $aheight == 1 ){
	if ($height != "" ){
		$height = $height;
	}else{
		$height = '';
	}
	if ( $height != "" ){
		$height = ' data-height="' . $height . '" ';
	}
}else{
	$height = '';
}

$tabs = '';
if ( $Mtab == 1){
	if ( $TimeTab == 1 ){
		$tabs = 'timeline';
	}
	if ( $EventTab == 1 ){
		if ( $tabs != "" ){
			$tabs .= ', events';
		}else{
			$tabs .= 'events';
		}
	}
	if ( $MsgTab == 1 ){
		if ( $tabs != "" ){
			$tabs .= ', messages';
		}else{
			$tabs .= 'messages';
		}
	}
	$tabs = ' data-tabs="' . $tabs . '" ';
}else{
	$tabs = '';
}
?>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "<?php echo $fb_page_protocal; ?>://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=529106983799798";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div style="margin-left:15px;" class="fb-page" <?php echo $width . " " .  $height; ?> data-href="<?php echo $fb_page_url;?>" data-small-header="<?php echo $small_header;?>" data-adapt-container-width="<?php echo $adapt_cont;?>" data-hide-cover="<?php echo $hide_cover;?>" data-show-facepile="<?php echo $faces;?>" data-show-posts="<?php echo $posts;?>"<?php echo $tabs;?>>
	<div class="fb-xfbml-parse-ignore">
    	<blockquote cite="<?php echo $fb_page_url;?>">
        	<a href="<?php echo $fb_page_url;?>">Facebook</a>
		</blockquote>
	</div>
</div>