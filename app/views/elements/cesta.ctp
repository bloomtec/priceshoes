<div id="cesta">
	<div class="titulo">
		<h1>Mi Carrito <?php echo $this->Html->image('carrito_2.png', array('alt' => 'carrito'))?></h1>
	</div>
	<table id="cesta-tabla">
		<?php
			$cartContents = $this->requestAction("/carts/getMiniCart/c:$category_id/p:$inventory_id/s:$session_id");
			if (!empty($cartContents) && is_array($cartContents)) {
				$subTotal = 0;
		?>
		<tr>
			<td colspan="2">Contenido Cesta</td>
		</tr>
		<?php
			foreach($cartContents as $cartContent) { 
			// Subtotal Calculation
			$subTotal += $cartContent['products']['precio'] * $cartContent['carts']['cantidad'];
		?>
		<tr>
		<td>
			<?php echo $cartContent['carts']['cantidad']; ?> X 
			<?php echo $html->link($cartContent['products']['nombre'], '/carts/add/inventory_id:'.$cartContent['inventories']['id'].'category_id:'.$cartContent['categories']['id']);?>
		</td>
		<td width="30%" align="right">
			<?php Configure::read('Shop.currency');?><?php echo $cartContent['products']['precio'] * $cartContent['carts']['cantidad'];?>
		</td>
		</tr>
		<?php
			} 
		?>
		<tr>
			<td align="right">Total</td>
			<td width="30%" align="right"><?=Configure::read('Shop.currency');?><?php echo $subTotal;?></td>
		</tr>
		<tr>
			<td colspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="2" align="center"><?php echo $html->link('Ir al carrito de compras','/carts/view');?></td>
		</tr>
		<?php
			} else {
				echo '<tr><td width="150">La cesta esta vacia</td></tr>';
			}
	    ?>
	</table>
</div>