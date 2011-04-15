<table id="cesta">
	<?php
		$cartContents = $this->requestAction("/carts/getMiniCart/c:$category_id/p:$inventory_id/s:$session_id");
		if (!empty($cartContents) && is_array($cartContents)) {
			$sub_total = 0;
	?>
	<tr>
		<td colspan="2">Contenido Cesta</td>
	</tr>
	<?php 
		foreach($cartContents as $cartContent) { 
		// Subtotal Calculation
		$subTotal += $cartContent['Product']['precio'] * $cartContent['Cart']['cantidad'];
	?>
	<tr>
	<td>
		<?=$cartContent['Cart']['cantidad'];?> X 
		<?=$html->link($cartContent['Product']['nombre'], '/carts/add/inventory_id:'.$cartContent['Inventory']['id'].'category_id:'.$cartContent['Category']['id']);?>
	</td>
	<td width="30%" align="right">
		<?=Configure::read('Shop.currency');?><?=$cartContent['Product']['precio'] * $cartContent['Cart']['cantidad'];?>
	</td>
	</tr>
	<?php
		} 
	?>
	<tr>
		<td align="right">Total</td>
		<td width="30%" align="right"><?=Configure::read('Shop.currency');?><?=$subTotal;?></td>
	</tr>
	<tr>
		<td colspan="2">&nbsp;</td>
	</tr>
	<tr>
		<td colspan="2" align="center"><?=$html->link('Ir al carrito de compras','/carts/view');?></td>
	</tr>
	<?php
		} else {
			echo '<tr><td width="150">La cesta esta vacia</td></tr>';
		}
    ?>
</table>