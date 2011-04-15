<div class="inventories">
	<h2><?php __('Inventarios');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('product_id');?></th>
			<th><?php echo $this->Paginator->sort('talla_id');?></th>
			<th><?php echo $this->Paginator->sort('color_id');?></th>
			<th><?php echo $this->Paginator->sort('disponible');?></th>
			<th class="actions"><?php __('Opciones');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($inventories as $inventory):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $inventory['Inventory']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($inventory['Product']['nombre'], array('controller' => 'products', 'action' => 'view', $inventory['Product']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($inventory['Talla']['id'], array('controller' => 'tallas', 'action' => 'view', $inventory['Talla']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($inventory['Color']['id'], array('controller' => 'colores', 'action' => 'view', $inventory['Color']['id'])); ?>
		</td>
		<td><?php echo $inventory['Inventory']['disponible']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $inventory['Inventory']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $inventory['Inventory']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $inventory['Inventory']['id']), null, sprintf(__('Está seguro que desea borrar el inventario ?', true), $inventory['Inventory']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Página %page% de %pages%, mostrando %current% registros de %count% total, empezando en el registro %start%, terminando en %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
