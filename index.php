<?php
/**
 * @copyright	© 2013 adhocgraFX Johannes Hock 2013 - All Rights Reserved.
 * @copyright	JFlex responsive template ©
 * @license		GNU/GPL
 * @copyright   blank-template index-php Grundstruktur mit css- und js-compressor: Alexander Schmidt
**/
defined( '_JEXEC' ) or die;

// joomla variables
$app = JFactory::getApplication();
$doc = JFactory::getDocument(); 
$params = $app->getParams();
$pageclass = $params->get('pageclass_sfx'); // parameter (menu entry)
$tpath = $this->baseurl.'/templates/'.$this->template;

$this->setGenerator(null);

// mobile detect usage von Rene Kreijveld
include_once ('js/Mobile_Detect.php');
$detect = new Mobile_Detect();
$layout = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'mobile') : 'desktop');

// template css
$doc->addStyleSheet($tpath.'/css/jf-template.css');

// modernizer mit html5-shiv must be in the head
$doc->addScript($tpath.'/js/modernizr-2.6.2-respond-1.1.0.min.js');

// get template params
$headfont = $this->params->get('headfont');
$bodyfont = $this->params->get('bodyfont');
$headerlogo = $this->params->get('headerlogo');
$sitetitle = $this->params->get('sitetitle');
$typesize = $this->params->get('typesize');
$maintitle = $this->params->get('maintitle');
$subtitle = $this->params->get('subtitle');
$sozialbuttons = $this->params->get('sozialbuttons');

// unset scripts
unset($doc->_scripts[$this->baseurl.'/media/jui/js/jquery.min.js']);
unset($doc->_scripts[$this->baseurl.'/media/jui/js/bootstrap.min.js']);

// Add Joomla! JavaScript Frameworks
// JHtml::_('bootstrap.framework');

// Add current user information
$user = JFactory::getUser();
?>

<!doctype html>
<!-- ... Modernisierungen ... -->
<!--[if IEMobile]> <html lang="<?php echo $this->language; ?>" class="iemobile"> <![endif]-->
<!--[if lt IE 7 ]> <html lang="<?php echo $this->language; ?>" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="<?php echo $this->language; ?>" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="<?php echo $this->language; ?>" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="<?php echo $this->language; ?>" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="<?php echo $this->language; ?>" class="no-js" xmlns="http://www.w3.org/1999/html"><!--<![endif]-->

<head>

<!-- js framework via cdn -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>

<!-- fonts -->
<?php if ($headfont != "default"): ?>
    <script src="http://use.edgefonts.net/<?php echo htmlspecialchars($headfont); ?>.js"></script>
<?php endif;?>
<?php if ($bodyfont != "default"): ?>
    <script src="http://use.edgefonts.net/<?php echo htmlspecialchars($bodyfont); ?>:n3,i3,n4,i4,n7,i7.js"></script>
<?php endif;?>

