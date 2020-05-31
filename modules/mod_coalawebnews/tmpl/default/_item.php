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

$imageInfo = $help::getImage($item, $imgType);
$author = $item->author;
$author = ($item->created_by_alias ? $item->created_by_alias : $author);
?>

<?php if ($params->get('item_title') || $params->get('show_article_info')) : ?>
    <div class="<?php echo $uikitPrefix; ?>-width-1-1">
        <?php if ($params->get('item_title')) : ?>
            <<?php echo $itemHeading; ?> class="<?php echo $uikitPrefix; ?>-margin-small <?php echo $uikitPrefix; ?>-text-<?php echo $titleAlign; ?>">
            <?php if ($params->get('link_titles') && $item->link != '') : ?>
                <a href="<?php echo $item->link; ?>">
                <?php echo $item->title; ?></a>
                <?php else : ?>
                    <?php echo $item->title; ?>
            <?php endif; ?>
            </<?php echo $itemHeading; ?>>
        <?php endif; ?>

        <?php if ($displayDetails) : ?>
            <p class="
                <?php echo $uikitPrefix; ?>-article-meta 
                    <?php echo $uikitPrefix; ?>-margin-small 
                        <?php echo $uikitPrefix; ?>-text-<?php echo $detailsAlign; ?>">

                <?php if ($params->get('show_info_title')) : ?>
                    <strong>
                    <?php echo JText::_('MOD_CWNEWS_ARTICLE_INFO') . ":"; ?>
                    </strong>
                <?php endif; ?>

                <?php if ($params->get('show_author') && !empty($author)) : ?>
                    <i class="<?php echo $uikitPrefix; ?>-icon-user <?php echo $uikitPrefix; ?>-margin-small-left"></i>
                    <?php echo JText::sprintf('MOD_CWNEWS_WRITTEN_BY', $author); ?>
                <?php endif; ?>

                <?php if ($params->get('show_category')) : ?>
                    <i class="<?php echo $uikitPrefix; ?>-icon-folder-open <?php echo $uikitPrefix; ?>-margin-small-left"></i>
                    <?php $catLink = '<a class="cwn-catlink" href="' . $item->catLink . '">' . $item->category_title . '</a>'; ?>
                    <?php echo JText::sprintf('MOD_CWNEWS_CATEGORY', $catLink); ?>
                <?php endif; ?>

                <?php if ($params->get('show_publish_date')) : ?>
                    <i class="<?php echo $uikitPrefix; ?>-icon-calendar <?php echo $uikitPrefix; ?>-margin-small-left"></i>
                    <time datetime="<?php echo JHtml::_('date', $item->publish_up, 'c'); ?>" itemprop="datePublished">
                        <?php echo JText::sprintf('MOD_CWNEWS_PUBLISHED_DATE_ON', JHtml::_('date', $item->publish_up, JText::_('DATE_FORMAT_LC3'))); ?>
                    </time>
                    <?php endif; ?>

                <?php if ($params->get('show_modify_date')) : ?>
                    <i class="<?php echo $uikitPrefix; ?>-icon-calendar <?php echo $uikitPrefix; ?>-margin-small-left"></i>
                    <time datetime="<?php echo JHtml::_('date', $item->modified, 'c'); ?>" itemprop="dateModified">
                        <?php echo JText::sprintf('MOD_CWNEWS_LAST_UPDATED', JHtml::_('date', $item->modified, JText::_('DATE_FORMAT_LC3'))); ?>
                    </time>
                    <?php endif; ?>

                <?php if ($params->get('show_create_date')) : ?>
                    <i class="<?php echo $uikitPrefix; ?>-icon-calendar <?php echo $uikitPrefix; ?>-margin-small-left"></i>
                    <time datetime="<?php echo JHtml::_('date', $item->created, 'c'); ?>" itemprop="dateCreated">
                        <?php echo JText::sprintf('MOD_CWNEWS_CREATED_DATE_ON', JHtml::_('date', $item->created, JText::_('DATE_FORMAT_LC3'))); ?>
                    </time>
                    <?php endif; ?>

                <?php if ($params->get('show_hits')) : ?>
                    <i class="<?php echo $uikitPrefix; ?>-icon-bullseye <?php echo $uikitPrefix; ?>-margin-small-left"></i>
                    <meta itemprop="interactionCount" content="UserPageVisits:<?php echo $item->hits; ?>" />
                <?php echo JText::sprintf('MOD_CWNEWS_ARTICLE_HITS', $item->hits); ?>
                <?php endif; ?>
            </p>
        <?php endif; ?>
    </div>
