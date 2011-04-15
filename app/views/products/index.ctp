<div class="products index">
	<h2><?php __('Products');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('category_id');?></th>
			<th><?php echo $this->Paginator->sort('nombre');?></th>
			<th><?php echo $this->Paginator->sort('precio');?></th>
			<th><?php echo $this->Paginator->sort('base_iva');?></th>
			<th><?php echo $this->Paginator->sort('valor_iva');?></th>
			<th><?php echo $this->Paginator->sort('descripcion');?></th>
			<th><?php echo $this->Paginator->sort('order');?></th>
			<th><?php echo $this->Paginator->sort('activo');?></th>
			<th><?php echo $this->Paginator->sort('promocionar');?></th>
			<th><?php echo $this->Paginator->sort('novedad');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($products as $product):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $product['Product']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($product['Category']['nombre'], array('controller' => 'categories', 'action' => 'view', $product['Category']['id'])); ?>
		</td>
		<td><?php echo $product['Product']['nombre']; ?>&nbsp;</td>
		<td><?php echo $product['Product']['precio']; ?>&nbsp;</td>
		<td><?php echo $product['Product']['base_iva']; ?>&nbsp;</td>
		<td><?php echo $product['Product']['valor_iva']; ?>&nbsp;</td>
		<td><?php echo $product['Product']['descripcion']; ?>&nbsp;</td>
		<td><?php echo $product['Product']['order']; ?>&nbsp;</td>
		<td><?php echo $product['Product']['activo']; ?>&nbsp;</td>
		<td><?php echo $product['Product']['promocionar']; ?>&nbsp;</td>
		<td><?php echo $product['Product']['novedad']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $product['Product']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $product['Product']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $product['Product']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $product['Product']['id'])); ?>
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
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Product', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Categories', true), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category', true), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Inventories', true), array('controller' => 'inventories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Inventory', true), array('controller' => 'inventories', 'action' => 'add')); ?> </li>
	</ul>
</div>