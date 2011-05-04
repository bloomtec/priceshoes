<div id="left-content">
	 <?php echo $this->element("virtual");?>
	 <?php echo $this->element("social");?>
	 <?php echo $this->element("misfavoritos");?>
</div>

<div id="right-content" class="mi-cuenta ">	
	<h2><?php __('ESTADO DE MIS ORDENES');?></h2>
	<ul class="userMenu">
		<li><?php echo $html->link("Atrás",array("action"=>"index")) ?></li>
		
	</ul>
	<div class="carrito">
		<table cellpadding="0" cellspacing="0" id="ordenes">
		<tr>
	
				<th >Orden</th>
				<th>Forma de pago</th>
				<th>Fecha</th>
				<th>Estado</th>
		
		</tr>
		<?php
		$i = 0;
		foreach ($ordenes as $orden):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			
			<td>
				<?php echo $html->link($orden["Order"]["id"],array("action"=>"orden",$orden["Order"]["id"]))?>				
			</td>
			<td>	
				<?php echo $paymentTypes[$orden["Order"]["payment_type_id"]]?>			
			</td>
			
			<td>	
				<?php echo $orden["Order"]["created"]?>			
			</td>
			
		
			
			<td>	
				<?php echo $estadosOrdenes[$orden["Order"]["order_state_id"]];?>			
			</td>
	
			
		</tr>
	<?php endforeach; ?>
		</table>
		</div>
</div>