<div class="tallas">
<?php echo $this->Form->create('Talla');?>
	<fieldset>
		<legend><?php __('Editar Talla'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
