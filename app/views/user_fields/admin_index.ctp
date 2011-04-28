<div class="userFields index">
	<h2><?php __('User Fields');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('user_id');?></th>
			<th><?php echo $this->Paginator->sort('nombres');?></th>
			<th><?php echo $this->Paginator->sort('apellidos');?></th>
			<th><?php echo $this->Paginator->sort('tipo_identificacion');?></th>
			<th><?php echo $this->Paginator->sort('identificacion');?></th>
			<th><?php echo $this->Paginator->sort('sexo');?></th>
			<th><?php echo $this->Paginator->sort('fecha_nacimiento');?></th>
			<th><?php echo $this->Paginator->sort('pais');?></th>
			<th><?php echo $this->Paginator->sort('departamento_residencia');?></th>
			<th><?php echo $this->Paginator->sort('ciudad_residencia');?></th>
			<th><?php echo $this->Paginator->sort('direccion');?></th>
			<th><?php echo $this->Paginator->sort('direccion2');?></th>
			<th><?php echo $this->Paginator->sort('telefono_fijo');?></th>
			<th><?php echo $this->Paginator->sort('telefono_movil');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($userFields as $userField):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $userField['UserField']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($userField['User']['email'], array('controller' => 'users', 'action' => 'view', $userField['User']['id'])); ?>
		</td>
		<td><?php echo $userField['UserField']['nombres']; ?>&nbsp;</td>
		<td><?php echo $userField['UserField']['apellidos']; ?>&nbsp;</td>
		<td><?php echo $userField['UserField']['tipo_identificacion']; ?>&nbsp;</td>
		<td><?php echo $userField['UserField']['identificacion']; ?>&nbsp;</td>
		<td><?php echo $userField['UserField']['sexo']; ?>&nbsp;</td>
		<td><?php echo $userField['UserField']['fecha_nacimiento']; ?>&nbsp;</td>
		<td><?php echo $userField['UserField']['pais']; ?>&nbsp;</td>
		<td><?php echo $userField['UserField']['departamento_residencia']; ?>&nbsp;</td>
		<td><?php echo $userField['UserField']['ciudad_residencia']; ?>&nbsp;</td>
		<td><?php echo $userField['UserField']['direccion']; ?>&nbsp;</td>
		<td><?php echo $userField['UserField']['direccion2']; ?>&nbsp;</td>
		<td><?php echo $userField['UserField']['telefono_fijo']; ?>&nbsp;</td>
		<td><?php echo $userField['UserField']['telefono_movil']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $userField['UserField']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $userField['UserField']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $userField['UserField']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $userField['UserField']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New User Field', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>