<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
 		<legend><?php __('Actualizar Usuario'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('role_id');
		echo $this->Form->input('username',array("label"=>"Usuario"));
		echo $this->Form->input('password2',array("label"=>"Password","type"=>"password"));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
