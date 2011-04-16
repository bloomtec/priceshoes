<br />
<?php
	$inventarios = $this->requestAction("/inventories/getAll");
	foreach($inventarios as $inventario):
?>
<div class="contenedor_inventarios">
	<?php
		if ( $inventario['Product']['imagen'] ) {
	        $img = '/img/uploads/200x200/' . $inventario['Product']['imagen'];
	    } else {
    	    $img = '/img/inactivo.png';
		}
		e(
			$html->link(
    		$html->image($img, array( 'border' => '0' )),
    		array('action' => '../products/view/' . $inventario['Product']['id']),
    		array('escape' => false))
		);
	?>
	<br />
    <?php
    	e( $html->link( $inventario['Product']['nombre'], "/carts/index/inventory_id:".$inventario['Inventory']['id'] ));
    ?>
</div>
<?php
	endforeach;
?>