<div class="colores form">
<?php echo $this->Form->create('Color');?>
	<fieldset>
		<legend><?php __('Nuevo Color'); ?></legend>
	<?php
		echo $this->Form->input('nombre');
		echo $this->Form->input('codigo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
