<?php
/**
 * @version        $Id: error.php 17282 2010-05-26 15:24:49Z infograf768 $
 * @package        Joomla.Site
 * @copyright    Copyright (C) 2005 - 2011 Open Source Matters, Inc. All rights reserved.
 * @license        GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die('Restricted access');

// get my params
$headerlogo = $this->params->get('headerlogo');
$sitetitle = $this->params->get('sitetitle');
?>

<!doctype html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="language" content="<?php echo $this->language; ?>"/>
    <title><?php echo $this->error->getCode(); ?>-<?php echo $this->title; ?></title>

<?php if ($this->error->getCode() >= 400 && $this->error->getCode() < 500) { ?>

    <link rel="stylesheet"
          href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/jf-template.css"
          type="text/css" media="screen"/>
    </head>

    <body class="contentpane">

    <?php if ($headerlogo): ?>
        <div class="headerlogo"><a href="<?php echo $this->baseurl ?>"> <img
                    src="<?php echo $this->baseurl ?>/<?php echo htmlspecialchars($headerlogo); ?>"
                    alt="<?php echo htmlspecialchars($sitetitle); ?>"/> </a></div>
    <?php endif; ?>

    <!-- *****    Error Message Begins   ******** -->
    <section class="block-group error-wrapper">
        <div class="block error-info">
            <h2>Sorry, this page does not exist.</h2>
            <p class="lead"><a href="index.php">Please click here,</a> to go back to the main page.</p>
        </div>
        <div class="block error-info">
            <h2>Entschuldigung, diese Seite existiert leider nicht.</h2>
            <p class="lead"><a href="index.php">Klicken Sie bitte hier,</a> um zur Startseite zu gelangen.</p>
        </div>
    </section>
    <!-- ********  Error Message Ends  ********** -->

    </body>
    </html>
<?php } ?>