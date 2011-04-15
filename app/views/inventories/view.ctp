<div class="inventories view">
<h2><?php  __('Inventory');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $inventory['Inventory']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Product'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($inventory['Product']['nombre'], array('controller' => 'products', 'action' => 'view', $inventory['Product']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Talla'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($inventory['Talla']['id'], array('controller' => 'tallas', 'action' => 'view', $inventory['Talla']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Color'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($inventory['Color']['id'], array('controller' => 'colores', 'action' => 'view', $inventory['Color']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Disponible'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $inventory['Inventory']['disponible']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Inventory', true), array('action' => 'edit', $inventory['Inventory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Inventory', true), array('action' => 'delete', $inventory['Inventory']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $inventory['Inventory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Inventories', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Inventory', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products', true), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product', true), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tallas', true), array('controller' => 'tallas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Talla', true), array('controller' => 'tallas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Colores', true), array('controller' => 'colores', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Colore', true), array('controller' => 'colores', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Galleries', true), array('controller' => 'galleries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gallery', true), array('controller' => 'galleries', 'action' => 'add')); ?> </li>
	</ul>
</div>
	<div class="related">
		<h3><?php __('Related Galleries');?></h3>
	<?php if (!empty($inventory['Gallery'])):?>
		<dl>	<?php $i = 0; $class = ' class="altrow"';?>
			<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $inventory['Gallery']['id'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Inventory Id');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $inventory['Gallery']['inventory_id'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nombre');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $inventory['Gallery']['nombre'];?>
&nbsp;</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descripcion');?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
	<?php echo $inventory['Gallery']['descripcion'];?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<!-- <div class="actions"> -->
			<!-- <ul> -->
				<!-- <li><?php echo $this->Html->link(__('Edit Gallery', true), array('controller' => 'galleries', 'action' => 'edit', $inventory['Gallery']['id'])); ?></li> -->
			<!-- </ul> -->
		<!-- </div> -->
	</div>
	