<?php

/**
 * @copyright	© 2011 adhocgraFX Johannes Hock 2011 - All Rights Reserved.
 * @copyright	JFlex responsive template ©
 * @license		GNU/GPL
**/

	header('Content-type: text/css');
	// get params
	$headlineColor = $this->params->get('headcolor');
	$fontColor = $this->params->get('fontcolor');
	$bodyColor = $this->params->get('bodycolor');
	$linkColor = $this->params->get('linkcolor');
	$hoverColor = $this->params->get('hovercolor');
	$bodybackground = $this->params->get('bodybackground');
	$headerColor = $this->params->get('headercolor');
    $footerColor = $this->params->get('footercolor');
    $hrowColor = $this->params->get('headrowcolor');
    $browColor = $this->params->get('bottomrowcolor');
    $headerbackimage = $this->params->get('headerbackimage');
    $maintitleColor = $this->params->get('mtcolor');
    $subtitleColor = $this->params->get('stcolor');
    $maxwidth = $this->params->get('maxwidth');
    $wunit = $this->params->get('wunit');
	$basefontsize = $this->params->get('basefontsize');
    $textindent = $this->params->get('textindent');
    $headfont = $this->params->get('headfont');
    $bodyfont = $this->params->get('bodyfont');
    $typesize = $this->params->get('typesize');
    $sozialbuttons = $this->params->get('sozialbuttons');
?>

<style type="text/css">
h1, h2, h3, h4, h5, h6, p.lead, p.bildlegende, p.autor, blockquote {
 	color: <?php echo $headlineColor;?> !important;
}
<?php if ($headfont != "default"):?>
	h1, h2, h3, h4, h5, h6 {
		font-family: <?php echo htmlspecialchars($headfont); ?>, Helvetica, Arial, 'Droid Sans', sans-serif; }
<?php endif;?>

html {font-size: <?php echo $basefontsize;?>%;}

body  {
    color: <?php echo $fontColor;?> !important;
 	<?php if ($bodyfont != "default"): ?>
		font-family: <?php echo htmlspecialchars($bodyfont); ?>, Helvetica, Arial, 'Droid Sans', sans-serif;
	<?php endif;?>

    <?php if ($layout != 'mobile'):?>
        <?php if ($bodybackground): ?>
            background: url(<?php echo $this->baseurl ?>/<?php echo htmlspecialchars($bodybackground);?>) center top no-repeat fixed;
 	    <?php else : ?>
		    background: <?php echo $bodyColor;?>;
	    <?php endif;?>
    <?php endif;?>
}

<?php if ($bodyfont != "default"): ?>
	.btn, dl.tabs h3, .panel h3.title  {
		font-family: <?php echo htmlspecialchars($bodyfont); ?>, Helvetica, Arial, 'Droid Sans', sans-serif;
	}
<?php endif;?>

#main-pad {
    max-width: <?php echo $maxwidth;?><?php echo $wunit;?>;
}

section#main {
    background: <?php echo $bodyColor;?>;
    opacity: 0.90;
    filter: Alpha(Opacity=90);
}

section.head-row {
    background: <?php echo $hrowColor;?>;
}

section.bottom-row {
    background: <?php echo $browColor;?>;
}

footer {
   background: <?php echo $footerColor;?>;
}

header {
    background-color: <?php echo $headerColor;?>;
}

@media screen and (min-width: 47em) {
    header {
        <?php if ($headerbackimage): ?>
            background-image: url("<?php echo $this->baseurl ?>/<?php echo htmlspecialchars($headerbackimage); ?>");
            background-position: center center;
            background-repeat: no-repeat;
            -webkit-background-size:100% 100%;
            -moz-background-size:100% 100%;
            -o-background-size:100% 100%;
            background-size:100% 100%;
        <?php endif; ?>
    }

    <?php if ($bodybackground): ?>
        section.head-row, section.bottom-row, footer {
            opacity: 0.85;
            filter: Alpha(Opacity=85);
        }
    <?php endif; ?>
}

@media screen and (min-width: 47em) {
    <?php if ($this->countModules('nav_mobile or sidebar')): ?>
        section[role ="main"] {
            width: 61.8%; /* goldener Schnitt */
        }
        aside[role="complementary"] {
            width: 38.2%; /* goldener Schnitt */
        }
    <?php else: ?>
        section[role ="main"] {
            width: 100%;
        }
    <?php endif; ?>
}

