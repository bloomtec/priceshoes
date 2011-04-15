<div class="inventories form">
<?php echo $this->Form->create('Inventory');?>
	<fieldset>
		<legend><?php __('Edit Inventory'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('product_id');
		echo $this->Form->input('talla_id');
		echo $this->Form->input('colore_id');
		echo $this->Form->input('disponible');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Inventory.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Inventory.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Inventories', true), array('action' => 'index'));?></li>
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