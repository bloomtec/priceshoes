<?php

class AppController extends Controller {

	var $components = array("Acl","Session", "Auth", "RequestHandler");
	var $uses = array("Inventory", "Cart");
	var $helpers = array("Form", "Html", "Session", "Javascript");
	var $session_id;
	var $category_id;
	var $inventory_id;

	function beforeFilter() {
		$this->Auth->fields = array(
		'username' => 'email',
		'password' => 'password'
		);
		if(isset($this->params["prefix"])&&$this->params["prefix"]=="admin"){
			$this->layout="admin";
		}

		$this->Auth->loginAction = array('controller'=>'users','action'=>'login');

		$this->Auth->loginRedirect  = array('controller'=>'users','action'=>'menu');
		if ((isset($this->passedArgs['category_id'])&&((int)$this -> passedArgs['category_id'] != 1))) {
			$this -> cart_id = (int) $this -> passedArgs['category_id'];
		} else {
			$this -> cart_id = 0;
		}

		if((isset($this -> passedArgs['inventory_id']) && ($this -> passedArgs['inventory_id'] != ''))) {
			$this -> inventory_id = (int) $this -> passedArgs['inventory_id'];
		} else {
			$this -> inventory_id = 0;
		}

		$this -> session_id = $this->Session->read('Config.userAgent');
		$this -> set('category_id', $this->category_id);
		$this -> set('inventory_id', $this->inventory_id);
		$this -> set('session_id', $this->session_id);
	}

	function beforeRender() {
		$PAGE_TITLE="Titulo de la pagina";
		$this->set(compact("PAGE_TITLE"));
	}

}

?>