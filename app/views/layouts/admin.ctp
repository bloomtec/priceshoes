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
		<?php __("CMS:"); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');
		echo $this->Html->css('uploadify');
		echo $this->Html->css('superfish');
		echo $this->Html->css("jquery-ui.css");
		echo $this->Html->css("colorpicker");
		echo $this->Html->script("jquery.js");
		echo $this->Html->script("admin.js");
		echo $this->Html->script("jquery-ui.js");
		echo $this->Html->script("swfobject.js"); 
		echo $this->Html->script("jquery.uploadify.v2.1.4.min.js");
		echo $this->Html->script("upload.js");
		echo $this->Html->script("superfish.js");
		echo $this->Html->script("ckeditor/ckeditor");
		echo $this->Html->script("fileBrowser");
		echo $this->Html->script("colorpicker");
		echo $scripts_for_layout;
	?>
</head>
<body>
	<div id="container">
		<div id="header">
			<div class="logo">
				<?php echo $this->Html->link(
					$this->Html->image('logo_cms.png', array('alt'=> __('CMS: PriceShoes', true), 'border' => '0')),
					array("controller"=>"products","action"=>"index"),
					array('escape' => false)
				);
			?>
			</div>
			<?php if(!isset($login)): ?> 
				
			<ul class="nav">
				<li>
					<?php echo $html->link("Usuarios",array("controller"=>"users","action"=>"index")); ?>
					<ul>
						<li><?php echo $html->link("Ver Usuarios",array("controller"=>"users","action"=>"index")); ?></li>
						<li><?php echo $html->link("Crear Usuario",array("controller"=>"users","action"=>"add")); ?></li>
					
					</ul>
				</li>
				<li>
					<?php echo $html->link("Categorías",array("controller"=>"categories","action"=>"index")); ?>
					<ul>
						<li><?php echo $html->link("Ver Categorías",array("controller"=>"categories","action"=>"index")); ?></li>
						<li><?php echo $html->link("Crear Categoría",array("controller"=>"categories","action"=>"add")); ?></li>
					
					</ul>
				</li>
				<li>
					<?php echo $html->link("Productos",array("controller"=>"products","action"=>"index")); ?>
					<ul>
						<li><?php echo $html->link("Ver Productos",array("controller"=>"products","action"=>"index")); ?></li>
						<li><?php echo $html->link("Crear Producto",array("controller"=>"products","action"=>"add")); ?></li>
					
					</ul>
				</li>
				
				
				<li><?php echo $html->link("Sondeos",array("controller"=>"surveys","action"=>"index")); ?>
					<ul>
						<li><?php echo $html->link("Ver encuestas",array("controller"=>"surveys","action"=>"index")); ?></li>
						<li><?php echo $html->link("Crear encuestas",array("controller"=>"surveys","action"=>"add")); ?></li>
					
					</ul>
				</li>
				
				<li><?php echo $html->link("Páginas",array("controller"=>"pages","action"=>"index")); ?>
					<ul>
						<li><?php echo $html->link("Ver páginas",array("controller"=>"pages","action"=>"index")); ?></li>
						<li><?php echo $html->link("Crear páginas",array("controller"=>"pages","action"=>"add")); ?></li>
					
					</ul>
				</li>
				<li>
					<?php echo $html->link("Otras Opciones","#"); ?>
					<ul>
						<li><?php echo $html->link("Ver Colores",array("controller"=>"colores","action"=>"index")); ?></li>
						<li><?php echo $html->link("Crear Color",array("controller"=>"colores","action"=>"add")); ?></li>
						
						<li><?php echo $html->link("Ver Tallas",array("controller"=>"tallas","action"=>"index")); ?></li>
						<li><?php echo $html->link("Crear Talla",array("controller"=>"tallas","action"=>"add")); ?></li>
					
					</ul>
				</li>
				<li><?php echo $html->link(__("logout",true),array("controller"=>"users","action"=>"logout"),array("class"=>"logout"))?><li> 
			</ul>
			<?php endif;?>
		<?php //if(!isset($login)) echo $html->link(__("logout",true),array("controller"=>"users","action"=>"logout"),array("class"=>"logout"))?>
		<div style="clear:both;"></div>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $content_for_layout; ?>

		</div>
		<div id="footer">

		</div>
		<?php //echo $this->element("developer-utilities");?>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>