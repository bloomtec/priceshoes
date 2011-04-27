<div>
<h2><?php  __('Orden');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $order['Order']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($order['User']['password'], array('controller' => 'users', 'action' => 'view', $order['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Payment Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($order['PaymentType']['medio_de_pago'], array('controller' => 'payment_types', 'action' => 'view', $order['PaymentType']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Order State'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($order['OrderState']['estado'], array('controller' => 'order_states', 'action' => 'view', $order['OrderState']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Envio Nombre'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $order['Order']['envio_nombre']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Envio Apellido'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $order['Order']['envio_apellido']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Envio Direccion'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $order['Order']['envio_direccion']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Envio Telefono'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $order['Order']['envio_telefono']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Envio Ciudad'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $order['Order']['envio_ciudad']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Envio Estado'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $order['Order']['envio_estado']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Envio Costo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $order['Order']['envio_costo']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tarjeta Codigo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $order['Order']['tarjeta_codigo']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tarjeta Numero'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $order['Order']['tarjeta_numero']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Pago Nombre'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $order['Order']['pago_nombre']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Pago Apellido'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $order['Order']['pago_apellido']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Pago Direccion'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $order['Order']['pago_direccion']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Pago Cedula'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $order['Order']['pago_cedula']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Pago Telefono'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $order['Order']['pago_telefono']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Pago Ciudad'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $order['Order']['pago_ciudad']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Pago Estado'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $order['Order']['pago_estado']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $order['Order']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Updated'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $order['Order']['updated']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<!-- <div class="actions"> -->
<!-- 	<h3><?php __('Acciones'); ?></h3> -->
<!-- 	<ul> -->
<!-- 		<li><?php echo $this->Html->link(__('Edit Order', true), array('action' => 'edit', $order['Order']['id'])); ?> </li> -->
<!-- 		<li><?php echo $this->Html->link(__('Delete Order', true), array('action' => 'delete', $order['Order']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $order['Order']['id'])); ?> </li> -->
<!-- 		<li><?php echo $this->Html->link(__('List Orders', true), array('action' => 'index')); ?> </li> -->
<!-- 		<li><?php echo $this->Html->link(__('New Order', true), array('action' => 'add')); ?> </li> -->
<!-- 		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li> -->
<!-- 		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li> -->
<!-- 		<li><?php echo $this->Html->link(__('List Payment Types', true), array('controller' => 'payment_types', 'action' => 'index')); ?> </li> -->
<!-- 		<li><?php echo $this->Html->link(__('New Payment Type', true), array('controller' => 'payment_types', 'action' => 'add')); ?> </li> -->
<!-- 		<li><?php echo $this->Html->link(__('List Order States', true), array('controller' => 'order_states', 'action' => 'index')); ?> </li> -->
<!-- 		<li><?php echo $this->Html->link(__('New Order State', true), array('controller' => 'order_states', 'action' => 'add')); ?> </li> -->
<!-- 		<li><?php echo $this->Html->link(__('List Order Items', true), array('controller' => 'order_items', 'action' => 'index')); ?> </li> -->
<!-- 		<li><?php echo $this->Html->link(__('New Order Item', true), array('controller' => 'order_items', 'action' => 'add')); ?> </li> -->
<!-- 	</ul> -->
<!-- </div> -->
<div class="related">
	<h3><?php __('Productos Relacionados');?></h3>
	<?php if (!empty($order['OrderItem'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('ID'); ?></th>
		<th><?php __('ID De Inventario'); ?></th>
		<th><?php __('ID De La Orden'); ?></th>
		<th><?php __('Cantidad'); ?></th>
<!-- 		<th><?php __('Created'); ?></th> -->
<!-- 		<th><?php __('Updated'); ?></th> -->
<!-- 		<th class="actions"><?php __('Actions');?></th> -->
	</tr>
	<?php
		$i = 0;
		foreach ($order['OrderItem'] as $orderItem):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $orderItem['id'];?></td>
			<td><?php echo $orderItem['inventory_id'];?></td>
			<td><?php echo $orderItem['order_id'];?></td>
			<td><?php echo $orderItem['cantidad'];?></td>
<!-- 			<td><?php echo $orderItem['created'];?></td> -->
<!-- 			<td><?php echo $orderItem['updated'];?></td> -->
<!-- 			<td class="actions"> -->
<!-- 				<?php echo $this->Html->link(__('View', true), array('controller' => 'order_items', 'action' => 'view', $orderItem['id'])); ?> -->
<!-- 				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'order_items', 'action' => 'edit', $orderItem['id'])); ?> -->
<!-- 				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'order_items', 'action' => 'delete', $orderItem['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $orderItem['id'])); ?> -->
<!-- 			</td> -->
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

<!-- 	<div class="actions"> -->
<!-- 		<ul> -->
<!-- 			<li><?php echo $this->Html->link(__('New Order Item', true), array('controller' => 'order_items', 'action' => 'add'));?> </li> -->
<!-- 		</ul> -->
<!-- 	</div> -->
</div>
