<?php
class ShopComponent extends Object {

	var $controller;

	var $components = array('Session');

	function startup(&$controller) {
		$this -> controller = &$controller;
	}

	function getSessionId() {
		return $this->Session->read('Config.userAgent');
	}

	function getCategoryId() {
		if(isset($this -> controller -> passedArgs['cart_id']) && (int)$this -> controller -> passedArgs['cart_id'] != 1) {
			return (int)$this -> controller -> passedArgs['cart_id'];
		} else {
			return 0;
		}
	}

	function getInventoryId() {
		if(isset($this -> controller -> passedArgs['inventory_id']) && $this -> controller -> passedArgs['inventory_id'] != '') {
			return (int)$this -> controller -> passedArgs['inventory_id'];
		} else {
			return 0;
		}
	}

	function displayAmount($amount) {
		return Configure::read('Shop.currency') . number_format($amount);
	}

}
?>