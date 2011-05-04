<div id="misfavoritos">
	<div class="titulo">
		<h1>Mis favoritos<?php echo $this->Html->image('favoritos_2.png', array('alt' => 'carrito'))?></h1>
	</div>
<div class="container-tabla">	
<table id="cesta-tabla">
	<?php
	
		$favoritos = $this->requestAction("/favorites/favoritosCookie");

		if (!empty($favoritos) && is_array($favoritos)) {
			
			$subTotal = 0;
	?>
	
	<?php
		foreach($favoritos as $favorito) {
			$favorito=$this->requestAction("/products/getProduct/".$favorito["id"]); 
			if(!$favorito) return;
		// Subtotal Calculation
		//$subTotal += $favorito['precio'] * $cartContent['carts']['cantidad'];
	?>
	<tr>
		<td width="20%">
			<?php
				echo $html -> link(
					$html->image(
						'/img/uploads/100x100/' . $favorito["Product"]['imagen'],
						array('border' => '0','width' => '50px')),
						'/products/view/'.$favorito["Product"]['id'],
						array('escape' => false)
				);
			?>
		</td>
		<td width="60%" style="vertical-align:middle; text-align: center;">
			<?php echo $html->link($favorito["Product"]['nombre'], '/products/view/'.$favorito["Product"]['id']);?>
			<br />
			Ref. <?php echo $html->link($favorito["Product"]['referencia'], '/products/view/'.$favorito["Product"]['id']);?>
		
		</td>
		<td width="20%" style="vertical-align:middle; text-align: center;">
			<!-- <?php Configure::read('Shop.currency');?><?php echo '$' . $favorito['precio'] * $cartContent['carts']['cantidad'];?> -->
			<?php //echo $html->link('Añadir otro par', '/carts/add/inventory_id:'.$cartContent['inventories']['id'].'category_id:'.$cartContent['categories']['id']);?>
			<?php echo $html->link('Detalle', '/products/view/'.$favorito["Product"]['id'],array("class"=>"detalleFavorito"));?>
		</td>
	</tr>
	<?php
		} 
	?>
	
	<tr class="final">
		<td colspan="2" align="center"><?php echo $html->link("ver mas",array("controller"=>"favorites","action"=>"view"));?></td>
	</tr>
	<?php
		} else {
			echo '<tr class="final"><td>La cesta esta vacia</td></tr>';
		}
    ?>
	</table>
</div>
</div>