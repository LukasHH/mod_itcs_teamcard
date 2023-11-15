<?php
/**
* ------------------------------------------------------------------------
* @package     mod_itcs_teamcard - CSS3 based Module by it-conserv.de
* @author      it-conserv.de
* @copyright   2023 it-conserv.de
* @license     GNU/GPLv3 <http://www.gnu.org/licenses/gpl-3.0.de.html>,
* @license     CSS Style is licensed under GNU/GPL and resource from http://littlesnippets.net/
* @link        https://it-conserv.de
* ------------------------------------------------------------------------
*/

// no direct access
defined('_JEXEC') or die;

use Joomla\CMS\Helper\ModuleHelper;
use Joomla\CMS\Factory;
use \Joomla\CMS\HTML\HTMLHelper;

$uniqid				= $module->id;

// BASIC SETTINGS
$back_color	= $params->get('backcolor');		// Background color
$text_color = $params->get('textcolor');		// Text Color
$mid_color	= $params->get('dcolor');			// Middle diamond color
$tc_align	= $params->get('tc_align');			// tc1 -> one card centered per row, tc2 -> left fluid


// LINK_BASIC_SETTINGS
$load_ion   = (int)$params->get('load_ion');

$show_1		= $params->get('show_1');
$icon_1		= $params->get('icon_1');
$show_2		= $params->get('show_2');
$icon_2		= $params->get('icon_2');
$show_3		= $params->get('show_3');
$icon_3		= $params->get('icon_3');

$teamcards = $params->get('teamcards');

// Load CSS/JS
$wa = Factory::getApplication()->getDocument()->getWebAssetManager();
$wa->getRegistry()->addRegistryFile('media/mod_itcs_teamcard/joomla.asset.json');
$wa->useStyle('mod_itcs_teamcard.style');

// load ionicon font
if ($load_ion === 1) $wa->useStyle('mod_itcs_teamcard.ion');

// Load basic define settings
$tc_css='
.id'.$uniqid.' figure.snip0099 figcaption h2,
.id'.$uniqid.'  figure.snip0099 figcaption p{
	color: '.$text_color.';
}
.id'.$uniqid.' figure.snip0099 figcaption h2 {
  border-bottom: 1px solid '.$text_color.';
}
.id'.$uniqid.' figure.snip0099 figcaption {
    background-color: '.$back_color.';
}
.id'.$uniqid.' figure.snip0099:after{
	background-color: '.$mid_color.';
}
';

// Put styling in header
$wa->addInlineStyle($tc_css);

// Get TeamCards
$images = array();

foreach ($teamcards as $item) {
    if (!empty($item->tc_image)) {

		//image format and name
        //$image['image']	= LayoutHelper::render('joomla.html.image', ['src' => $item->tc_image, 'class' => 'pr', 'alt' => $item->tc_image]);
        $image_info = HTMLHelper::_('cleanImageURL', $item->tc_image);

        //$image['image_info']	= $image_info;

		$image['img_name']	= $image_info->url;
		$size[0] 	        = $image_info->attributes['width'];
        $size[1] 	        = $image_info->attributes['height'];
		$image['img_form']	= $size[0] > $size[1] ? "ls" : "pr";	// pr -> portrait, ls -> landscape
        $image['img_alt']	= '';

        $image['align']   = $item->img_align;

        $links = '';

        if ($show_1 == 1 && !empty($icon_1) && !empty($item->link_1)) {
            $links .= '<a href="'.$item->link_1.'"><i class="'.$icon_1.'"></i></a>';
        }
        if ($show_2 == 1 && !empty($icon_2) && !empty($item->link_2)) {
            $links .= '<a href="'.$item->link_2.'"><i class="'.$icon_2.'"></i></a>';
        }
        if ($show_3 == 1 && !empty($icon_3) && !empty($item->link_3)) {
            $links .= '<a href="'.$item->link_3.'"><i class="'.$icon_3.'"></i></a>';
        }
        
        $image['links'] = $links;

        $image['h2_1'] = $item->h2_1;
        $image['h2_2'] = $item->h2_2;
        $image['text'] = $item->text;

        $images[] = $image;

    }

}


require ModuleHelper::getLayoutPath('mod_itcs_teamcard', $params->get('layout', 'default'));