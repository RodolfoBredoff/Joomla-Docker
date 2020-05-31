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
?>
<div id ="cwn-<?php echo $uniqueId; ?>" class="<?php echo $moduleclass_sfx; ?>">
        <div class="
            <?php echo $uikitPrefix; ?>-grid 
            <?php echo $uikitPrefix; ?>-grid-match
            <?php echo $uikitPrefix; ?>-margin-bottom"
            data-<?php echo $uikitPrefix; ?>-grid="{gutter: <?php echo $marginsOuter; ?>}">
            <?php
            $i = 0;
            foreach ($list as $item) :
                if ($i < $itemCount) {
                    echo '<div class="'
                    . $uikitPrefix .'-width-large-1-' .$columnsLarge . ' '
                    . $uikitPrefix .'-width-medium-1-' .$columnsMedium . ' '
                    . $uikitPrefix .'-width-small-1-' .$columnsSmall . '">';
                    
                    echo '<div class="' .$uikitPrefix . '-panel ' . $panelStyle . '">'
                    . '<div class="' .$uikitPrefix . '-grid ' .$uikitPrefix . '-grid-' . $marginsInner . '" data-' .$uikitPrefix . '-grid-margin="">';
                    
                    require JModuleHelper::getLayoutPath('mod_coalawebnews', 'default/_item');
                    
                    echo '</div></div></div>';
                }
                $i++;
            endforeach;
            ?>
        </div>
        
        <?php if ($displayLinks && $checkLinks) {

            if ($params->get('links_title')) {
                echo '<' . $linkHeading . ' class="">' . $linkText . '</' . $linkHeading . '>';
            }

            $f = 1;
            echo '<ul class="' .$uikitPrefix . '-list">';
            foreach ($list as $item) :
                if ($f > $params->get('count', 5)) {
                    require JModuleHelper::getLayoutPath('mod_coalawebnews', 'default/_link');
                }
                $f++;
            endforeach;
            echo '</ul>';
        }
    
        if ($moreFrom) {
            echo '<p class="' .$uikitPrefix . '-small ' .$uikitPrefix . '-text-muted">' . $morefromText . ':';
            $new_array = array();
            foreach ($list as $cat) :

                if (!array_key_exists($cat->catid, $new_array)) {
                    $new_array[$cat->catid] = $cat;
                    echo '<i class="' .$uikitPrefix . '-icon-folder-open ' .$uikitPrefix . '-margin-small-left"></i>'
                    . ' <a href="' . $cat->catLink . '">' . $cat->category_title . '</a>';
                }

            endforeach;
            echo '</p>';
        }
        ?>

    </div>