<?php endif; ?>

<?php if ($showImg && isset($imageInfo['image_path']) && !empty($imageInfo['image_path'])) : ?>
        <div class="
         <?php echo $uikitPrefix; ?>-text-<?php echo $imageAlign; ?>
         <?php echo $uikitPrefix; ?>-width-small-<?php echo $imgSmall = ($imgWidthSmall == 10 ? '1-1' : $imgWidthSmall.'-10'); ?>
         <?php echo $uikitPrefix; ?>-width-medium-<?php echo $imgMedium = ($imgWidthMedium == 10 ? '1-1' : $imgWidthMedium.'-10'); ?>
         <?php echo $uikitPrefix; ?>-width-large-<?php echo $imgLarge = ($imgWidthLarge == 10 ? '1-1' : $imgWidthLarge.'-10'); ?>">

            <div class="<?php echo $uikitPrefix; ?>-thumbnail">

                <?php if ($params->get('onclick_images') === 'link' && $item->link != '') : ?>
                    <a href="<?php echo $item->link; ?>">
                        <img
                                src="<?php echo htmlspecialchars($imageInfo['image_path']); ?>"
                                alt="<?php echo htmlspecialchars($imageInfo['image_alt']); ?>"/>
                    </a>
                <?php else : ?>
                    <img
                            src="<?php echo htmlspecialchars($imageInfo['image_path']); ?>"
                            alt="<?php echo htmlspecialchars($imageInfo['image_alt']); ?>"/>
                <?php endif; ?>

               <?php  if ($imageInfo['image_caption'] && $params->get('show_image_caption')): ?>
                    <div class="uk-thumbnail-caption">
                        <?php echo htmlspecialchars($imageInfo['image_caption']); ?>
                    </div>
               <?php endif; ?>
            </div>
            
        </div>
<?php endif; ?>
<?php
//Allowing for articles that don't contain images
if (strlen($imageInfo['image_path']) < 1){
    $dynoWidthLarge = '1-1';
    $dynoWidthMedium = '1-1';
    $dynoWidthSmall = '1-1';
} else{
    $dynoWidthLarge = ($artWidthLarge == 0 ? '1-1' : $artWidthLarge.'-10');
    $dynoWidthMedium = ($artWidthMedium == 0 ? '1-1' : $artWidthMedium.'-10');
    $dynoWidthSmall = ($artWidthSmall == 0 ? '1-1' : $artWidthSmall.'-10');
}
?>
<div class="
     <?php echo $uikitPrefix; ?>-width-large-<?php echo $dynoWidthLarge; ?>
     <?php echo $uikitPrefix; ?>-width-medium-<?php echo $dynoWidthMedium; ?>
     <?php echo $uikitPrefix; ?>-width-small-<?php echo $dynoWidthSmall; ?>">
    
    <?php
        $cleanText = $tools::textClean($item->introtext, $html, $limit);
        echo '<p class="' . $uikitPrefix . '-text-' . $textAlign . '">' . $cleanText . '</p>';
    ?>
</div>

<?php if ($showReadmore) : ?>
    <div class="<?php echo $uikitPrefix; ?>-width-1-1 <?php echo $uikitPrefix; ?>-text-<?php echo $readmoreAlign; ?>">
        <?php if (isset($item->link) && ($item->readmore != 0 || $alwaysReadmore)) :
            echo '<a class="' . $rmTypeCw . '" href="' . $item->link . '">' . $readmoreText . '</a>';
        endif;
        ?>
    </div>
<?php endif; ?>