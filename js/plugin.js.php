<?php
/*------------------------------------------------------------------------
# JoomFlex J3
# author    Johannes Hock | adhocgraFX
# copyright Copyright © 2012 Johannes Hock. All rights reserved.
# @license  http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Website   http://www.adhocgrafx.de
-------------------------------------------------------------------------*/

// get template params
$analytics = $this->params->get('analytics');
$anonym = $this->params->get('anonym');
$typesize = $this->params->get('typesize');
$textindent = $this->params->get('textindent');
$layout = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'mobile') : 'desktop');
$pageclass = $params->get('pageclass_sfx'); // parameter (menu entry)
$slidethumb = $this->params->get('slidethumb');
?>

<script type="text/javascript">

//  Avoid `console` errors in browsers that lack a console.
    (function() {
        var method;
        var noop = function () {};
        var methods = [
            'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
            'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
            'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
            'timeStamp', 'trace', 'warn'
        ];
        var length = methods.length;
        var console = (window.console = window.console || {});

        while (length--) {
            method = methods[length];

            // Only stub undefined methods.
            if (!console[method]) {
                console[method] = noop;
            }
        }
    }());

//  smooth scroll
	jQuery(document).ready(function() {
        jQuery('ul.mynav a').smoothScroll({
			speed: 600
		});
	});

//  text resizer
<?php if ($typesize == 1):?>
    jQuery(document).ready( function() {
    jQuery( "#textsizer-embed a" ).textresizer({
    target: "#main",
    type: "css",
    sizes: [
    // Small. Index 0
    { "font-size" : "87.5%",
    "line-height" : "1.4"
    },
    // Default. Index 1
    { "font-size" : "100%",
    "line-height" : "1.5"
    },
    // Large. Index 2
    { "font-size" : "112.5%",
    "line-height" : "1.5"
    },
    // X-Large. Index 3
    { "font-size" : "125%",
    "line-height" : "1.6"
    }],
    selectedIndex: 1
    });
    });
<?php endif; ?>

<?php if ($layout != 'mobile'):?>
    <?php if ($this->countModules('head_row') or $this->countModules('bottom_row')): ?>
        //  für gleiche modulhöhen - nun mit window load
        jQuery(window).load(function(){
            jQuery('.equal-1 .module-body').syncHeight({ 'updateOnResize': true});
            jQuery(window).resize(function(){
                if(jQuery(window).width() < 753){ jQuery('.equal-1 .module-body').unSyncHeight(); }
            });
        });
        jQuery(window).load(function(){
            jQuery('.equal-2 .module-body').syncHeight({ 'updateOnResize': true});
            jQuery(window).resize(function(){
                if(jQuery(window).width() < 753){ jQuery('.equal-2 .module-body').unSyncHeight(); }
            });
        });
        jQuery(window).load(function(){
            jQuery('.equal-3 .module-body').syncHeight({ 'updateOnResize': true});
            jQuery(window).resize(function(){
                if(jQuery(window).width() < 753){ jQuery('.equal-3 .module-body').unSyncHeight(); }
            });
        });
        jQuery(window).load(function(){
            jQuery('.equal-4 .module-body').syncHeight({ 'updateOnResize': true});
            jQuery(window).resize(function(){
                if(jQuery(window).width() < 753){ jQuery('.equal-4 .module-body').unSyncHeight(); }
            });
        });
    <?php endif; ?>

    <!-- responsive slideshow von viljamis -->
    <?php if ($this->countModules('slideshow')): ?>
        jQuery(window).load(function() {
            jQuery("#slider").responsiveSlides({
                <?php if ($slidethumb == 1):?>
                    auto: true,
                    //pager: true,
                    manualControls: '#slider-pager',
                    //nav: true,
                    speed: 1200,
                    //namespace: "centered-btns"
                <?php else : ?>
                    auto: true,
                    pager: false,
                    //manualControls: '#slider-pager',
                    nav: true,
                    speed: 1200,
                    namespace: "transparent-btns"
                <?php endif; ?>
            });
        });
    <?php endif; ?>

    // kompletter header auf startseite via pageclass sfx
    <?php if ($pageclass == "header-fullscreen"):?>
        jQuery(window).load(function() {
            var vHeight = jQuery(window).height(),
                header = jQuery('header');
                header.css({"height":vHeight});
            })
    <?php endif; ?>

<?php endif; ?>

<?php if ($layout == 'desktop'):?>
    // jquery stickem nur für desktop
    jQuery(document).ready(function() {
        jQuery('.stickem-container').stickem({
            <?php if ($this->countModules('slideshow')): ?>
                start: 1000
            <?php else: ?>
                start: 500
            <?php endif; ?>
        });
    })
<?php endif; ?>

<?php if ($layout != 'desktop'):?>
    //  Add this event to your JS to enable active states on all of your elements.
    //  This can be a bit slow on huge pages so it might be worth restricting it to certain elements instead of document
    document.addEventListener("touchstart", function(){}, true)
<?php endif; ?>

<?php if ($layout == 'tablet'):?>
    //  doubletaptogo by Osvaldas Valutis
    jQuery(function(){
        jQuery( '#nav li:has(ul)' ).doubleTapToGo();
    });
<?php endif; ?>

//  google analytics id
<?php if ($analytics != "UA-XXXXX-X"): ?>
    var _gaq=[['_setAccount','<?php echo htmlspecialchars($analytics); ?>'],['_trackPageview']];
    <?php if ($anonym == 1):?>
        _gaq.push (['_gat._anonymizeIp']);
    <?php endif; ?>
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';s.parentNode.insertBefore(g,s)}(document,'script'));
<?php endif; ?>

//  footable responsive tables
    jQuery(window).load(function() {
        jQuery('.footable').footable({
            phone: 480,
            tablet: 767
        });
    });

<?php if ($textindent == 1):?>
    //  text indent for bookstyle blogs
    jQuery(document).ready( function() {
    jQuery("p").has("img").css({
    "margin-top": ".75em",
    "margin-bottom": "1.5em",
    "text-indent": "0px"});
    jQuery("p").has("button").css({
    "margin-top": ".75em",
    "margin-bottom": ".75em",
    "text-indent": "0px"});
    jQuery("p").has("img").addClass("bild");
    })
<?php endif; ?>

</script>