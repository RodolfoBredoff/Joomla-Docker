<?php
/**
* @package   yoo_dolce-vita
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

// JS Options
$options = array();
$options[] = (!$settings['infinite']) ? 'infinite: false' : '';
$options[] = ($settings['center']) ? 'center: true' : '';
$options[] = ($settings['autoplay']) ? 'autoplay: true ' : '';
$options[] = ($settings['interval'] != '3000') ? 'autoplayInterval: ' . $settings['interval'] : '';
$options[] = ($settings['autoplay_pause']) ? '' : 'pauseOnHover: false';

$options = '{'.implode(',', array_filter($options)).'}';

// Grid
$grid  = 'uk-grid uk-grid-match uk-flex-center uk-grid-width-1-'.$settings['columns'];
$grid .= $settings['columns_small'] ? ' uk-grid-width-small-1-'.$settings['columns_small'] : '';
$grid .= $settings['columns_medium'] ? ' uk-grid-width-medium-1-'.$settings['columns_medium'] : '';
$grid .= $settings['columns_large'] ? ' uk-grid-width-large-1-'.$settings['columns_large'] : '';
$grid .= $settings['columns_xlarge'] ? ' uk-grid-width-xlarge-1-'.$settings['columns_xlarge'] : '';

$grid .= ($settings['gutter'] == 'collapse') ? ' uk-grid-collapse' : '' ;
$grid .= ($settings['gutter'] == 'small') ? ' uk-grid-small' : '' ;
$grid .= ($settings['gutter'] == 'large') ? ' uk-grid-large' : '' ;
$grid .= ($settings['gutter'] == 'x-large') ? ' uk-grid-xlarge' : '' ;

// Title Size
switch ($settings['title_size']) {
    case 'large':
        $title_size = 'uk-heading-large uk-margin-top-remove';
        break;
    default:
        $title_size = 'uk-' . $settings['title_size'] . ' uk-margin-remove';
}

// Content Size
switch ($settings['content_size']) {
    case 'large':
        $content_size = 'uk-text-large';
        break;
    case 'h2':
    case 'h3':
    case 'h4':
    case 'h5':
    case 'h6':
        $content_size = 'uk-' . $settings['content_size'];
        break;
    default:
        $content_size = '';
}

// Badge Style
switch ($settings['badge_style']) {
    case 'badge':
        $badge_style = 'uk-badge';
        break;
    case 'success':
        $badge_style = 'uk-badge uk-badge-success';
        break;
    case 'warning':
        $badge_style = 'uk-badge uk-badge-warning';
        break;
    case 'danger':
        $badge_style = 'uk-badge uk-badge-danger';
        break;
    case 'text-muted':
        $badge_style  = 'uk-text-muted tm-font-alt-2';
        $badge_style .= ($settings['badge_position'] == 'panel') ? ' uk-panel-badge' : '';
        break;
    case 'text-primary':
        $badge_style  = 'uk-text-primary tm-font-alt-2';
        $badge_style .= ($settings['badge_position'] == 'panel') ? ' uk-panel-badge' : '';
        break;
}

// Link Style
switch ($settings['link_style']) {
    case 'button':
        $link_style = 'uk-button';
        break;
    case 'primary':
        $link_style = 'uk-button uk-button-primary';
        break;
    case 'button-large':
        $link_style = 'uk-button uk-button-large';
        break;
    case 'primary-large':
        $link_style = 'uk-button uk-button-large uk-button-primary';
        break;
    case 'button-link':
        $link_style = 'uk-button uk-button-link';
        break;
    default:
        $link_style = '';
}

// Link Target
$link_target = ($settings['link_target']) ? ' target="_blank"' : '';

// Position Relative
if ($settings['slidenav'] == 'default') {
    $position_relative = 'uk-slidenav-position';
} else {
    $position_relative = 'uk-position-relative';
}

// Overlays
$overlay_hover = ($settings['overlay_hover']) ? 'uk-overlay-' . $settings['overlay_animation'] : 'uk-ignore';
$background = ($settings['overlay_background'] == true) ? 'uk-overlay-' . $settings['overlay_animation'] : 'uk-ignore';

// Overlay Position
$overlay_position = $settings['overlay_position'] ? 'uk-overlay-' . $settings['overlay_position'] : '';

// Item Size
// Overlay Blend Mode on Hover
$item_size = $settings['item_size'] ? ' tm-scale-' . $settings['item_size'] : '';

?>

<div class="tm-slider-dolce-vita <?php echo $position_relative; ?> <?php echo $settings['class']; ?>" data-uk-slider="<?php echo $options; ?>">

    <div class="uk-slider-container<?php echo $item_size; ?>">
        <ul class="uk-slider<?php if ($settings['fullscreen']) echo ' uk-slider-fullscreen'; ?> <?php echo $grid; ?>">
        <?php foreach ($items as $item) :

                // Media Type
                $width = $item['media.width'];
                $height = $item['media.height'];

                if ($item->type('media') == 'image' && $settings['media']) {
                    if ($settings['image_width'] != 'auto' || $settings['image_height'] != 'auto') {

                        $width  = ($settings['image_width'] != 'auto') ? $settings['image_width'] : '';
                        $height = ($settings['image_height'] != 'auto') ? $settings['image_height'] : '';

                        $media = 'background-image: url(' . $item->thumbnail('media', $width, $height, array(), true) . '); background-position: 50%;';

                    } else {
                        $media = 'background-image: url(' . $item['media'] . '); background-position: 50%;';
                    }
                } else {
                    $media = '';
                }

                // `min-height` doesn't work in IE11 and IE10 if flex items are centered vertically
                // can't set `height` when fullscreen
                $min_height = (!$settings['fullscreen']) ? 'height: ' . $settings['min_height'] . 'px;' : '';

                if ($settings['overlay_image'] != 'hover') {
                    $media = 'style="' . $min_height . $media . '"';
                }

                // Second Image as Overlay
                $media2 = '';
                if ($settings['overlay_image'] == 'second') {
                    foreach ($item as $field) {
                        if ($field != 'media' && $item->type($field) == 'image') {
                            $media2 = 'style="background-image: url(' . $item->thumbnail($field, $width, $height, array(), true) . ');"';
                            break;
                        }
                    }
                }

                if ($settings['overlay_image'] == 'hover') {
                    $media2 = 'style="' . $media . '"';
                    $media  = 'style="' . $min_height . '"';
                }

            ?>

            <li>

                <div class="uk-panel uk-panel-hover uk-overlay uk-overlay-hover uk-cover-background" <?php echo $media; ?>>

                    <div class="uk-position-cover" <?php echo $media; ?>>

                        <?php if ($media2) : ?>
                        <div class="uk-overlay-panel uk-cover-background <?php if ($settings['image_animation'] != 'none') echo 'uk-overlay-' . $settings['image_animation']; ?>" <?php echo $media2; ?>></div>
                        <?php endif; ?>

                        <div class="uk-overlay-panel <?php echo $overlay_hover; ?> <?php if ($settings['overlay_background'] != false) echo ' uk-overlay-background'; ?> <?php echo $overlay_position; ?> uk-flex uk-flex-center uk-flex-middle uk-text-<?php echo $settings['text_align']; ?>">
                            <div class="uk-width-1-1">

                                <?php if ($item['badge'] && $settings['badge'] && $settings['badge_position'] == 'panel') : ?>
                                <div class="uk-panel-badge <?php echo $badge_style; ?>"><?php echo $item['badge']; ?></div>
                                <?php endif; ?>

                                <?php if ($item['title'] && $settings['title']) : ?>
                                <h3 class="<?php echo $title_size; ?>">

                                    <?php if ($item['link']) : ?>
                                        <a class="uk-link-reset" href="<?php echo $item->escape('link') ?>"<?php echo $link_target; ?>><?php echo $item['title']; ?></a>
                                    <?php else : ?>
                                        <?php echo $item['title']; ?>
                                    <?php endif; ?>

                                    <?php if ($item['badge'] && $settings['badge'] && $settings['badge_position'] == 'title') : ?>
                                    <span class="uk-margin-small-left <?php echo $badge_style; ?>"><?php echo $item['badge']; ?></span>
                                    <?php endif; ?>

                                </h3>
                                <?php endif; ?>

                                <?php if ($item['content'] && $settings['content']) : ?>
                                <div class="<?php echo $content_size; ?> uk-margin-remove"><?php echo $item['content']; ?></div>
                                <?php endif; ?>

                                <?php if ($item['link'] && $settings['link']) : ?>
                                <p class="uk-margin-top-remove"><a<?php if($link_style) echo ' class="' . $link_style . '"'; ?> href="<?php echo $item->escape('link'); ?>"<?php echo $link_target; ?>><?php echo $app['translator']->trans($settings['link_text']); ?></a></p>
                                <?php endif; ?>

                            </div>
                        </div>

                        <?php if ($item['link'] && $settings['overlay_link']) : ?>
                        <a class="uk-position-cover" href="<?php echo $item->escape('link'); ?>"<?php echo $link_target; ?>></a>
                        <?php endif; ?>

                    </div>

                </div>

            </li>

        <?php endforeach; ?>
        </ul>
    </div>

    <?php if (in_array($settings['slidenav'], array('top-left', 'top-right', 'bottom-left', 'bottom-right'))) : ?>
    <div class="uk-position-<?php echo $settings['slidenav']; ?> uk-margin uk-margin-left uk-margin-right">
        <div class="uk-grid uk-grid-small">
            <div><a href="#" class="uk-slidenav <?php if ($settings['slidenav_contrast']) echo 'uk-slidenav-contrast'; ?> uk-slidenav-previous" data-uk-slider-item="previous"></a></div>
            <div><a href="#" class="uk-slidenav <?php if ($settings['slidenav_contrast']) echo 'uk-slidenav-contrast'; ?> uk-slidenav-next" data-uk-slider-item="next"></a></div>
        </div>
    </div>
    <?php elseif ($settings['slidenav'] == 'default') : ?>
    <a href="#" class="uk-slidenav <?php if ($settings['slidenav_contrast']) echo 'uk-slidenav-contrast'; ?> uk-slidenav-previous uk-hidden-touch" data-uk-slider-item="previous"></a>
    <a href="#" class="uk-slidenav <?php if ($settings['slidenav_contrast']) echo 'uk-slidenav-contrast'; ?> uk-slidenav-next uk-hidden-touch" data-uk-slider-item="next"></a>
    <?php endif ?>

</div>
