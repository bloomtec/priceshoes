<div class="products">
<?php echo $this->Form->create('Product');?>
	<fieldset>
		<legend><?php __('Modificar Producto'); ?></legend>
	<div class="left">
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('category_id');
		echo $this->Form->input('nombre');
		echo $this->Form->input('precio');
		echo $this->Form->input('base_iva');
		echo $this->Form->input('valor_iva');
		
		
	
	?>
	</div>
	<div class="right">
		<?php
		//echo $this->Form->input('order');
		echo $this->Form->input('descripcion');
		echo $this->Form->input('activo');
		echo $this->Form->input('promocionar');
		echo $this->Form->input('novedad');
		echo $this->Form->input('mas_vendido');
		?>
	</div>
	</fieldset>
<?php echo $this->Form->end(__('Guardar', true));?>
</div>
