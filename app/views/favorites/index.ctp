<div id="left-content">
	 <?php echo $this->element("virtual");?>
	 <?php echo $this->element("social");?>
	<?php echo $this->element("misfavoritos");?>
</div>
<div id="right-content">

<div class="carrito">
	<?php 
	
		$favoritos = $this->requestAction("/favorites/favoritosCookie");
		$favoritosDB=$this->requestAction("/favorites/favoritosDb");
		/*
		 * foreach($favoritos as $favorito) {
			$favorito=$this->requestAction("/products/getProduct/".$favorito["id"]); 
		 */
	?>
	<h1>MIS FAVORITO</h1>
	<p>
	Gracias por realizar tus compras en <?php echo $html->link("www.priceshoes.com","/")?>
	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas ac lorem velit, quis auctor sem. In luctus enim a eros sodales consequat. Proin ultrices venenatis venenatis. Proin lectus arcu, ultrices id ultricies eu, tempus in elit. Vivamus fermentum arcu sed felis rutrum luctus. Ut at tempor nisl. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Quisque et dolor justo, non molestie dolor. Proin convallis pulvinar aliquam. Proin vitae sapien nunc, a condimentum justo. 
	</p>
	<p class="links">
		<?php echo $html->link("Continuar en la tienda virtual","/tienda-virtual",array("class"=>"boton"));?>
		<?php //echo $html->link("ir a Pagar",array("#"),array("class"=>"pagar boton"));?>
	</p>

	<table width="100%" border="0" align="center" cellpadding="0" cellspacing="2" class="entryTable">
		<?php
			$cartContents = $this->requestAction("/carts/getMiniCart/c:$category_id/s:$session_id");
			if ( !empty($cartContents) && is_array($cartContents) ) { 
				$subTotal = null;
		?>
		<tr class="entryTableHeader">
			<th colspan="2" align="center">Producto</th>
			<th align="center">Precio</td>


		</tr>
		<?php
			foreach($cartContents as $cartContent) {
				$subTotal += $cartContent['products']['precio'] * $cartContent['carts']['cantidad'];
				echo $form->create('Carts', array('url'=>'/carts/updates/') );
		?>
		<tr class="content">
			<td width="80" align="center" class="left">
				<?php
				  	e(
				      	$html->link(
				      			$html->image(
											'/img/uploads/100x100/' . $cartContent['products']['imagen'],
				      						array('border' => '0')
										),
				      					array('action' => '../products/view/'.$cartContent['products']['id']),
				      					array('escape' => false)
								)
					); 
				?>

			</td>
			<td>
				<span><?php echo $html->link( $cartContent['products']['nombre'], "/products/view/".$cartContent['products']['id']);?></span>
				<span>Ref. <?php echo $this->requestAction("/products/getRef/".$cartContent['products']['id']); ?></span>
				<span>Talla <?php echo $this->requestAction("/tallas/getNombre/".$cartContent['inventories']['talla_id']); ?></span>
				<span>Color <?php echo $this->requestAction("/colores/getNombre/".$cartContent['inventories']['color_id']); ?></span>
			</td>
			<td align="center">
				<?php Configure::read('Shop.currency');?>
				<?php echo "$".number_format( $cartContent['products']['precio'], 0, ' ', '.'); ?>
			</td>
			
		
		</tr>
		<?php
				}
			}
		?>
		
	<!-- de aqui se saco el form end originalmente -->
	</table>
	<br />





</div>
</div>