<?php
/**
 * @copyright    Copyright (C) 2005 - 2008 Open Source Matters. All rights reserved.
 * @license        GNU/GPL, see LICENSE.php
 * Joomla! is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 * See COPYRIGHT.php for copyright notices and details.
 */

// no direct access
defined('_JEXEC') or die;

// get my params
$headerlogo = $this->params->get('headerlogo');
$sitetitle = $this->params->get('sitetitle');
?>

<!DOCTYPE html>
<head>
    <jdoc:include type="head"/>
    <link rel="stylesheet"
          href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/jf-template.css"
          type="text/css" media="screen"/>
    <link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template; ?>/css/jf-print.css"
          type="text/css" media="print"/>
</head>
<body class="contentpane">
<header>
    <?php if ($headerlogo): ?>
        <div class="headerlogo"><a href="<?php echo $this->baseurl ?>"> <img
                    src="<?php echo $this->baseurl ?>/<?php echo htmlspecialchars($headerlogo); ?>"
                    alt="<?php echo htmlspecialchars($sitetitle); ?>"/> </a></div>
    <?php endif; ?>
</header>
    <jdoc:include type="message"/>
    <jdoc:include type="component"/>
<footer>
    <div id="copy-pad"><p>JFlex | 2014 | adhocgraFX | &copy; | alle Rechte vorbehalten</p></div>
</footer>
</body>
</html>