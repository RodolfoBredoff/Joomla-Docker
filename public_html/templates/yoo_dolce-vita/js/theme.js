/* Copyright (C) YOOtheme GmbH, YOOtheme Proprietary Use License (http://www.yootheme.com/license) */

jQuery(function($) {

    // Options
    var config = $('html').data('config') || {};

    // Social buttons
    $('article[data-permalink]').socialButtons(config);

    // Trigger focus on search input
    $(".tm-search-button").on('click', UIkit.Utils.debounce(function () {
        this.parentNode.querySelector('.uk-search-field').focus();
    }, 300));

    // 'tm-headerbar-overlay' scroll event trigger
    var header = $('.tm-headerbar-overlay');

    $(document).on('scrolling.uk.document', function(){

        header[window.scrollY > 100 ? 'addClass':'removeClass']('tm-navbar-open');
    });

    // Offset block 'tm-block-offset'
    $(window).on('resize load', UIkit.Utils.debounce(function() {

        var offsetblock = $('.tm-bottom-offset'), offsetheight, offsetbefore, offsetafter, paddingbefore, paddingafter;

        var fn = function() {

            if (offsetblock.length) {

                offsetafter   = offsetblock.parent().css('padding-top', '');
                offsetbefore  = offsetafter.prev('.uk-block').css('padding-bottom', '').addClass("tm-block-offset-parent");
                paddingbefore = parseInt(offsetbefore.css('padding-bottom'));
                paddingafter  = parseInt(offsetafter.css('padding-top'));

                offsetheight  = Math.ceil(offsetblock.outerHeight()/2);

                if (offsetblock.css('position') == 'absolute') {
                    offsetbefore.css('padding-bottom', paddingbefore + offsetheight);
                    offsetafter.css('padding-top', paddingafter + offsetheight);
                }
            }

            return fn;
        };

        return fn();

    }(), 100));

    // Dotnav Follower 'tm-dotnav-follower'
    $('[data-uk-nav-follower]').each(function(){

        var ele      = $(this),
            follower = $('<div class="tm-dotnav-follower"></div>').prependTo(this),
            nav      = ele.find('ul:first'),
            children = nav.children();

        var ids     = [],
            links   = ele.find("a[href^='#']").each(function(){ if(this.getAttribute("href").trim()!=='#') ids.push(this.getAttribute("href")); }),
            targets = $(ids.join(',')),
            inviews;



        ele.on('inview.uk.scrollspynav', function() {

            inviews = [];

            for (var i=0 ; i < targets.length ; i++) {

                if (UIkit.Utils.isInView(targets.eq(i), {topoffset:-40})) {
                    inviews.push(children.eq(i));
                }
            }

            follower.css({
                top:inviews[0].position().top,
                left:inviews[0].position().left,
                height: inviews.length * inviews[0].outerHeight(true) - parseInt(inviews[0].css('margin-top'))
            });

        });
    });


});
