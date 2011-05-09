<div class="categories">
	<h2><?php __('Categorías');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>

			<th><?php echo $this->Paginator->sort('nombre');?></th>
			<th><?php echo $this->Paginator->sort('descripcion');?></th>
			<th><?php echo $this->Paginator->sort('imagen');?></th>
			<th class="actions"><?php __('Opciones');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($categories as $category):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>

		<td><?php echo $category['Category']['nombre']; ?>&nbsp;</td>
		<td><?php echo $category['Category']['descripcion']; ?>&nbsp;</td>
		<td><?php echo $this->Html->image("uploads/".$category['Category']['imagen'],array("width"=>200)) ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $category['Category']['id'])); ?>
			<?php echo $this->Html->link(__('Modificar', true), array('action' => 'edit', $category['Category']['id'])); ?>
			<?php echo $this->Html->link(__('Borrar', true), array('action' => 'delete', $category['Category']['id']), null, sprintf(__('Está seguro que desea borrar la categoría y todos sus productos ?', true), $category['Category']['id'])); ?>
			<?php if(!$category['Category']['promocionar']){ echo $this->Html->link(__('Promocionar', true), array('action' => 'updateField', $category['Category']['id'],"promocionar",true)); ?>
			<?php }else{ echo $this->Html->link(__('Dejar de promocionar', true), array('action' => 'updateField', $category['Category']['id'],"promocionar",false)); }?>
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
