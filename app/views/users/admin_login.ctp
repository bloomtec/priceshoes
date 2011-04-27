<div class="login">
	<h1> <?php __("Access to the CMS")?> </h1>
<?php echo $session->flash('auth');?>
<?php echo $this->Form->create('User');?>
	<fieldset>
 	
	<?php
		echo $this->Form->input('email', array('label'=>'E-mail'));
		echo $this->Form->input('password',array('type'=>'password', 'label'=>'Contraseña'));
		//echo $this->Form->input('rol',array('type'=>'hidden','value'=>'x'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Ingresar', true));?>
</div>