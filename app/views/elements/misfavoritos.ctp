<div id="misfavoritos">
	<div class="titulo">
		<h1>Mis favoritos<?php echo $this->Html->image('favoritos_2.png', array('alt' => 'carrito'))?></h1>
	</div>
<div class="container-tabla">	
<table id="cesta-tabla">
	<?php
		$favoritos = $this->requestAction("/favorites/favoritosCookie");
		$favoritosDB=null;
		if($session->read("Auth.User.id")) $favoritosDB=$this->requestAction("/favorites/favoritosDb");
		if ((!empty($favoritos) && is_array($favoritos))||(!empty($favoritosDB) && is_array($favoritosDB))) {
			$subTotal = 0;
	?>
	
	<?php
		foreach($favoritos as $favorito) { 
		// Subtotal Calculation
		//$subTotal += $favorito['precio'] * $cartContent['carts']['cantidad'];
	?>
	<tr>
		<td width="20%">
			<?php
				echo $html -> link(
					$html->image(
						'/img/uploads/100x100/' . $favorito['imagen'],
						array('border' => '0','width' => '50px')),
						'/products/view/'.$favorito['id'],
						array('escape' => false)
				);
			?>
		</td>
		<td width="60%" style="vertical-align:middle; text-align: center;">
			<?php echo $html->link($favorito['nombre'], '/products/view/'.$favorito['id']);?>
			<br />
			Ref. <?php echo $html->link($favorito['referencia'], '/products/view/'.$favorito['id']);?>
		
		</td>
		<td width="20%" style="vertical-align:middle; text-align: center;">
			<!-- <?php Configure::read('Shop.currency');?><?php echo '$' . $favorito['precio'] * $cartContent['carts']['cantidad'];?> -->
			<?php //echo $html->link('Añadir otro par', '/carts/add/inventory_id:'.$cartContent['inventories']['id'].'category_id:'.$cartContent['categories']['id']);?>
			<?php echo $html->link('Detalle', '/products/view/'.$favorito['id'],array("class"=>"detalleFavorito"));?>
		</td>
	</tr>
	<?php
		} 
	?>
	
	
	
	<?php
		foreach($favoritosDB as $favoritoDB) { 
		// Subtotal Calculation
		//$subTotal += $favorito['precio'] * $cartContent['carts']['cantidad'];
	?>
	<tr>
		<td width="20%">
			<?php
				echo $html -> link(
					$html->image(
						'/img/uploads/100x100/' . $favoritoDB["Product"]['imagen'],
						array('border' => '0','width' => '50px')),
						'/products/view/'.$favoritoDB["Product"]['id'],
						array('escape' => false)
				);
			?>
		</td>
		<td width="60%" style="vertical-align:middle; text-align: center;">
			<?php echo $html->link($favoritoDB["Product"]['nombre'], '/products/view/'.$favoritoDB["Product"]['id']);?>
			<br />
			Ref. <?php echo $html->link($favoritoDB["Product"]['referencia'], '/products/view/'.$favoritoDB["Product"]['id']);?>
			<div class="sociales">
				<a class='boton-facebook' href="javascript: void(0);" onclick="window.open('http://www.facebook.com/sharer.php?u=<?php echo urlencode("http://".$_SERVER['SERVER_NAME'].$html->url("/products/view/".$favoritoDB["Product"]["id"]));?>','ventanacompartir', 'toolbar=0, status=0, width=650, height=450');">
					<?php echo $html->image("facebook-ico.png")?>
				</a> 
				<script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>
						 <!-- <a href="http://twitter.com/share?url=http%3A%2F%2Fdev.twitter.com&amp;via=your_screen_name" class="boton-twitter">Compartir en twitter</a>--> 
						<a  onclick="window.open('http://twitter.com/share?url=<?php echo rawurlencode("http://".$_SERVER["SERVER_NAME"]."/products/view/".$html->url("/products/view/".$favoritoDB["Product"]["id"]));?>','ventanacompartir', 'toolbar=0, status=0, width=650, height=450');"class="boton-twitter" target="_blank"><?php echo $html->image("twitter-ico.png")?></a>
			</div>
		</td>
		<td width="20%" style="vertical-align:middle; text-align: center;">
			<?php echo $html->link('Detalle', '/products/view/'.$favoritoDB["Product"]['id'],array("class"=>"detalleFavorito"));?>
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
			echo '<tr class="final"><td>No tiene productos en favoritos</td></tr>';
		}
    ?>
	</table>
</div>
</div>