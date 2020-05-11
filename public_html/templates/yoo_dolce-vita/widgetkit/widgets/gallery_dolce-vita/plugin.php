<?php
/**
* @package   yoo_dolce-vita
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

return array(

    'name' => 'widget/gallery_dolce-vita',

    'main' => 'YOOtheme\\Widgetkit\\Widget\\Widget',

    'config' => array(

        'name'  => 'gallery_dolce-vita',
        'label' => 'Dolce Vita Gallery',
        'core'  => false,
        'icon'  => 'plugins/widgets/gallery_dolce-vita/widget.svg',
        'view'  => 'plugins/widgets/gallery_dolce-vita/views/widget.php',
        'item'  => array('title', 'content', 'media'),
        'settings' => array(
            'gutter'                        => 'large',
            'columns'                       => '1',
            'columns_small'                 => 0,
            'columns_medium'                => '3',
            'columns_large'                 => 0,
            'columns_xlarge'                => 0,
            'animation'                     => 'fade',

            'image_width'                   => '280',
            'image_height'                  => '280',
            'overlay_background'            => 'hover',
            'overlay_background_color'      => 'primary',
            'overlay_boxed'                 => true,
            'overlay_position'              => 'bottom_left',
            'overlay_align'                 => 'left',
            'overlay_blend_mode'            => 'overlay',
            'overlay_opacity'               => '80',
            'hover_overlay'                 => false,

            'title'                         => true,
            'content'                       => true,
            'title_size'                    => 'panel',
            'link'                          => false,
            'link_style'                    => 'text',
            'link_icon'                     => 'share',
            'link_text'                     => 'View',

            'lightbox'                      => true,
            'lightbox_width'                => 'auto',
            'lightbox_height'               => 'auto',
            'lightbox_caption'              => 'content',
            'lightbox_link'                 => false,
            'lightbox_style'                => 'button',
            'lightbox_icon'                 => 'search',
            'lightbox_text'                 => 'Details',

            'link_target'                   => false,
            'class'                         => ''
        )

    ),

    'events' => array(

        'init.site' => function($event, $app) {

        },

        'init.admin' => function($event, $app) {
            $app['angular']->addTemplate('gallery_dolce-vita.edit', 'plugins/widgets/gallery_dolce-vita/views/edit.php', true);
        }

    )

);
