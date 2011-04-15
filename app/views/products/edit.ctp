<div class="products form">
<?php echo $this->Form->create('Product');?>
	<fieldset>
		<legend><?php __('Edit Product'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('category_id');
		echo $this->Form->input('nombre');
		echo $this->Form->input('precio');
		echo $this->Form->input('base_iva');
		echo $this->Form->input('valor_iva');
		echo $this->Form->input('descripcion');
		echo $this->Form->input('order');
		echo $this->Form->input('activo');
		echo $this->Form->input('promocionar');
		echo $this->Form->input('novedad');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Product.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Product.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Products', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Categories', true), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category', true), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Inventories', true), array('controller' => 'inventories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Inventory', true), array('controller' => 'inventories', 'action' => 'add')); ?> </li>
	</ul>
</div>