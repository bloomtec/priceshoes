<?php
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.libs.view.templates.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php __('Priceshoes'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('front');
		echo $this->Html->script("https://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js");
		echo $this->Html->script("front.js");
		echo $this->Html->script("http://cdn.jquerytools.org/1.2.5/full/jquery.tools.min.js");
		//echo $this->Html->script("https://getfirebug.com/firebug-lite.js");
		echo $scripts_for_layout;
	?>
</head>
<body id="home">
	<div id="container">
		<div id="header">
		  <?php echo $this->element("header");?>
		</div>
		<div id="content">
			<?php echo $this->Session->flash(); ?>
			<?php echo $content_for_layout; ?>
				
		</div>
		
	</div>
	<div id="footer">
		<div class="wrap">
		<?php echo $this->element("footer");?>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>