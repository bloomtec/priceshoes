<br />
<?php 
	$categorias = $this->requestAction("/categories/getAll");
	foreach($categorias as $categoria):
?>
<div class="contenedor_productos">
	<?php
	    if ( $categoria['Category']['imagen'] ) {
	    	$img = '/img/uploads/100x100/' . $categoria['Category']['imagen'];
		} else {
			$img = '/img/inactivo.png';
		}
		e(
			$html->link(
				$html->image($img, array( 'border' => '0' )),
				array('action' => '/index/category_id:' . $categoria['Category']['id']),
				array('escape' => false))
		);
	?>
	<br />
    <?php
    	e( $html->link( $categoria['Category']['nombre'], "/carts/index/category_id:".$categoria['Category']['id'] ));
    ?>
</div>
<?php
	endforeach;
?>