<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_search
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
if ($imagebutton) {
	$img = JHtml::_('image', 'searchButton.png', $button_text, NULL, true, true);
	}
?>
<form action="<?php echo JRoute::_('index.php');?>" method="post">
	<div class="input-append pull-right search <?php echo $moduleclass_sfx ?>">
		<?php
			$output = '<label for="mod-search-searchword">'.$label.'</label>
			    <input name="searchword" id="mod-search-searchword" maxlength="'.$maxlength.'"  class="inputbox'.$moduleclass_sfx.'" type="text" size="'.$width.'" value="'.$text.'"  onblur="if (this.value==\'\') this.value=\''.$text.'\';" onfocus="if (this.value==\''.$text.'\') this.value=\'\';" />';

			if ($button) :
				if ($imagebutton) :
					$button = '<input type="image" value="'.$button_text.'" class="btn" src="'.$img.'" onclick="this.form.searchword.focus();"/>';
				else :
					$button = '<input type="submit" value="'.$button_text.'" class="btn" onclick="this.form.searchword.focus();"/>';
				endif;
			endif;

        switch ($button_pos) :
            case 'top' :
                $button = $button . '<br />';
                $output = $button . $output;
                break;

            case 'bottom' :
                $button = '<br />' . $button;
                $output = $output . $button;
                break;

            case 'right' :
                $output = $output . $button;
                break;

            case 'left' :
            default :
                $output = $button . $output;
                break;
        endswitch;

			echo $output;
		?>
	<input type="hidden" name="task" value="search" />
	<input type="hidden" name="option" value="com_search" />
	<input type="hidden" name="Itemid" value="<?php echo $mitemid; ?>" />
	</div>
</form>
