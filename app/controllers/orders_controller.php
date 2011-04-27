<?php
class OrdersController extends AppController {

	var $name = 'Orders';
	var $uses = array('Order','OrderItem' );
	function index(){
		
	}
	public function recibirDatosCarrito(){
		$this->autoRender = false;
		
		// Crear la orden
		//
		$this->Order->create();
		foreach($this->data as $datosItem){
			if(!empty($datosItem['tipo_de_tarjeta'])){
				debug($datosItem['tipo_de_tarjeta']);
				if($datosItem['tipo_de_tarjeta'] === 0){
					// Tarjeta De Credito
					//
					$this->Order->medio_de_pago=1;
				} else {
					// Tarjeta Debito
					//
					$this->Order->medio_de_pago=2;
				}
			}
		}
		$this->Order->save();
		
		// Crear los items de la orden
		//
		foreach($this->data as $datosItem){
			if(empty($datosItem['tipo_de_tarjeta'])){
				$this->OrderItem->create();
				$this->OrderItem->inventory_id=$datosItem['inventory_id'];
				$this->OrderItem->order_id=$this->Order->id;
				$this->OrderItem->cantidad=$datosItem['cantidad'];
				$this->OrderItem->save();
			}
		}
	}
}
?>