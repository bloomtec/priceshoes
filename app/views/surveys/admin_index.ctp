<div class="surveys">
	<h2><?php __('Encuestas');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('titulo');?></th>
			<th><?php echo $this->Paginator->sort('estado');?></th>
			<th><?php echo $this->Paginator->sort('Creado','created');?></th>
			<th><?php echo $this->Paginator->sort('Modificado','updated');?></th>
			<th class="actions"><?php __('Opciones');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($surveys as $survey):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $survey['Survey']['titulo']; ?>&nbsp;</td>
		<td><?php echo $survey['Survey']['estado']; ?>&nbsp;</td>
		<td><?php echo $survey['Survey']['created']; ?>&nbsp;</td>
		<td><?php echo $survey['Survey']['updated']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $survey['Survey']['id'])); ?>
			<?php echo $this->Html->link(__('Modificar', true), array('action' => 'edit', $survey['Survey']['id'])); ?>
			<?php //echo $this->Html->link(__('Delete', true), array('action' => 'delete', $survey['Survey']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $survey['Survey']['id'])); ?>
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
		<?php echo $this->Paginator->prev('<< ' . __('anterior', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('siguiente', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
