<div class="inventories">
<?php echo $this->Form->create('Inventory');?>
	<fieldset>
		<legend><?php __('Modificar Inventario'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('product_id');
		echo $this->Form->input('talla_id');
		echo $this->Form->input('colore_id');
		echo $this->Form->input('disponible');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
