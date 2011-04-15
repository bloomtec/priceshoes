<br />
<?php 
	$productos = $this->requestAction("/products/lists/c:$category_id/");
	foreach($productos as $producto):
?>
<div class="contenedor_productos">
	<?php 
	    if ( $producto['Product']['imagen'] ) {
	    	$img = '/img/uploads/100x100/' . $producto['Product']['imagen'];
		} else {
			$img = '/img/inactivo.png';
		}
		e(
			$html->link(
				$html->image($img, array( 'border' => '0' )),
				array('controller' =>'products',
				'action' => "view/category_id:$category_id/product_id:".$producto['Product']['id']),
				array('escape' => false))
		);
	?>
    <br />
    <?php
    	echo $html->link( $producto['Product']['nombre'], "/products/view/category_id:$category_id/product_id:".$producto['Product']['id'] );
    ?>
    <br />Price : $<?=$producto['Product']['precio'];
?>
</div>
<?php
	endforeach;
?>