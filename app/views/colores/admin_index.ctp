<div class="colores">
	<h2><?php __('Colores');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th>Color</th>
			<th><?php echo $this->Paginator->sort('nombre');?></th>
			<th><?php echo $this->Paginator->sort('codigo');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($colores as $color):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><div style="background:<?php echo $color['Color']['codigo']; ?>; width:50px; height:50px;"></div></td>
		<td><?php echo $color['Color']['nombre']; ?>&nbsp;</td>
		<td>&nbsp;</td>
		<td class="actions">
		
			<?php echo $this->Html->link(__('Modificar', true), array('action' => 'edit', $color['Color']['id'])); ?>
			<?php echo $this->Html->link(__('Borrar', true), array('action' => 'delete', $color['Color']['id']), null, sprintf(__('Está seguro que desea eliminar el color ?', true), $color['Color']['id'])); ?>
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
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
