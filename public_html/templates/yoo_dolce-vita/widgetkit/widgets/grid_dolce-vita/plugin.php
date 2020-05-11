<?php
/**
* @package   yoo_dolce-vita
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

return array(

    'name' => 'widget/grid_dolce-vita',

    'main' => 'YOOtheme\\Widgetkit\\Widget\\Widget',

    'config' => array(

        'name'  => 'grid_dolce-vita',
        'label' => 'Dolce Vita Grid',
        'core'  => false,
        'icon'  => 'plugins/widgets/grid_dolce-vita/widget.svg',
        'view'  => 'plugins/widgets/grid_dolce-vita/views/widget.php',
        'item'  => array('title', 'content', 'media'),
        'settings' => array(
            'grid'              => 'default',
            'gutter'            => 'x-large',
            'gutter_dynamic'    => '40',
            'gutter_v_dynamic'  => '',
            'filter'            => 'none',
            'tag-list'          => array(),
            'filter_align'      => 'center',
            'filter_all'        => true,
            'columns'           => '1',
            'columns_small'     => 0,
            'columns_medium'    => 0,
            'columns_large'     => '2',
            'columns_xlarge'    => 0,
            'divider'           => true,
            'panel'             => 'blank',
            'panel_link'        => false,
            'animation'         => 'slide-bottom',

            'media'             => true,
            'image_width'       => 'auto',
            'image_height'      => 'auto',
            'media_align'       => 'teaser',
            'media_width'       => '1-2',
            'media_breakpoint'  => 'medium',
            'content_align'     => true,
            'media_border'      => 'none',
            'media_overlay'     => 'none',
            'overlay_animation' => 'none',
            'media_animation'   => 'none',

            'title'             => true,
            'title_truncate'    => '',
            'content'           => true,
            'content_truncate'  => '',
            'social_buttons'    => false,
            'title_size'        => 'panel',
            'text_align'        => 'left',
            'link'              => true,
            'link_style'        => 'text',
            'link_text'         => 'Read more',
            'badge'             => true,
            'badge_style'       => 'badge',
            'badge_position'    => 'panel',

            'link_target'       => false,
            'class'             => ''
        )

    ),

    'events' => array(

        'init.site' => function($event, $app) {

        },

        'init.admin' => function($event, $app) {
            $app['angular']->addTemplate('grid_dolce-vita.edit', 'plugins/widgets/grid_dolce-vita/views/edit.php', true);
        }

    )

);
