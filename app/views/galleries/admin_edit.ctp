<div class="galleries">
<?php echo $this->Form->create('Gallery');?>
	<fieldset>
		<legend><?php __('Editar Galería'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('inventory_id');
		echo $this->Form->input('nombre');
		echo $this->Form->input('descripcion');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
