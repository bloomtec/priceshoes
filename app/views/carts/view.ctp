<table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
	<?php
		$cartContents = $this->requestAction("/carts/getMiniCart/c:$category_id/s:$session_id");
		if ( !empty($cartContents) && is_array($cartContents) ) { 
			$subTotal = null;
	?>
	<tr class="entryTableHeader">
		<td colspan="2" align="center">Item</td>
		<td align="center">Precio Unitario</td>
		<td width="75" align="center">Cantidad</td>
		<td align="center">Total</td>
		<td width="75" align="center">&nbsp;</td>
	</tr>
	<?php
		foreach($cartContents as $cartContent) {
			$subTotal += $cartContent['products']['precio'] * $cartContent['carts']['cantidad'];
			echo $form->create('Carts', array('url'=>'/carts/updates/') );
	?>
	<tr class="content">
		<td width="80" align="center">
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
			<?php echo $html->link( $cartContent['products']['nombre'], "/products/view/".$cartContent['products']['id']);?>
		</td>
		<td align="center">
			<?php Configure::read('Shop.currency');?>
			<?php echo "$" . $cartContent['products']['precio'];?>
		</td>
		<td width="75" align="center">
			<?php echo $form->input('Cart.cantidad', array('type'=>'text', 'label'=>'', 'value'=>$cartContent['carts']['cantidad']));?>
			<?php echo $form->hidden('Cart.id', array('value'=>$cartContent['carts']['id']));?>
			<?php echo $form->end("Actualizar el carrito");?>
		</td>
		<td align="center">
			<?php Configure::read('Shop.currency');?>
			<?php echo "$" . $cartContent['products']['precio'] * $cartContent['carts']['cantidad'];?>
		</td>
		<td width="75" align="left">
			<!-- <?php echo $form->button('Elminar', array( 'class'=>'box' , 'onClick'=>"window.location.href='".$this->base."/carts/remove/cart_id:".$cartContent['carts']['id']."'" ) ) ;?> -->
			<?php echo $html->link('Eliminar','/carts/remove/cart_id:'.$cartContent['carts']['id']);?>
		</td>
	</tr>
	<?php
			}
		}
	?>
	<tr class="content">
		<td colspan="4" align="right">
			Total
		</td>
		<td align="center">
			<?php Configure::read('Shop.currency');?>
			<?php if (isset($subTotal)) echo "$" . $subTotal;?>
		</td>
		<td width="75" align="center">
			&nbsp;
		</td>
	</tr>
<!-- de aqui se saco el form end originalmente -->
</table>
<br />
<table width="550" border="0" align="center" cellpadding="10" cellspacing="0">
	<tr align="center">
		<td>
			<!-- <?php echo $form->button('Seguir Comprando', array( 'class'=>'box' , 'onClick'=>"window.location.href='".$this->base."/inventories/index" ) ) ;?> -->
			<?php 
				echo $form -> create(null, array('url'=>'/categories/index'));
				echo $form -> end('Seguir Comprando');
			?>
			<!-- <?php echo $html->link('Seguir Comprando','/categories/index');?> -->
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
				echo $form -> end('Proceder a pagar');
  			?>
  		</td>
  	</tr>
</table>