h1.logotext-top {
    color: <?php echo $maintitleColor;?> !important;
}
h1.logotext-sub {
    color: <?php echo $subtitleColor;?> !important;
}

<?php if ($bodybackground): ?>
	#outer-wrapper { background: transparent; }
	@media screen and (max-width: 48em) {
	    #outer-wrapper, #main-pad { background: <?php echo $bodyColor;?>; }
	}
<?php else : ?>
	#outer-wrapper, #main-pad { background: <?php echo $bodyColor;?>; }
<?php endif;?>

a, a:visited {
 	color: <?php echo $linkColor;?>;
}
a:hover, a:focus {
 	color: <?php echo $hoverColor;?>;
}

/* nav button > in less keine calc machbar?! */
a.button.nav-btn, button.nav-btn, input[type="submit"].nav-btn, input[type="reset"].nav-btn, input[type="button"].nav-btn {
    width: -webkit-calc(100% - 2em);
    width: -moz-calc(100% - 2em);
    width: calc(100% - 2em);
}

/* text indent for bookstyle blogs */
<?php if ($textindent == 1):?>
    article p + p {
        text-indent: 1.5em;
        margin-top: -.75em;
    }
    article p.bild + p,
    article p.lead + p,
    article p.img_caption + p,
    article p.bildlegende + p,
    article p.autor + p {
        text-indent: 0 !important;
    }
    article p.readmore {
        text-indent: 0 !important;
        display: block;
        margin: 1em 0 !important;
    }
    article p.readmore a {
        margin: 0 !important;
    }
<?php endif;?>

/* jquery stickem */
<?php if ($layout == 'desktop'):?>
    @media screen and (min-width: 47em) {
        .stickem-container {
            position: relative;
        }
        .stickit {
            position: fixed;
            top: 0;
            margin: 0;
        }
        .logotext.stickem.stickit {
            padding-top: .25em;
            z-index: 9999;
            width: 10em;
        }
        .logotext.stickem.stickit a h1.logotext-top {
            font-size: 1.7em;
        }
        .logotext.stickem.stickit a h1.logotext-sub {
            font-size: .82em;
        }

        .nav-close-pad.stickem.stickit {
            left: 0;
            margin-left: -1px;
            height: 3.33em;
            width: 100%;
            z-index: 99999;
            background: <?php echo $headerColor;?>;
            opacity: 0.85;
            filter: Alpha(Opacity=85);
            -moz-box-shadow: 0px 3px 6px 1px rgba(0,0,0,.2);
            -webkit-box-shadow: 0px 3px 6px 1px rgba(0,0,0,.2);
            box-shadow: 0px 3px 6px 1px rgba(0,0,0,.2);
        }

        .module.stickem.stickit {
            z-index: 99999;
            right: 1em;
            top: 3.5em;
            width: 12em;
        }

        .nav-module-pad.stickem.stickit {
            z-index: 999999;
            right: 1em;
            top: .15em;
            width: 12em;
        }

        .gototop-pad.stickem.stickit {
            z-index: 999;
            top: 90%;
            right: 1em;
            bottom: 2em;
            width: 3em;
        }

        .gototop-pad.stickem.stickit > ul.mynav {
            position: absolute;
            bottom: 0;
        }

        <?php if ($typesize == 1): ?>
        .textresizer-pad.stickem.stickit {
            z-index: 99999;
            top: 6em;
            right: 1em;
            width: 3em;
            height: 9em;
        }
        .textresizer-pad.stickem.stickit > ul.textresizer li a {
            float: none !important;
            margin: 0 0 .25em 0!important;
            width: 100% !important;
        }
        <?php endif;?>

        <?php if ($sozialbuttons == 1): ?>
        .social-buttons-pad.stickem.stickit {
            z-index: 99999;
            top: 18em;
            right: 1em;
            width: 3em;
            height: 9em;
        }
        .social-buttons-pad.stickem.stickit > ul.social-buttons li a {
            float: none !important;
            margin: 0 0 .25em 0!important;
            width: 100% !important;
        }
        <?php endif;?>

        .stickit-end {
            bottom: 0;
            position: absolute;
            right: 0;
        }
    }

    @media screen and (min-width: 80em) {
        .logotext.stickem.stickit {
            width: 10em;
        }
        .nav-module-pad.stickem.stickit {
            right: .75em;
            top: .2em;
        }
    }
<?php endif; ?>

</style>