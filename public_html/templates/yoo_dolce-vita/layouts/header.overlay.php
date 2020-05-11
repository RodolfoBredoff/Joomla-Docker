<div class="tm-headerbar tm-headerbar-overlay">

    <?php if ($this['widgets']->count('logo')) : ?>
        <?php if ($this['widgets']->count('logo')) : ?>
            <div class="tm-logo-wrapper uk-hidden-small">
                 <div class="uk-flex uk-flex-center uk-flex-middle uk-height-1-1 uk-width-1-1">
                     <a class="tm-logo uk-navbar-brand" href="<?php echo $this['config']->get('site_url'); ?>"><?php echo $this['widgets']->render('logo'); ?></a>
                 </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <?php if ($this['widgets']->count('menu')) : ?>
    <div class="tm-navbar tm-navbar-centered<?php if ($this['config']->get('dropdown_overlay')) echo ' tm-navbar-overlay-true'; ?> uk-hidden-small">
        <nav class="uk-navbar uk-position-relative"
        <?php if ($this['config']->get('dropdown_overlay')) echo ' data-uk-dropdown-overlay="{cls: \'tm-dropdown-overlay\'}"'; ?>>
            <div class="uk-flex uk-flex-center">
                <?php echo $this['widgets']->render('menu'); ?>
            </div>
        </nav>
    </div>
    <?php endif; ?>

    <div class="uk-flex uk-flex-center uk-flex-middle uk-visible-small">
        <?php if ($this['widgets']->count('offcanvas + logo-small')) : ?>
        <a href="#offcanvas" class="tm-logo-small uk-text-center uk-navbar-brand" data-uk-offcanvas><?php echo $this['widgets']->render('logo-small'); ?></a>

        <?php elseif ($this['widgets']->count('offcanvas')) : ?>
        <a href="#offcanvas" class="uk-navbar-toggle" data-uk-offcanvas></a>

        <?php elseif ($this['widgets']->count('logo-small')) : ?>
        <a class="tm-logo-small uk-text-center uk-navbar-brand" href="<?php echo $this['config']->get('site_url'); ?>"><?php echo $this['widgets']->render('logo-small'); ?></a>
        <?php endif; ?>
    </div>

</div>
