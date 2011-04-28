<div class="userFields form">
<?php echo $this->Form->create('UserField');?>
	<fieldset>
		<legend><?php __('Admin Add User Field'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('nombres');
		echo $this->Form->input('apellidos');
		echo $this->Form->input('tipo_identificacion');
		echo $this->Form->input('identificacion');
		echo $this->Form->input('sexo');
		echo $this->Form->input('fecha_nacimiento');
		echo $this->Form->input('pais');
		echo $this->Form->input('departamento_residencia');
		echo $this->Form->input('ciudad_residencia');
		echo $this->Form->input('direccion');
		echo $this->Form->input('direccion2');
		echo $this->Form->input('telefono_fijo');
		echo $this->Form->input('telefono_movil');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List User Fields', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>