<nav class="tm-headerbar tm-headerbar-single" <?php if ($this['config']->get('fixed_navigation')) echo 'data-uk-sticky'; ?>>

        <div class="tm-headerbar-left uk-flex uk-flex-middle">
            <?php if ($this['widgets']->count('logo')) : ?>
            <a class="tm-logo uk-navbar-brand uk-hidden-small uk-flex uk-flex-middle" href="<?php echo $this['config']->get('site_url'); ?>"><?php echo $this['widgets']->render('logo'); ?></a>
            <?php endif; ?>

            <?php if ($this['widgets']->count('logo-small')) : ?>
            <a class="tm-logo-small uk-visible-small" href="<?php echo $this['config']->get('site_url'); ?>"><?php echo $this['widgets']->render('logo-small'); ?></a>
            <?php endif; ?>
        </div>

        <?php if ($this['widgets']->count('menu')) : ?>
        <div class="uk-flex uk-flex-center uk-height-1-1 uk-position-relative<?php if ($this['config']->get('dropdown_overlay')) echo ' tm-navbar-overlay-true'; ?> uk-visible-large" <?php if ($this['config']->get('dropdown_overlay')) echo ' data-uk-dropdown-overlay="{cls: \'tm-dropdown-overlay\'}"'; ?>>
            <?php echo $this['widgets']->render('menu'); ?>
        </div>
        <?php endif; ?>

        <?php if ($this['widgets']->count('search + more + offcanvas')) : ?>
        <div class="tm-headerbar-right uk-flex uk-flex-middle">

            <?php if ($this['widgets']->count('search')) : ?>
            <div class="tm-search uk-visible-large ">
               <div data-uk-dropdown="{mode:'click', pos:'left-center'}">
                   <button class="tm-headerbar-button tm-search-button"></button>
                   <div class="uk-dropdown-blank tm-headerbar-dropdown">
                       <?php echo $this['widgets']->render('search'); ?>
                   </div>
               </div>
            </div>
            <?php endif; ?>

            <?php if ($this['widgets']->count('more')) : ?>
            <div class="tm-more uk-visible-large">
               <div data-uk-dropdown="{mode:'click', pos:'left-center'}">
                   <button class="tm-headerbar-button tm-more-button"></button>
                   <div class="uk-dropdown-blank tm-headerbar-dropdown">
                       <?php echo $this['widgets']->render('more'); ?>
                   </div>
               </div>
            </div>
            <?php endif; ?>

            <?php if ($this['widgets']->count('offcanvas')) : ?>
            <a href="#offcanvas" class="uk-navbar-toggle uk-hidden-large" data-uk-offcanvas></a>
            <?php endif; ?>

        </div>
        <?php endif; ?>

</nav>
