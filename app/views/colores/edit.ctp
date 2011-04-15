<div class="colores form">
<?php echo $this->Form->create('Color');?>
	<fieldset>
		<legend><?php __('Edit Color'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nombre');
		echo $this->Form->input('codigo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Color.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Color.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Colores', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Inventories', true), array('controller' => 'inventories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Inventory', true), array('controller' => 'inventories', 'action' => 'add')); ?> </li>
	</ul>
</div>