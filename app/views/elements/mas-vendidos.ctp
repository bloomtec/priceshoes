<div id="mas-vendidos">
		<div class="titulo">
			<h1>Más vendidos</h1>
		</div>
	<?php $product = $this->requestAction('/products/masvendidos'); ?>
	<?php if (!empty($product['Product'])):?>
	<?php echo $this->Html->image("uploads/200x200/".$product["Product"]['imagen'])?>
	<?php echo $this->Html->para(false,$product["Product"]["nombre"])?>
	<?php echo $this->Html->para("precio","$".number_format($product["Product"]['precio'], 0, ' ', '.')) ?>
	<?php echo $this->Html->link("Detalle",array("controller"=>"products","action"=>"view",$product["Product"]['id'])) ?>
	<?php endif ?>
</div>