<div class="orders form">
<?php echo $this->Form->create('Order');?>
	<fieldset>
		<legend><?php __('Agregar Orden'); ?></legend>
	<?php
		echo $this->Form->input('user_id');
		echo $this->Form->input('payment_type_id');
		echo $this->Form->input('order_state_id');
		echo $this->Form->input('envio_nombre');
		echo $this->Form->input('envio_apellido');
		echo $this->Form->input('envio_direccion');
		echo $this->Form->input('envio_telefono');
		echo $this->Form->input('envio_ciudad');
		echo $this->Form->input('envio_estado');
		echo $this->Form->input('envio_costo');
		echo $this->Form->input('tarjeta_codigo');
		echo $this->Form->input('tarjeta_numero');
		echo $this->Form->input('pago_nombre');
		echo $this->Form->input('pago_apellido');
		echo $this->Form->input('pago_direccion');
		echo $this->Form->input('pago_cedula');
		echo $this->Form->input('pago_telefono');
		echo $this->Form->input('pago_ciudad');
		echo $this->Form->input('pago_estado');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enviar', true));?>
</div>
<div class="actions">
	<h3><?php __('Acciones'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Orders', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Payment Types', true), array('controller' => 'payment_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Payment Type', true), array('controller' => 'payment_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Order States', true), array('controller' => 'order_states', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order State', true), array('controller' => 'order_states', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Order Items', true), array('controller' => 'order_items', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order Item', true), array('controller' => 'order_items', 'action' => 'add')); ?> </li>
	</ul>
</div>