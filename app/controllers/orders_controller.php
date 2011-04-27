<?php
class OrdersController extends AppController {

	var $name = 'Orders';
	var $uses = array('Order', 'OrderItem');
	
	private function extraerItems($datos = null){
		$items = array();
		
		if(isset($datos)){			
			foreach ($datos as $tipoInfo=>$info){
				$type = substr($tipoInfo, 0, 3);
				if($type === "Car"){
					$items[$tipoInfo]=$info;
				}
			}
		}
		
		return $items;
	}
	
	private function extraerTarjeta($datos = null) {		
		if(isset($datos)){			
			foreach ($datos as $tipoInfo=>$info){
				$type = substr($tipoInfo, 0, 3);
				if($type === "Tar"){
					return $info['tipo_de_tarjeta'] + 1;
				}
			}
		}
		return null;
	}
	
	public function recibirDatosCarrito(){
		$this->autoRender = false;
		
		$items = $this->extraerItems($this->data);
		$tarjeta = $this->extraerTarjeta($this->data);
		
		// Crear la orden
		//
		$this->Order->create();		
		$this->Order->set('medio_de_pago', $tarjeta);
		$this->Order->save();
		
		// Crear los items de la orden
		//
		foreach($items as $item){
			$this->OrderItem->create();
			$this->OrderItem->set('inventory_id', $item['inventory_id']);
			$this->OrderItem->set('order_id', $this->Order->id);
			$this->OrderItem->set('cantidad', $item['cantidad']);
			$this->OrderItem->save();
		}
		
		//$this->redirect('/orders/confirmarOrden/'.$this->Order->id);
	}
	
	public function confirmarOrden($order_id = null){
		if(isset($order_id)){
			$this->set(array('order_id'=>$order_id));
		}
	}
}
?>