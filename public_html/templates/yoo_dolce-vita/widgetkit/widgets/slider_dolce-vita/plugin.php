<?php
/**
* @package   yoo_dolce-vita
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

return array(

    'name' => 'widget/slider_dolce-vita',

    'main' => 'YOOtheme\\Widgetkit\\Widget\\Widget',

    'config' => array(

        'name'  => 'slider_dolce-vita',
        'label' => 'Dolce Vita Slider',
        'core'  => false,
        'icon'  => 'plugins/widgets/slider_dolce-vita/widget.svg',
        'view'  => 'plugins/widgets/slider_dolce-vita/views/widget.php',
        'item'  => array('title', 'content', 'media'),
        'settings' => array(
            'slidenav'                 => 'default',
            'slidenav_contrast'        => true,
            'infinite'                 => true,
            'center'                   => true,
            'item_size'                => '80',
            'autoplay'                 => false,
            'interval'                 => '3000',
            'autoplay_pause'           => true,
            'gutter'                   => 'large',
            'columns'                  => '1',
            'columns_small'            => '2',
            'columns_medium'           => '3',
            'columns_large'            => 0,
            'columns_xlarge'           => 0,
            'fullscreen'               => false,
            'min_height'               => '500',

            'media'                    => true,
            'image_width'              => '390',
            'image_height'             => '500',
            'overlay_hover'            => true,
            'overlay_background'       => true,
            'overlay_position'         => 'bottom',
            'overlay_animation'        => 'fade',
            'overlay_image'            => 'static',
            'image_animation'          => 'fade',
            'overlay_link'             => true,

            'title'                    => true,
            'content'                  => true,
            'title_size'               => 'h4',
            'content_size'             => '',
            'text_align'               => 'left',
            'link'                     => false,
            'link_style'               => 'text',
            'link_text'                => 'Details',
            'badge'                    => true,
            'badge_style'              => 'text-muted',
            'badge_position'           => 'panel',

            'link_target'              => false,
            'class'                    => ''
        )

    ),

    'events' => array(

        'init.site' => function($event, $app) {

        },

        'init.admin' => function($event, $app) {
            $app['angular']->addTemplate('slider_dolce-vita.edit', 'plugins/widgets/slider_dolce-vita/views/edit.php', true);
        }

    )

);