<!-- bildverkleinerung über mobify cdn -->
<?php if ($layout != 'desktop'):?>
<script>!function(a,b,c,d,e){function g(a,c,d,e){var f=b.getElementsByTagName("script")[0];a.src=e,a.id=c,a.setAttribute("class",d),f.parentNode.insertBefore(a,f)}a.Mobify={points:[+new Date]};var f=/((; )|#|&|^)mobify=(\d)/.exec(location.hash+"; "+b.cookie);if(f&&f[3]){if(!+f[3])return}else if(!c())return;b.write('<plaintext style="display:none">'),setTimeout(function(){var c=a.Mobify=a.Mobify||{};c.capturing=!0;var f=b.createElement("script"),h="mobify",i=function(){var c=new Date;c.setTime(c.getTime()+3e5),b.cookie="mobify=0; expires="+c.toGMTString()+"; path=/",a.location=a.location.href};f.onload=function(){if(e)if("string"==typeof e){var c=b.createElement("script");c.onerror=i,g(c,"main-executable",h,mainUrl)}else a.Mobify.mainExecutable=e.toString(),e()},f.onerror=i,g(f,"mobify-js",h,d)})}(window,document,function(){var a=/webkit|msie\s10|(firefox)[\/\s](\d+)|(opera)[\s\S]*version[\/\s](\d+)|3ds/i.exec(navigator.userAgent);return a?a[1]&&+a[2]<4?!1:a[3]&&+a[4]<11?!1:!0:!1},
// path to mobify.js
"//cdn.mobify.com/mobifyjs/build/mobify-2.0.0.min.js",
// calls to APIs go here
function() {
  var capturing = window.Mobify && window.Mobify.capturing || false;
  if (capturing) {
    Mobify.Capture.init(function(capture){
      var capturedDoc = capture.capturedDoc;
      var images = capturedDoc.querySelectorAll("img, picture");
      Mobify.ResizeImages.resize(images);
      // Render source DOM to document
      capture.renderCapturedDoc();
    });
  }
});
</script>
<?php endif; ?>

<jdoc:include type="head" />

<!-- Mobile Specific Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="HandheldFriendly" content="true" />
<meta name="apple-touch-fullscreen" content="YES" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<!-- load css options -->
<?php include_once ('css/styles-css.php'); ?>

<!-- Favicons -->
<link rel="shortcut icon" href="<?php echo $tpath; ?>/favicon.ico">
<link rel="apple-touch-icon" href="<?php echo $tpath; ?>/images/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $tpath; ?>/images/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $tpath; ?>/images/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo $tpath; ?>/images/apple-touch-icon-ipad-144.png" />
<!-- Win8 tile 144x144 -->
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="<?php echo $tpath; ?>/images/tile-icon.png">

</head>

<body class="<?php echo $pageclass; ?>">

<!-- äußerer Rahmen	-->
<div id="outer-wrapper">
	<?php if ($layout == 'mobile'):?>
	    <noscript>
	        <div class="nav-simple-btn" role="navigation" > <a href="#simple-nav">Simple Navigation</a> </div>
	    </noscript>
	<?php endif; ?>
    <!--  innerer Rahmen  -->
    <div id="inner-wrapper" class="stickem-container">
        <!-- header -->
        <header id="top" role="banner">
            <?php if ($layout == 'mobile'):?>
                <div role="navigation" >
				    <button class="btn btn-inverse nav-btn" id="nav-open-btn" >
				        <a href="#nav"><?php echo JText::_('TPL_JF3_NAVOPEN'); ?></a>
				    </button>
			    </div>
            <?php endif;?>
            <!-- seitliches logobild  -->
            <?php if ($headerlogo): ?>
                <?php if ($layout != 'mobile'):?>
                    <div class="headerlogo"> <a href="<?php echo $this->baseurl ?>"> <img src="<?php echo $this->baseurl ?>/<?php echo htmlspecialchars($headerlogo); ?>"  alt="<?php echo htmlspecialchars($sitetitle); ?>" /> </a> </div>
                <?php endif;?>
            <?php endif;?>
            <!-- logotext  -->
            <div class="logotext stickem"> <a href="<?php echo $this->baseurl ?>"><h1 class="logotext-top"><?php echo htmlspecialchars($maintitle); ?></h1><h1 class="logotext-sub"><?php echo htmlspecialchars($subtitle); ?></h1> </a> </div>
            <!-- slideshow -->
            <?php if ($layout != 'mobile'):?>
                <?php if ($this->countModules('slideshow')): ?>
                    <div class="slideshow-pad rslides_container">
                        <jdoc:include type="modules" name="slideshow" />
                    </div>
                <?php endif;?>
            <?php endif;?>
            <nav id="nav" role="navigation">
                <div class="nav-close-pad stickem">
                    <jdoc:include type="modules" name="nav" />
                    <!-- module pos inside nav and sidebar -->
                    <?php if ($layout == 'mobile'):?>
                        <jdoc:include type="modules" name="nav_mobile" />
                    <?php endif;?>
                    <button class="btn btn-inverse close-btn" id="nav-close-btn" >
                        <a href="#top"><?php echo JText::_('TPL_JF3_NAVCLOSE'); ?></a>
                    </button>
                </div>
                <!-- module pos inside nav eg search -->
                <?php if ($this->countModules('nav_module')): ?>
                    <div class="nav-module-pad stickem" role="search">
                        <jdoc:include type="modules" name="nav_module" style="joomskeleton" />
                    </div>
                <?php endif;?>
            </nav>
        </header>
        <!-- head row -->
        <?php if ($layout != 'mobile'):?>
            <?php if ($this->countModules('head_row')): ?>
                <section class="head-row row-fluid" role="complementary">
			        <jdoc:include type="modules" name="head_row" style="joomskeleton" />
                </section>
		    <?php endif; ?>
        <?php endif; ?>
        <!-- content Rahmen-->
        <section class="block-group" id="main-pad">
            <!-- content head row -->
            <?php if ($layout != 'mobile'):?>
                <?php if ($this->countModules('content_head_row')): ?>
                    <section class="content_head-row block row-fluid" role="complementary">
                        <jdoc:include type="modules" name="content_head_row" style="joomskeleton" />
                    </section>
                <?php endif; ?>
            <?php endif; ?>
            <!-- 2 columns: content + message above content | sidebar -->
		    <section class="block" id="main" role="main">
                <!-- message -->
                <jdoc:include type="message" />
                <!-- old browser info -->
                <!--[if lt IE 9]> <p class="box alert">You are using an outdated browser. Please <a href="http://browsehappy.com/" target="_blank">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true" target="_blank">activate Google Chrome Frame</a> to improve your experience.</p> <![endif]-->
                <!-- typeresizer -->
                <?php if ($layout == 'mobile'):?>
                    <?php if ($typesize == 1): ?>
                        <div class="textresizer-pad stickem">
                            <ul class="textresizer" id="textsizer-embed">
                                <li><a href="#nogo" class="small-text" title="<?php echo JText::_('TPL_JF3_SMALL'); ?>"><span class="icon-angle-down icon-large"></span></a></li>
                                <li><a href="#nogo" class="default-text" title="<?php echo JText::_('TPL_JF3_DEFAULT'); ?>"><span class="icon-text-height icon-large"></span></a></li>
                                <li><a href="#nogo" class="large-text" title="<?php echo JText::_('TPL_JF3_LARGE'); ?>"><span class="icon-angle-up icon-large"></span></a></li>
                                <li><a href="#nogo" class="x-large-text" title="<?php echo JText::_('TPL_JF3_XLARGE'); ?>"><span class="icon-double-angle-up icon-large"></a></li>
                            </ul>
                        </div>
                    <?php endif;?>
                <?php endif;?>
                <!-- content -->
                <jdoc:include type="component" />
                <!-- breadcrumbs -->
                <?php if ($this->countModules('breadcrumbs')): ?>
                    <div class="breadcrumbs-pad" role="navigation">
                        <jdoc:include type="modules" name="breadcrumbs" />
                    </div>
                <?php endif; ?>
            </section>
            <aside class="block" id="sidebar" role="complementary">
                <!-- typeresizer -->
                <?php if ($layout != 'mobile'):?>
                    <?php if ($typesize == 1): ?>
                        <div class="textresizer-pad stickem">
                            <ul class="textresizer" id="textsizer-embed">
                                <li><a href="#nogo" class="small-text" title="<?php echo JText::_('TPL_JF3_SMALL'); ?>"><span class="icon-angle-down icon-large"></span></a></li>
                                <li><a href="#nogo" class="default-text" title="<?php echo JText::_('TPL_JF3_DEFAULT'); ?>"><span class="icon-text-height icon-large"></span></a></li>
                                <li><a href="#nogo" class="large-text" title="<?php echo JText::_('TPL_JF3_LARGE'); ?>"><span class="icon-angle-up icon-large"></span></a></li>
                                <li><a href="#nogo" class="x-large-text" title="<?php echo JText::_('TPL_JF3_XLARGE'); ?>"><span class="icon-double-angle-up icon-large"></a></li>
                            </ul>
                        </div>
                    <?php endif;?>
                <?php endif;?>
                <!-- module pos inside nav and sidebar -->
                <?php if ($layout != 'mobile'):?>
                    <jdoc:include type="modules" name="nav_mobile" style="joomskeleton" />
                <?php endif;?>
                <jdoc:include type="modules" name="sidebar" style="joomskeleton"  />
            </aside>
            <!-- content head row content first in mobile moder-->
            <?php if ($layout == 'mobile'):?>
                <?php if ($this->countModules('content_head_row')): ?>
                    <section class="content_head-row block row-fluid" role="complementary">
                        <jdoc:include type="modules" name="content_head_row" style="joomskeleton" />
                    </section>
                <?php endif; ?>
            <?php endif; ?>
            <!-- content bottom row-->
            <?php if ($this->countModules('content_bottom_row')): ?>
                <section class="content_bottom-row block row-fluid" role="complementary">
                    <jdoc:include type="modules" name="content_bottom_row" style="joomskeleton" />
                </section>
            <?php endif; ?>
        </section> <!-- content Rahmen -->
        <!-- head row content first in mobile mode -->
        <?php if ($layout == 'mobile'):?>
            <?php if ($this->countModules('head_row')): ?>
		        <section class="head-row row-fluid" role="complementary">
			        <jdoc:include type="modules" name="head_row" style="joomskeleton" />
		        </section>
		    <?php endif; ?>
        <?php endif; ?>
        <!-- bottom row -->
		<?php if ($this->countModules('bottom_row')): ?>
		    <section class="bottom-row row-fluid" role="complementary">
			    <jdoc:include type="modules" name="bottom_row" style="joomskeleton" />
		    </section>
		<?php endif; ?>
        <!-- footer -->
        <footer role="contentinfo">
            <!-- footer module -->
            <?php if ($this->countModules('footer')): ?>
			    <jdoc:include type="modules" name="footer" style="joomskeleton" />
		    <?php endif; ?>
            <!--	simple navi alternative-->
		    <?php if ($layout == 'mobile'):?>
		        <noscript>
		            <div id="simple-nav">
			            <jdoc:include type="modules" name="nav" />
		            </div>
		           </noscript>
		    <?php endif; ?>
            <!-- delete me - if you don't like me -->
            <div class="copy-pad">
                <a href="http://www.adhocgrafx.de" target="_blank">adhocgraFX &copy; Johannes Hock, 2014</a>
            </div>
            <!-- sozial buttons -->
            <?php if ($sozialbuttons == 1): ?>
                <div class="social-buttons-pad stickem">
                    <ul class="social-buttons">
                        <li><a href="https://twitter.com/" target="_blank" title="twitter"><span class="icon-twitter icon-large"></span></a></li>
                        <li><a href="https://plus.google.com/" target="_blank" title="google plus"><span class="icon-google-plus icon-large"></span></a></li>
                        <li><a href="https://github.com/" target="_blank" title="github"><span class="icon-github icon-large"></span></a></li>
                        <li><a href="https://www.facebook.com/" target="_blank" title="facebook"><span class="icon-facebook icon-large"></span></a></li>
                    </ul>
                </div>
            <?php endif;?>
            <!--  just go to top  -->
            <div class="gototop-pad stickem">
                <ul class="mynav">
                    <li><a href="#top"><span class="icon-chevron-up"></span><p hidden>go to top</p></a></li>
                </ul>
            </div>
        </footer>
    </div> <!-- innerer Rahmen-->
</div> <!-- äußerer Rahmen-->

<!-- debug -->
<jdoc:include type="modules" name="debug" />

<!--  load plugin scripts -->
<?php if ($layout != 'mobile'):?>
    <script type="text/javascript" src="<?php echo $tpath.'/js/template.desktop.js.php';?>"></script>
<?php elseif ($layout == 'mobile'):?>
    <script type="text/javascript" src="<?php echo $tpath.'/js/template.mobile.js.php';?>"></script>
<?php endif; ?>

<!-- load plugin options -->
<?php include_once ('js/plugin.js.php'); ?>

</body>
</html>