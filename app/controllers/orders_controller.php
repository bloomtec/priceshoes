<?php
class OrdersController extends AppController {

	var $name = 'Orders';
	var $uses = array('OrderItem');
	
	public function recibirDatosCarrito(){
		$this->autoRender = false;
		debug($this->data);
		//foreach($this->data as $datosItem){
		//	debug($datosItem);
		//}
	}
}
?>