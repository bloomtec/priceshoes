<div class="tallas form">
<?php echo $this->Form->create('Talla');?>
	<fieldset>
		<legend><?php __('Edit Talla'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Talla.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Talla.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Tallas', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Inventories', true), array('controller' => 'inventories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Inventory', true), array('controller' => 'inventories', 'action' => 'add')); ?> </li>
	</ul>
</div>