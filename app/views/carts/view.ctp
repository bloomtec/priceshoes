<div id="left-content">
	 <?php echo $this->element("virtual");?>
	 <?php echo $this->element("social");?>
	<?php echo $this->element("misfavoritos");?>
</div>
<div id="right-content">

<div class="carrito">
	<h1>MI CARRITO</h1>
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
			<th width="75" align="center">Cantidad</th>
			<th align="center">Total</td>

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
				<?php echo "$" . $cartContent['products']['precio'];?>
			</td>
			<td width="75" align="center">
				<?php echo $form->input('Cart.cantidad', array('type'=>'text', 'label'=>'', 'value'=>$cartContent['carts']['cantidad']));?>
				<?php echo $form->hidden('Cart.id', array('value'=>$cartContent['carts']['id']));?>
				<?php echo $form->end("Actualizar");?>
			</td>
			<td align="center" class="right">
				<?php Configure::read('Shop.currency');?>
				<?php echo "$" . $cartContent['products']['precio'] * $cartContent['carts']['cantidad'];?>
				<?php echo $html->link('Eliminar','/carts/remove/cart_id:'.$cartContent['carts']['id']);?>
			</td>
		
		</tr>
		<?php
				}
			}
		?>
		<tr class="total">
			<th colspan="3"style="background:none;">
				
			</th>
			<th colspan="1"style="text-align:right;">
				Total
			</th>
			<th style="text-align:center;">
				<?php Configure::read('Shop.currency');?>
				<?php if (isset($subTotal)) echo "$" . $subTotal;?>
			</th>

		</tr>
	<!-- de aqui se saco el form end originalmente -->
	</table>
	<br />


	<table class="pago" width="550" border="0" align="center" cellpadding="10" cellspacing="0">
		<tr align="center">
			<td>
				
			</td>
			<td>
				<?php
					echo $form -> create(null, array('url'=>'/orders/recibirDatosCarrito/'));
					foreach($cartContents as $content){
						$cart_id = $content['carts']['id'];
						echo $form->hidden("Carrito-$cart_id.inventory_id", array('value'=>$content['carts']['inventory_id']));
						echo $form->hidden("Carrito-$cart_id.cantidad", array('value'=>$content['carts']['cantidad']));
					}
					echo $form->radio("Tarjeta.tipo_de_tarjeta", array("Credito", "Debito"), array("default"=>"Credito"));
					//echo $form->input("Tarjeta.tipo_de_tarjeta", array('type'=>'radio', 'options'=>array('Credito', 'Debito')));
					echo $form -> end('Proceder a pagar',array("div"=>"boton"));
	  			?>
	  		</td>
	  	</tr>
	</table>


</div>
</div>