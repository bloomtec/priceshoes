<div class="tallas view">
<h2><?php  __('Talla');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $talla['Talla']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nombre'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $talla['Talla']['nombre']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Talla', true), array('action' => 'edit', $talla['Talla']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Talla', true), array('action' => 'delete', $talla['Talla']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $talla['Talla']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Tallas', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Talla', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Inventories', true), array('controller' => 'inventories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Inventory', true), array('controller' => 'inventories', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Inventories');?></h3>
	<?php if (!empty($talla['Inventory'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Product Id'); ?></th>
		<th><?php __('Talla Id'); ?></th>
		<th><?php __('Color Id'); ?></th>
		<th><?php __('Disponible'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($talla['Inventory'] as $inventory):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $inventory['id'];?></td>
			<td><?php echo $inventory['product_id'];?></td>
			<td><?php echo $inventory['talla_id'];?></td>
			<td><?php echo $inventory['color_id'];?></td>
			<td><?php echo $inventory['disponible'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'inventories', 'action' => 'view', $inventory['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'inventories', 'action' => 'edit', $inventory['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'inventories', 'action' => 'delete', $inventory['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $inventory['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Inventory', true), array('controller' => 'inventories', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
