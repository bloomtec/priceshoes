<?php
class OrdersController extends AppController {

	var $name = 'Orders';
	var $uses = array('Order', 'OrderItem',"UserField");
	
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
		$this->Order->set('payment_type_id', $tarjeta);
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
		
		$this->redirect('/orders/confirmarOrden/'.$this->Order->id);
	}
	
	public function confirmarOrden($order_id = null){
		if(isset($order_id)){
			$this->set(array('order_id'=>$order_id));
		}
		if($this->Auth->user("id")){
			$this->set("datos",$this->UserField->read(null,$this->Auth->user("id")));
		}
	}
	
	public function pagar(){
		$this->autoRender = false;
		if(!empty($this->data)){
			if($this->Order->save($this->data)){
				$this->Session->setFlash("Orden Confirmada");
			} else {
				$this->Session->setFlash("Hubo un problema al confirmar su orden");
			}
			$this->redirect('/');
		}
	}

	function admin_index() {
		$this->Order->recursive = 0;
		$this->set('orders', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid order', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('order', $this->Order->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Order->create();
			if ($this->Order->save($this->data)) {
				$this->Session->setFlash(__('The order has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The order could not be saved. Please, try again.', true));
			}
		}
		$users = $this->Order->User->find('list');
		$paymentTypes = $this->Order->PaymentType->find('list');
		$orderStates = $this->Order->OrderState->find('list');
		$this->set(compact('users', 'paymentTypes', 'orderStates'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid order', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Order->save($this->data)) {
				$this->Session->setFlash(__('The order has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The order could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Order->read(null, $id);
		}
		$users = $this->Order->User->find('list');
		$paymentTypes = $this->Order->PaymentType->find('list');
		$orderStates = $this->Order->OrderState->find('list');
		$this->set(compact('users', 'paymentTypes', 'orderStates'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for order', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Order->delete($id)) {
			$this->Session->setFlash(__('Order deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Order was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>