<?php
class OrdersController extends AppController {

	var $name = 'Orders';
	var $uses = 'OrderItem';
	
	public function recibirDatosCarrito($datosCarrito = null){
		debug($datosCarrito);
	}
}
?>