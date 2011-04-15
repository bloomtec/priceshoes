<?php
class CartsController extends AppController {

	var $name = 'Carts';

	function index() {
	}

	function checkout() {
		$this -> set('cartContents', $this -> getMiniCart());
	}

	/*
 	Get all item in current session
 	from shopping cart table
 	*/
	// This renders the mini cart based on the current session id
	function getMiniCart() {
		return $this -> Cart -> getCartContent($this -> session_id);
	}

	function getCart() {
		$carts = $this -> Cart -> find('all', array('conditions' => array('Cart.session_id' => $this -> passedArgs['s']), 'recursive' => 2));
		if(isset($this -> params['requested'])) {
			return $carts;
		}
		$this -> set('carts', $carts);
	}

	function add() {
		$data = $this -> Inventory -> findById($this -> inventory_id);

		if(is_array($data) && $data['Inventory']['disponible'] != 0) {
			$this -> Session -> setFlash('Lo que ha pedido ya no se encuentra en stock');
			$this -> redirect('/');
		}

		// check if the product is already
		// in cart table for this session
		$sessionData = $this -> Cart -> getCart($this -> inventory_id, $this -> session_id);
		if( empty($sessionData)) {
			// put the product in cart table
			$this -> Cart -> addCart($this -> inventory_id, $this -> session_id);
		} else {
			// update product quantity in cart table
			$this -> Cart -> updateCart($this -> inventory_id, $this -> session_id);
		}

		// an extra job for us here is to remove abandoned carts.
		// right now the best option is to call this function here
		$this -> Cart -> cleanUp();
		$this -> redirect( array('controller' => 'inventories', 'action' => "view/inventory_id:$this->inventory_id"));
	}

	function view() {
		function view() {
			$this -> layout = 'checkbase';
		}

	}

	function remove() {
		$this -> Cart -> emptyBasket($this -> passedArgs['category_id']);
		if($this -> Cart -> isCartEmpty($this -> session_id)) {
			$this -> redirect( array('controller' => 'categories', 'action' => 'index'));
		} else {
			$this -> redirect( array('controller' => 'categories', 'action' => 'view'));
		}
	}

	function updates() {
		$cart = array();
		foreach($this->data as $key => $val) {
			if( is_array($val)) {
				continue;
			}
			$this -> Cart -> doUpdate($val, $key);
		}
		$this -> redirect( array('controller' => 'carts', 'action' => 'view'));
	}

}
?>