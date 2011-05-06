<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
 		<legend><?php __('Nuevo Usuario'); ?></legend>
	<?php
		echo $this->Form->input('role_id',array("type"=>"hidden","value"=>"1"));
		echo $this->Form->input('email',array("label"=>"Email"));
		echo $this->Form->input('password',array("label"=>"Clave"));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar', true));?>
</div>
