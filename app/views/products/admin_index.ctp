<div class="products">
	<h2><?php __('Productos');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('order');?></th>
			<th><?php echo $this->Paginator->sort('Categoría','category_id');?></th>
			<th><?php echo $this->Paginator->sort('imagen');?></th>
			<th><?php echo $this->Paginator->sort('nombre');?></th>
			<th><?php echo $this->Paginator->sort('precio');?></th>
			<th><?php echo $this->Paginator->sort('descripcion');?></th>
		
			
			<th class="actions"><?php __('Opciones');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($products as $product):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $product['Product']['order']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($product['Category']['nombre'], array('controller' => 'categories', 'action' => 'view', $product['Category']['id'])); ?>
		</td>
		<td><?php echo $html->image("uploads/200x200/".$product['Product']['imagen'],array("width",200)); ?>&nbsp;</td>
		<td><?php echo $product['Product']['nombre']; ?>&nbsp;</td>
		<td><?php echo $product['Product']['precio']; ?>&nbsp;</td>
		<td><?php echo $product['Product']['descripcion']; ?>&nbsp;</td>
		
		<td class="actions">
			<?php echo $this->Html->link(__('Ver', true), array('action' => 'view', $product['Product']['id'])); ?>
			<?php echo $this->Html->link(__('Ver', true), array('action' => 'updateField', $product['Product']['id'],"novedad",true)); ?>
			<?php echo $this->Html->link(__('Galerias', true), array('controller'=>'galleries','action' => 'product', $product['Product']['id'])); ?>
			<?php echo $this->Html->link(__('Disponibilidad', true), array('controller'=>'products','action' => 'disponibilidad', $product['Product']['id'])); ?>
			<?php echo $this->Html->link(__('Modificar', true), array('action' => 'edit', $product['Product']['id'])); ?>
			<?php echo $this->Html->link(__('Borrar', true), array('action' => 'delete', $product['Product']['id']), null, sprintf(__('Está seguro que desea eliminar el producto ?', true), $product['Product']['id'])); ?>
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
