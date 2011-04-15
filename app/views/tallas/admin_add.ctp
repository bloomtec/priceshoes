<div class="tallas form">
<?php echo $this->Form->create('Talla');?>
	<fieldset>
		<legend><?php __('Nueva Talla'); ?></legend>
	<?php
		echo $this->Form->input('nombre');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
