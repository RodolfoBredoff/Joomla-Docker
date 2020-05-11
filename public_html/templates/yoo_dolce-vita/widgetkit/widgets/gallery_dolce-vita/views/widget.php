<?php
/**
* @package   yoo_dolce-vita
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

// Id
$settings['id'] = substr(uniqid(), -3);

// Grid
$grid = ' uk-grid uk-grid-match';
$grid .= ($settings['gutter'] == 'collapse') ? ' uk-grid-collapse' : '' ;
$grid .= ($settings['gutter'] == 'small') ? ' uk-grid-small' : '' ;
$grid .= ($settings['gutter'] == 'large') ? ' uk-grid-large' : '' ;
$grid .= ($settings['gutter'] == 'x-large') ? ' uk-grid-xlarge' : '' ;

// Grid Item Width
$grid_width  = 'uk-width-1-'.$settings['columns'];
$grid_width_small = $settings['columns_small'] ? 'uk-width-small-1-'.$settings['columns_small'] : '';
$grid_width_medium = $settings['columns_medium'] ? 'uk-width-medium-1-'.$settings['columns_medium'] : '';
$grid_width_large = $settings['columns_large'] ? 'uk-width-large-1-'.$settings['columns_large'] : '';
$grid_width_xlarge = $settings['columns_xlarge'] ? 'uk-width-xlarge-1-'.$settings['columns_xlarge'] : '';

$grid_width_alt = $settings['columns'] ? 'uk-width-'. ($settings['columns'] > 1 ? $settings['columns'] - 1 : 1) .'-'.$settings['columns'] : '';
$grid_width_small_alt = $settings['columns_small'] ? 'uk-width-small-'. ($settings['columns_small'] > 1 ? $settings['columns_small'] - 1 : 1) .'-'.$settings['columns_small'] : '';
$grid_width_medium_alt = $settings['columns_medium'] ? 'uk-width-medium-'. ($settings['columns_medium'] > 1 ? $settings['columns_medium'] - 1 : 1) .'-'.$settings['columns_medium'] : '';
$grid_width_large_alt = $settings['columns_large'] ? 'uk-width-large-'. ($settings['columns_large'] > 1 ? $settings['columns_large'] - 1 : 1) .'-'.$settings['columns_large'] : '';
$grid_width_xlarge_alt = $settings['columns_xlarge'] ? 'uk-width-xlarge-'. ($settings['columns_xlarge'] > 1 ? $settings['columns_xlarge'] - 1 : 1) .'-'.$settings['columns_xlarge'] : '';

// Grid sequence
$grid_seq = array(
    'default' => $settings['columns'] ? array('count' => 0, 'max' => $settings['columns'] + 3) : null,
    'small'   => $settings['columns_small'] ? array('count' => 0, 'max' => $settings['columns_small'] + 3) : null,
    'medium'  => $settings['columns_medium'] ? array('count' => 0, 'max' => $settings['columns_medium'] + 3) : null,
    'large'   => $settings['columns_large'] ? array('count' => 0, 'max' => $settings['columns_large'] + 3) : null,
    'xlarge'  => $settings['columns_xlarge'] ? array('count' => 0, 'max' => $settings['columns_xlarge'] + 3) : null
);

$grid_js = 'data-uk-grid-match="{target:\' > div > .uk-panel\', row:false}" data-uk-grid-margin';

// Title Size
switch ($settings['title_size']) {
    case 'panel':
        $title_size = 'uk-panel-title';
        break;
    case 'large':
        $title_size = 'uk-heading-large';
        break;
    default:
        $title_size = 'uk-' . $settings['title_size'];
}

// Button: Link
switch ($settings['link_style']) {
    case 'icon-small':
        $button_link = 'uk-icon-small';
        break;
    case 'icon-medium':
        $button_link = 'uk-icon-medium';
        break;
    case 'icon-large':
        $button_link = 'uk-icon-large';
        break;
    case 'icon-button':
        $button_link = 'uk-icon-button';
        break;
    case 'button':
        $button_link = 'uk-button';
        break;
    case 'primary':
        $button_link = 'uk-button uk-button-primary';
        break;
    case 'button-large':
        $button_link = 'uk-button uk-button-large';
        break;
    case 'primary-large':
        $button_link = 'uk-button uk-button-large uk-button-primary';
        break;
    case 'button-link':
        $link_style = 'uk-button uk-button-link';
        break;
    default:
        $button_link = '';
}

switch ($settings['link_style']) {
    case 'icon':
    case 'icon-small':
    case 'icon-medium':
    case 'icon-large':
    case 'icon-button':
        $button_link .= ' uk-icon-' . $settings['link_icon'];
        $settings['link_text'] = '';
        break;
}

// Button: Lightbox
switch ($settings['lightbox_style']) {
    case 'icon-small':
        $button_lightbox = 'uk-icon-small';
        break;
    case 'icon-medium':
        $button_lightbox = 'uk-icon-medium';
        break;
    case 'icon-large':
        $button_lightbox = 'uk-icon-large';
        break;
    case 'icon-button':
        $button_lightbox = 'uk-icon-button';
        break;
    case 'button':
        $button_lightbox = 'uk-button';
        break;
    case 'primary':
        $button_lightbox = 'uk-button uk-button-primary';
        break;
    case 'button-large':
        $button_lightbox = 'uk-button uk-button-large';
        break;
    case 'primary-large':
        $button_lightbox = 'uk-button uk-button-large uk-button-primary';
        break;
    case 'button-link':
        $link_style = 'uk-button uk-button-link';
        break;
    default:
        $button_lightbox = '';
}

switch ($settings['lightbox_style']) {
    case 'icon':
    case 'icon-small':
    case 'icon-medium':
    case 'icon-large':
    case 'icon-button':
        $button_lightbox .= ' uk-icon-' . $settings['lightbox_icon'];
        $settings['lightbox_text'] = '';
        break;
}

// Buttons
$button_link = ($button_link) ? 'class="' . $button_link . '"' : '';
$button_lightbox = ($button_lightbox) ? 'class="' . $button_lightbox . '"' : '';

// Overlay Position
switch ($settings['overlay_position']) {
    case 'top_left':
        $overlay_position = 'uk-flex-top';
        break;
    case 'top_center':
        $overlay_position = 'uk-flex-top uk-flex-center';
        break;
    case 'top_right':
        $overlay_position = 'uk-flex-top uk-flex-right';
        break;
    case 'center_left':
        $overlay_position = 'uk-flex-middle';
        break;
    case 'center_center':
        $overlay_position = 'uk-flex-middle uk-flex-center';
        break;
    case 'center_right':
        $overlay_position = 'uk-flex-middle uk-flex-right';
        break;
    case 'bottom_left':
        $overlay_position = 'uk-flex-bottom';
        break;
    case 'bottom_center':
        $overlay_position = 'uk-flex-bottom uk-flex-center';
        break;
    case 'bottom_right':
        $overlay_position = 'uk-flex-bottom uk-flex-right';
        break;
}

// Overlay Background Color
$overlay_background_color = $settings['overlay_background_color'] ? 'tm-overlay-background-' . $settings['overlay_background_color'] : '';

// Overlay Blend Mode on Hover
$overlay_blend_hover = $settings['overlay_blend_mode'] ? 'tm-overlay-blend-' . $settings['overlay_blend_mode'] : '';

// Overlay Opacity
$overlay_opacity_hover = $settings['overlay_opacity'] ? 'tm-overlay-opacity-' . $settings['overlay_opacity'] : '';
switch ($settings['overlay_opacity']) {
    case '100':
        $overlay_opacity_background_hover = 'tm-overlay-opacity-100';
        $overlay_opacity = 'opacity: 1;';
        break;

    case '90':
        $overlay_opacity_background_hover = 'tm-overlay-opacity-90';
        $overlay_opacity = 'opacity: 0.9;';
        break;

    case '80':
        $overlay_opacity_background_hover = 'tm-overlay-opacity-80';
        $overlay_opacity = 'opacity: 0.8;';
        break;

    case '70':
        $overlay_opacity_background_hover = 'tm-overlay-opacity-70';
        $overlay_opacity = 'opacity: 0.7;';
        break;

    case '60':
        $overlay_opacity_background_hover = 'tm-overlay-opacity-60';
        $overlay_opacity = 'opacity: 0.6;';
        break;

    case '50':
        $overlay_opacity_background_hover = 'tm-overlay-opacity-50';
        $overlay_opacity = 'opacity: 0.5;';
        break;

    case '40':
        $overlay_opacity_background_hover = 'tm-overlay-opacity-40';
        $overlay_opacity = 'opacity: 0.4;';
        break;

    case '30':
        $overlay_opacity_background_hover = 'tm-overlay-opacity-30';
        $overlay_opacity = 'opacity: 0.3;';
        break;

    case '20':
        $overlay_opacity_background_hover = 'tm-overlay-opacity-20';
        $overlay_opacity = 'opacity: 0.2;';
        break;

    case '10':
        $overlay_opacity_background_hover = 'tm-overlay-opacity-10';
        $overlay_opacity = 'opacity: 0.1;';
        break;

    case '0':
        $overlay_opacity_background_hover = '';
        $overlay_opacity = 'opacity: 0;';
        break;

    default:
        $overlay_opacity_background_hover = '';
        $overlay_opacity = '';
        break;
}

// Animation
$animation = ($settings['animation'] != 'none') ? ' data-uk-scrollspy="{cls:\'uk-animation-' . $settings['animation'] . ' uk-invisible\', target:\'> div > .uk-panel\', delay:300}"' : '';

?>

<div class="tm-gallery-dolce-vita <?php echo $grid; ?> <?php echo $settings['class']; ?>" <?php echo $grid_js; ?> <?php echo $animation; ?>>

<?php foreach ($items as $item) : ?>
    <?php if ($item['media']) :

        // Link Target
        $link_target = ($settings['link_target']) ? ' target="_blank"' : '';

        // Thumbnails
        $thumbnail = '';
        if (($item->type('media') == 'image' || $item['media.poster'])) {

            $attrs           = array('class' => 'uk-invisible ');
            $width           = ($settings['image_width'] != 'auto') ? $settings['image_width'] : $item['media.width'];
            $height          = ($settings['image_height'] != 'auto') ? $settings['image_height'] : $item['media.height'];

            $attrs['alt']    = strip_tags($item['title']);
            $attrs['width']  = $width;
            $attrs['height'] = $height;

            if ($settings['image_width'] != 'auto' || $settings['image_height'] != 'auto') {
                $thumbnail = $item->thumbnail($item->type('media') == 'image' ? 'media' : 'media.poster', $width, $height, $attrs);
            } else {
                $thumbnail = $item->media($item->type('media') == 'image' ? 'media' : 'media.poster', $attrs);
            }
        }

        // Lightbox
        $lightbox = '';
        if ($settings['lightbox']) {
            if ($item->type('media') == 'image') {
                if ($settings['image_width'] != 'auto' || $settings['image_height'] != 'auto') {

                    $width  = ($settings['lightbox_width'] != 'auto') ? $settings['lightbox_width'] : $item['media.width'];
                    $height = ($settings['lightbox_height'] != 'auto') ? $settings['lightbox_height'] : $item['media.height'];

                    $lightbox = 'href="' . htmlspecialchars($item->thumbnail('media', $width, $height, $attrs, true)) . '" data-lightbox-type="image"';
                } else {
                    $lightbox = 'href="' . $item['media'] . '" data-lightbox-type="image"';
                }
            } else {
                $lightbox = 'href="' . $item['media'] . '"';
            }
        }

        // Lightbox Caption
        $lightbox_caption = '';
        if ($settings['lightbox_caption'] != 'none') {
            $lightbox_caption = $item[$settings['lightbox_caption']] ? 'title="' . htmlspecialchars($item[$settings['lightbox_caption']]) .'"' : '';
        }


        $buttons = array();
        if ($item['link'] && $settings['link']) {
            $buttons['link'] = '<a ' . $button_link . ' href="' . $item->escape('link') . '"' . $link_target . '>' . $app['translator']->trans($settings['link_text']) . '</a>';
        }
        if ($settings['lightbox'] && $settings['lightbox_link']) {
            $buttons['lightbox'] = '<a ' . $button_lightbox . ' ' . $lightbox . ' data-uk-lightbox="{group:\'.wk-2' . $settings['id'] . '\'}" ' . $lightbox_caption . '>' . $app['translator']->trans($settings['lightbox_text']) . '</a>';
        }

        // Overlay Hover
        $hover_overlay = ($settings['hover_overlay']) ? 'uk-overlay' : 'uk-ignore';

        // Overlay Background Color
        $overlay_background = ($settings['overlay_background'] != 'none') ? $overlay_background_color : '';

        // Blend Mode
        $overlay_blend_mode = (($settings['overlay_blend_mode']) && ($settings['overlay_background'] == 'static')) ? 'background-blend-mode: ' . $settings['overlay_blend_mode'] . ';' :  '';
        $overlay_blend_background_hover = ($settings['overlay_background'] == 'hover') ? $overlay_blend_hover : '';

        // Overlay Content Boxed
        $overlay_content_boxed = (($item['title'] || $item['content']) && $settings['overlay_boxed']) ? 'tm-content-boxed' : '';

        // Grid
        $grid_classes = array();
        $grid_classes[] = ($grid_seq['default']) ? ($grid_seq['default']['count']++ % $grid_seq['default']['max']) ? $grid_width : $grid_width_alt : '';
        $grid_classes[] = ($grid_seq['small'])   ? ($grid_seq['small']['count']++ % $grid_seq['small']['max']) ? $grid_width_small : $grid_width_small_alt : '';
        $grid_classes[] = ($grid_seq['medium'])  ? ($grid_seq['medium']['count']++ % $grid_seq['medium']['max']) ? $grid_width_medium : $grid_width_medium_alt : '';
        $grid_classes[] = ($grid_seq['large'])   ? ($grid_seq['large']['count']++ % $grid_seq['large']['max']) ? $grid_width_large : $grid_width_large_alt : '';
        $grid_classes[] = ($grid_seq['xlarge'])  ? ($grid_seq['xlarge']['count']++ % $grid_seq['xlarge']['max']) ? $grid_width_xlarge : $grid_width_xlarge_alt : '';

        $grid_classes = implode(' ', $grid_classes);

    ?>

    <div class="<?php echo $grid_classes; ?>">

        <div class="uk-panel uk-overlay <?php if (($settings['overlay_background'] == 'hover') || ($settings['hover_overlay'])) echo 'uk-overlay-hover'; ?> <?php if ($settings['animation'] != 'none') echo ' uk-invisible'; ?>">

            <div class="uk-position-relative uk-cover-background <?php echo $overlay_background; ?> <?php echo $overlay_blend_background_hover; ?>" style="background-image: url('<?php echo $item['media']; ?>'); <?php echo $overlay_blend_mode; ?>">

                <?php if ($settings['overlay_background'] != 'none') : ?>
                <div class="uk-overlay-panel tm-overlay-background-opacity <?php if ($settings['overlay_background'] == 'hover') echo $overlay_opacity_background_hover; ?>" <?php if ($settings['overlay_background'] == 'static') echo 'style="'. $overlay_opacity .'"'; ?>></div>
                <?php endif; ?>

                <?php echo $thumbnail; ?>

                <div class="uk-overlay-panel <?php echo $hover_overlay; ?> uk-flex <?php echo $overlay_position; ?>">

                    <div class="tm-overlay-content <?php echo $overlay_content_boxed; ?> uk-text-<?php echo ($settings['overlay_align']); ?>">

                        <?php if ($item['title'] && $settings['title']) : ?>
                        <h3 class="<?php echo $title_size; ?> uk-margin-small"><?php echo $item['title']; ?></h3>
                        <?php endif; ?>

                        <?php if ($item['content'] && $settings['content']) : ?>
                        <div class="uk-margin-small"><?php echo $item['content']; ?></div>
                        <?php endif; ?>

                        <?php if ($buttons) : ?>
                        <div class="uk-grid uk-grid-small uk-flex-center uk-margin" data-uk-grid-margin>

                            <?php if (isset($buttons['link'])) : ?>
                            <div><?php echo $buttons['link']; ?></div>
                            <?php endif; ?>

                            <?php if (isset($buttons['lightbox'])) : ?>
                            <div><?php echo $buttons['lightbox']; ?></div>
                            <?php endif; ?>

                        </div>
                        <?php endif; ?>

                    </div>
                </div>

                <?php if (!$buttons) : ?>
                    <?php if ($settings['lightbox']) : ?>
                        <a class="uk-position-cover" <?php echo $lightbox; ?> data-uk-lightbox="{group:'.wk-1<?php echo $settings['id']; ?>'}" <?php echo $lightbox_caption; ?>></a>
                    <?php elseif ($item['link']) : ?>
                        <a class="uk-position-cover" href="<?php echo $item->escape('link'); ?>"<?php echo $link_target; ?>></a>
                    <?php endif; ?>
                <?php endif; ?>

            </div>

        </div>

    </div>

    <?php
    if ($grid_seq['default']['count'] == $grid_seq['default']['max'] + 1) $grid_seq['default']['count'] = 0;
    if ($grid_seq['small']['count'] == $grid_seq['small']['max'] + 1) $grid_seq['small']['count'] = 0;
    if ($grid_seq['medium']['count'] == $grid_seq['medium']['max'] + 1) $grid_seq['medium']['count'] = 0;
    if ($grid_seq['large']['count'] == $grid_seq['large']['max'] + 1) $grid_seq['large']['count'] = 0;
    if ($grid_seq['xlarge']['count'] == $grid_seq['xlarge']['max'] + 1) $grid_seq['xlarge']['count'] = 0;
    ?>

    <?php endif; ?>
<?php endforeach; ?>

</div>
