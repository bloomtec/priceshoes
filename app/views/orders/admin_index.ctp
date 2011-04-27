<div>
	<h2><?php __('Ordenes');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('payment_type_id');?></th>
			<th><?php echo $this->Paginator->sort('order_state_id');?></th>
			<th><?php echo $this->Paginator->sort('envio_nombre');?></th>
			<th><?php echo $this->Paginator->sort('envio_apellido');?></th>
			<th><?php echo $this->Paginator->sort('envio_direccion');?></th>
			<th><?php echo $this->Paginator->sort('envio_telefono');?></th>
			<th><?php echo $this->Paginator->sort('envio_ciudad');?></th>
			<th><?php echo $this->Paginator->sort('envio_estado');?></th>
			<th><?php echo $this->Paginator->sort('envio_costo');?></th>
			<th><?php echo $this->Paginator->sort('pago_estado');?></th>
			<th><?php echo $this->Paginator->sort('created');?></th>
			<th><?php echo $this->Paginator->sort('updated');?></th>
			<th class="actions"><?php __('Acciones');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($orders as $order):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $order['Order']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($order['User']['password'], array('controller' => 'users', 'action' => 'view', $order['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($order['PaymentType']['medio_de_pago'], array('controller' => 'payment_types', 'action' => 'view', $order['PaymentType']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($order['OrderState']['estado'], array('controller' => 'order_states', 'action' => 'view', $order['OrderState']['id'])); ?>
		</td>
		<td><?php echo $order['Order']['envio_nombre']; ?>&nbsp;</td>
		<td><?php echo $order['Order']['envio_apellido']; ?>&nbsp;</td>
		<td><?php echo $order['Order']['envio_direccion']; ?>&nbsp;</td>
		<td><?php echo $order['Order']['envio_telefono']; ?>&nbsp;</td>
		<td><?php echo $order['Order']['envio_ciudad']; ?>&nbsp;</td>
		<td><?php echo $order['Order']['envio_estado']; ?>&nbsp;</td>
		<td><?php echo $order['Order']['envio_costo']; ?>&nbsp;</td>
		<td><?php echo $order['Order']['pago_estado']; ?>&nbsp;</td>
		<td><?php echo $order['Order']['created']; ?>&nbsp;</td>
		<td><?php echo $order['Order']['updated']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $order['Order']['id'])); ?>
			<?php echo $this->Html->link(__('Editar', true), array('action' => 'edit', $order['Order']['id'])); ?>
		</td>
	</tr>
	<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>