<?php
/**
* @package   yoo_dolce-vita
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

return array(

    'name' => 'widget/parallax_dolce-vita',

    'main' => 'YOOtheme\\Widgetkit\\Widget\\Widget',

    'config' => array(

        'name'  => 'parallax_dolce-vita',
        'label' => 'Dolce Vita Parallax',
        'core'  => false,
        'icon'  => 'plugins/widgets/parallax_dolce-vita/widget.svg',
        'view'  => 'plugins/widgets/parallax_dolce-vita/views/widget.php',
        'item'  => array('title', 'content', 'media'),
        'settings' => array(
            'fullscreen'               => false,
            'min_height'               => '960',
            'background_translatey'    => '-400',
            'background_color_start'   => '#EDC64A',
            'background_color_end'     => '#FFFFFF',
            'image_blend_mode'         => 'overlay',
            'image_opacity'            => '0.8',
            'contrast'                 => 'secondary',
            'title_opacity_start'      => '1',
            'title_opacity_end'        => '0',
            'title_blur_start'         => '0',
            'title_blur_end'           => '20',
            'title_translatex_start'   => '0',
            'title_translatex_end'     => '',
            'title_translatey_start'   => '0',
            'title_translatey_end'     => '300',
            'title_scale_start'        => '1',
            'title_scale_end'          => '1.5',
            'content_opacity_start'    => '1',
            'content_opacity_end'      => '0',
            'content_blur_start'       => '0',
            'content_blur_end'         => '10',
            'content_translatex_start' => '0',
            'content_translatex_end'   => '',
            'content_translatey_start' => '0',
            'content_translatey_end'   => '150',
            'content_scale_start'      => '1',
            'content_scale_end'        => '1.5',
            'viewport'                 => '1',
            'velocity'                 => '0.8',
            'target'                   => false,

            'media'                    => true,
            'image_width'              => 'auto',
            'image_height'             => 'auto',

            'title'                    => true,
            'content'                  => true,
            'title_size'               => 'large',
            'content_size'             => 'large',
            'text_align'               => 'center',
            'link'                     => true,
            'link_style'               => 'button',
            'link_text'                => 'Read more',
            'badge'                    => true,
            'width'                    => '9-10',
            'width_small'              => '4-5',
            'width_medium'             => '2-3',
            'width_large'              => '1-2',

            'link_target'              => false,
            'class'                    => ''
        )

    ),

    'events' => array(

        'init.site' => function($event, $app) {

        },

        'init.admin' => function($event, $app) {
            $app['angular']->addTemplate('parallax_dolce-vita.edit', 'plugins/widgets/parallax_dolce-vita/views/edit.php', true);
        }

    )

);
