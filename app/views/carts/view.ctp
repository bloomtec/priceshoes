<table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
	<?php
		$cartContents = $this->requestAction("/carts/getMiniCart/c:$category_id/s:$session_id");
		if ( !empty($cartContents) && is_array($cartContents) ) { 
			$subTotal = null;
	?>
	  <tr class="entryTableHeader"> 
	   <td colspan="2" align="center">Item</td>
	   <td align="center">Unit Price</td>
	
	   <td width="75" align="center">Quantity</td>
	   <td align="center">Total</td>
	  <td width="75" align="center">&nbsp;</td>
	 </tr>
		<?php
			foreach($cartContents as $cartContent) {
				$subTotal += $cartContent['products']['precio'] * $cartContent['carts']['cantidad'];
				echo $form->create('Carts', array('url'=>'/carts/updates/') );
		?>
	<tr class="content">
		<td width="80" align="center"><?php
		  	e(
		      	$html->link($html->image('/img/uploads/100x100/' . $cartContent['products']['imagen'],
		      	array( 'border' => '0' )),
		      	array('action' => '/products/view/product_id'),
		      	array('escape' => false))
			); ?>
		</td>
		<td>
			<?php echo $html->link( $cartContent['products']['nombre'],
				"/products/view/product_id:".$cartContent['products']['id'].'id:'.$cartContent['carts']['id']);?>
		</td>
		<td align="right">
			<?php Configure::read('Shop.currency');?>
			<?php echo $cartContent['products']['precio'];?>
		</td>
		<td width="75">
			<?php echo $form->input('Cart.cantidad', array( 'name'=>'data['.$cartContent['carts']['id']. ']', 'type'=>'text', 'label'=>null, 'value'=>$cartContent['carts']['cantidad'] ) );?>
			<?php echo $form->hidden('Order.id', array( 'value'=>$cartContent['carts']['id']));?>
		</td>
		<td align="right">
			<?php Configure::read('Shop.currency');?>
			<?php echo $cartContent['products']['precio'] * $cartContent['carts']['cantidad'];?>
		</td>
		<td width="75" align="center">
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
		<td align="right">
			<?php Configure::read('Shop.currency');?>
			<?php echo $subTotal;?>
		</td>
		<td width="75" align="center">
			&nbsp;
		</td>
	</tr>
	<tr class="content">
		<td colspan="5" align="right">
			&nbsp;
		</td>
		<td width="75" align="center">
			<?php $form->end( array('class'=>'box' , 'label'=>'Update Cart', 'id'=>'btnUpdate') );?>	
		</td>
	</tr>
</table>
<br />
<table width="550" border="0" align="center" cellpadding="10" cellspacing="0">
	<tr align="center">
		<td>
			<!-- <?php echo $form->button('Seguir Comprando', array( 'class'=>'box' , 'onClick'=>"window.location.href='".$this->base."/inventories/index" ) ) ;?> -->
			<?php echo $html->link('Seguir Comprando','/inventories/index');?>
		</td>
		<td>
			<?php	
			  	foreach($cartContents as $key=>$val) {
					$str[] = $val['carts']['id'];
				}
  				$str = implode("_", $str);
  				echo $form->button('Proceder a pagar', array( 'class'=>'box' , 'onClick'=>"window.location.href='".$this->base."/orders/checkout/cts:".$str."'" ) ) ;
  			?>
  		</td>
  	</tr>
</table>