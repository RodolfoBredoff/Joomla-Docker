<?php
/**
* @package   yoo_dolce-vita
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

// get theme configuration
include($this['path']->path('layouts:theme.config.php'));

?>
<!DOCTYPE HTML>
<html lang="<?php echo $this['config']->get('language'); ?>" dir="<?php echo $this['config']->get('direction'); ?>"  data-config='<?php echo $this['config']->get('body_config','{}'); ?>'>

    <head>
    <?php echo $this['template']->render('head'); ?>
    </head>

    <body class="<?php echo $this['config']->get('body_classes'); ?><?php echo $this['widgets']->count('bottom-offset') !== 0 ? ' tm-offset' : ''; ?>">

        <?php if ($this['config']->get('theme_frame')) : ?>
            <div class="tm-frame-top"></div>
            <div class="tm-frame-bottom"></div>
            <div class="tm-frame-right"></div>
            <div class="tm-frame-left"></div>
        <?php endif; ?>

        <?php if ($this['widgets']->count('logo + logo-small + headerbar + search + menu + offcanvas')) : ?>
            <?php echo $this['template']->render('header.'.$this['config']->get('navigation_style', 'default').''); ?>
        <?php endif; ?>

        <?php echo $this['config']->get('theme_frame') ? '<div class="tm-page-frame">' : '' ?>

        <?php if ($this['widgets']->count('top-a')) : ?>
        <div id="tm-top-a" class="tm-block-top-a uk-block <?php echo $classes['block.top-a']; ?>" <?php echo $styles['block.top-a']; ?>>

            <div class="uk-container uk-container-center">

                <section class="<?php echo $classes['grid.top-a']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
                    <?php echo $this['widgets']->render('top-a', array('layout'=>$this['config']->get('grid.top-a.layout'))); ?>
                </section>

            </div>

        </div>
        <?php endif; ?>

        <?php if ($this['widgets']->count('top-b')) : ?>
        <div id="tm-top-b" class="tm-block-top-b uk-block <?php echo $classes['block.top-b']; ?>" <?php echo $styles['block.top-b']; ?>>

            <div class="uk-container uk-container-center">

                <section class="<?php echo $classes['grid.top-b']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
                    <?php echo $this['widgets']->render('top-b', array('layout'=>$this['config']->get('grid.top-b.layout'))); ?>
                </section>

            </div>

        </div>
        <?php endif; ?>

        <?php if ($this['widgets']->count('top-c')) : ?>
        <div id="tm-top-c" class="tm-block-top-c uk-block <?php echo $classes['block.top-c']; ?>" <?php echo $styles['block.top-c']; ?>>

            <div class="uk-container uk-container-center">

                <section class="<?php echo $classes['grid.top-c']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
                    <?php echo $this['widgets']->render('top-c', array('layout'=>$this['config']->get('grid.top-c.layout'))); ?>
                </section>

            </div>

        </div>
        <?php endif; ?>

        <?php if ($this['widgets']->count('top-d')) : ?>
        <div id="tm-top-d" class="tm-block-top-d uk-block <?php echo $classes['block.top-d']; ?>" <?php echo $styles['block.top-d']; ?>>

            <div class="uk-container uk-container-center">

                <section class="<?php echo $classes['grid.top-d']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
                    <?php echo $this['widgets']->render('top-d', array('layout'=>$this['config']->get('grid.top-d.layout'))); ?>
                </section>

            </div>

        </div>
        <?php endif; ?>

        <?php if ($this['widgets']->count('main-top + main-bottom + sidebar-a + sidebar-b') || $this['config']->get('system_output', true)) : ?>
        <div id="tm-main" class="tm-block-main uk-block <?php echo $classes['block.main']; ?>" <?php echo $styles['block.main']; ?>>

            <div class="uk-container uk-container-center">

                <div class="tm-middle uk-grid" data-uk-grid-match data-uk-grid-margin>

                    <?php if ($this['widgets']->count('main-top + main-bottom') || $this['config']->get('system_output', true)) : ?>
                    <div class="<?php echo $classes['layout.main'] ?>">

                        <?php if ($this['widgets']->count('main-top')) : ?>
                        <section id="tm-main-top" class="tm-main-top <?php echo $classes['grid.main-top']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
                            <?php echo $this['widgets']->render('main-top', array('layout'=>$this['config']->get('grid.main-top.layout'))); ?>
                        </section>
                        <?php endif; ?>

                        <?php if ($this['config']->get('system_output', true)) : ?>
                        <main id="tm-content" class="tm-content<?php echo $this['config']->get('breadcrumb') == true ? ' tm-breadcrumb-centered' : ''; ?>">

                            <?php if ($this['widgets']->count('breadcrumbs')) : ?>
                            <?php echo $this['widgets']->render('breadcrumbs'); ?>
                            <?php endif; ?>

                            <?php echo $this['template']->render('content'); ?>

                        </main>
                        <?php endif; ?>

                        <?php if ($this['widgets']->count('main-bottom')) : ?>
                        <section id="tm-main-bottom" class="tm-main-bottom <?php echo $classes['grid.main-bottom']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
                            <?php echo $this['widgets']->render('main-bottom', array('layout'=>$this['config']->get('grid.main-bottom.layout'))); ?>
                        </section>
                        <?php endif; ?>

                    </div>
                    <?php endif; ?>

                    <?php foreach($sidebars as $name => $sidebar) : ?>
                    <aside class="<?php echo $classes["layout.$name"] ?>"><?php echo $this['widgets']->render($name) ?></aside>
                    <?php endforeach ?>

                </div>

            </div>

        </div>
        <?php endif; ?>

        <?php if ($this['widgets']->count('bottom-a')) : ?>
        <div id="tm-bottom-a" class="tm-block-bottom-a uk-block <?php echo $classes['block.bottom-a']; ?>" <?php echo $styles['block.bottom-a']; ?>>

            <div class="uk-container uk-container-center">

                <section class="<?php echo $classes['grid.bottom-a']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
                    <?php echo $this['widgets']->render('bottom-a', array('layout'=>$this['config']->get('grid.bottom-a.layout'))); ?>
                </section>

            </div>

        </div>
        <?php endif; ?>

        <?php if ($this['widgets']->count('bottom-b')) : ?>
        <div id="tm-bottom-b" class="tm-block-bottom-b uk-block <?php echo $classes['block.bottom-b']; ?>" <?php echo $styles['block.bottom-b']; ?>>

            <div class="uk-container uk-container-center">

                <section class="<?php echo $classes['grid.bottom-b']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
                    <?php echo $this['widgets']->render('bottom-b', array('layout'=>$this['config']->get('grid.bottom-b.layout'))); ?>
                </section>

            </div>

        </div>
        <?php endif; ?>

        <?php if ($this['widgets']->count('bottom-c')) : ?>
        <div id="tm-bottom-c" class="tm-block-bottom-c uk-block <?php echo $classes['block.bottom-c']; ?>" <?php echo $styles['block.bottom-c']; ?>>

            <div class="uk-container uk-container-center">

                <section class="<?php echo $classes['grid.bottom-c']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
                    <?php echo $this['widgets']->render('bottom-c', array('layout'=>$this['config']->get('grid.bottom-c.layout'))); ?>
                </section>

            </div>

        </div>
        <?php endif; ?>

        <?php if ($this['widgets']->count('bottom-d')) : ?>
        <div id="tm-bottom-d" class="tm-block-bottom-d uk-block <?php echo $classes['block.bottom-d']; ?>" <?php echo $styles['block.bottom-d']; ?>>

            <div class="uk-container uk-container-center">

                <section class="<?php echo $classes['grid.bottom-d']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
                    <?php echo $this['widgets']->render('bottom-d', array('layout'=>$this['config']->get('grid.bottom-d.layout'))); ?>
                </section>

            </div>

        </div>
        <?php endif; ?>

        <?php if ($this['widgets']->count('footer') || $this['widgets']->count('footer-left') || $this['widgets']->count('footer-right') || $this['widgets']->count('bottom-offset')) : ?>
        <div class="tm-block-footer uk-block <?php echo $classes['block.footer']; ?>" <?php echo $styles['block.footer']; ?>>

            <?php if ($this['widgets']->count('bottom-offset')) : ?>
            <section class="tm-bottom-offset">
                    <div class="uk-container uk-container-center tm-container">
                    <?php echo $this['widgets']->render('bottom-offset'); ?>
                </div>
            </section>
            <?php endif; ?>

            <div class="uk-container uk-container-center">

                <?php if ($this['widgets']->count('footer')) : ?>
                <section class="<?php echo $classes['grid.footer']; ?>" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin>
                    <?php echo $this['widgets']->render('footer', array('layout'=>$this['config']->get('grid.footer.layout'))); ?>
                </section>
                <?php endif; ?>

                <?php if ($this['widgets']->count('footer-left') || $this['widgets']->count('footer-right') || $this['config']->get('warp_branding', true) || $this['config']->get('totop_scroller', true)) : ?>
                <footer id="tm-footer" class="tm-footer-meta uk-flex uk-flex-middle uk-width-1-1">

                    <div class="tm-footer-left uk-flex uk-flex-middle">
                        <?php echo $this['widgets']->render('footer-left'); ?>
                        <?php if ($this['config']->get('warp_branding', true)) : ?>
                        <div><?php $this->output('warp_branding'); ?></div>
                        <?php endif; ?>
                    </div>

                    <div class="tm-footer-center uk-flex uk-flex-middle uk-flex-center uk-width-1-1">
                        <?php if ($this['config']->get('totop_scroller', true)) : ?>
                        <a id="tm-anchor-bottom" class="tm-totop-scroller" data-uk-smooth-scroll href="#"></a>
                        <?php endif; ?>
                    </div>

                    <div class="tm-footer-right uk-flex uk-flex-middle">
                        <?php echo $this['widgets']->render('footer-right'); ?>
                    </div>

                </footer>
                <?php endif; ?>

            </div>
        </div>
        <?php endif; ?>

        <?php if ($this['widgets']->count('offcanvas')) : ?>
        <div id="offcanvas" class="uk-offcanvas">
            <div class="uk-offcanvas-bar uk-offcanvas-bar-flip"><?php echo $this['widgets']->render('offcanvas'); ?></div>
        </div>
        <?php endif; ?>

        <?php if ($this['widgets']->count('fixed-bar')) : ?>
        <div class="tm-fixed-bar uk-hidden-small">
            <?php echo $this['widgets']->render('fixed-bar'); ?>
        </div>
        <?php endif; ?>

        <?php if ($this['widgets']->count('debug')) : ?>
            <?php echo $this['widgets']->render('debug'); ?>
        <?php endif; ?>

        <?php echo $this->render('footer'); ?>

        <?php echo $this['config']->get('theme_frame') ? '</div>' : '' ?>

    </body>
</html>
