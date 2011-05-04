<div id="left-content">
	 <?php echo $this->element("virtual");?>
	 <?php echo $this->element("social");?>
	 <?php echo $this->element("misfavoritos");?>
</div>

<div id="right-content" class="mi-cuenta ">	
	<h2><?php __('DETALLES DE LA ORDEN');?></h2>
	<ul class="userMenu">
		<li><?php echo $html->link("Atrás",array("action"=>"ordenes")) ?></li>
		
	</ul>
	<div class="carrito">
		<table cellpadding="0" cellspacing="0" id="ordenes">
		<tr>
	
				<th colspan="2">Producto</th>
				<th>Cantidad</th>
				<th>Precio Unitario</th>
	
		
		</tr>
		<?php
		$i = 0;
		foreach ($items as $item):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr class="content">
			
			<td width="80" align="center" class="left">
				<?php
				  	e(
				      	$html->link(
				      			$html->image(
											'/img/uploads/100x100/' . $item['Inventory']['Product']['imagen'],
				      						array('border' => '0')
										),
				      					array('action' => '../products/view/'.$item['Inventory']['Product']['id']),
				      					array('escape' => false)
								)
					); 
				?>

			</td>
			<td>
				<span><?php echo $html->link( $item['Inventory']['Product']['nombre'], "/products/view/".$item['Inventory']['Product']['id']);?></span>
				<span>Ref. <?php $item['Inventory']['Product']['referencia']; ?></span>
				<span>Talla <?php echo $item['Inventory']['Talla']['nombre'] ?></span>
				<span>Color <?php echo $item['Inventory']['Color']['nombre']; ?></span>
			</td>
			<td>	
				<?php echo $item['OrderItem']['cantidad'];?>			
			</td>
			
			<td>	
				<?php echo "$".number_format( $item['Inventory']['Product']['precio'], 0, ' ', '.');?>		
			</td>
			
		
			
	
			
		</tr>
	<?php endforeach; ?>
		</table>
		</div>
</div>