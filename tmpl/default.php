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
?>

<div class="teamcard <?php echo 'id'.$uniqid.' '.$tc_align ?>">
	<?php if (!empty($images)) : ?>
	<?php foreach($images as $k => $v): ?>
	<div class="tc_main">
		<figure class="snip0099 <?php echo $images[$k]['align'] ?>">
			<img class="<?php echo $images[$k]['img_form'] ?>" src="<?php echo $images[$k]['img_name'] ?>" alt="<?php echo $images[$k]['img_alt'] ?>"/>
			<div class="icons">
				<?php echo $images[$k]['links'] ?>
			</div>
			<figcaption>
				<h2><?php echo $images[$k]['h2_1'] ?><span><?php echo $images[$k]['h2_2'] ?></span></h2>
				<p><?php echo $images[$k]['text'] ?></p>
			</figcaption>
		</figure>
	</div>
	<?php endforeach; ?>
	<?php endif; ?>
</div>