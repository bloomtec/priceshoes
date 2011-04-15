<div class="galleries view">
<h2><?php  __('Gallery');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $gallery['Gallery']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Inventory'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($gallery['Inventory']['id'], array('controller' => 'inventories', 'action' => 'view', $gallery['Inventory']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nombre'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $gallery['Gallery']['nombre']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Descripcion'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $gallery['Gallery']['descripcion']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Gallery', true), array('action' => 'edit', $gallery['Gallery']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Gallery', true), array('action' => 'delete', $gallery['Gallery']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $gallery['Gallery']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Galleries', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Gallery', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Inventories', true), array('controller' => 'inventories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Inventory', true), array('controller' => 'inventories', 'action' => 'add')); ?> </li>
	</ul>
</div>
