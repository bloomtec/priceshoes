<?php

class AppController extends Controller {

	var $components = array("Auth","Session","Cookie");
	var $uses = array("Inventory", "Cart");
	var $helpers = array("Form", "Html", "Session", "Javascript");
	var $session_id;
	var $category_id;
	var $inventory_id;

	function beforeFilter() {	
		
		if(isset($this->params["prefix"])&&$this->params["prefix"]=="admin"){
			$this->Auth->userScope = array('User.role_id' => 1);
			$this->layout="admin";
		}
		
		
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
		$this->Cookie->name = 'PriceShoes';
		$this->Cookie->time = '10 Days'; // or '1 hour'
		$this->Cookie->path = '/';
		   // $this->Cookie->domain = 'priceshoes.com';
		$this->Cookie->domain = 'localhost';
		$this->Cookie->secure = false; //i.e. only sent if using secure HTTPS
		$this->Cookie->key = 'qSI232qs*&sXOw!';
			//$this->Cookie->delete();
			//
		$this->Auth->fields = array(
		'username' => 'email',
		'password' => 'password'
		);
		$this->Auth->loginAction = array('controller'=>'users','action'=>'login');
		$this->Auth->loginRedirect  = array('controller'=>'users','action'=>'index');
		$this->Auth->allow('*');
		
	}

	function beforeRender() {
		$PAGE_TITLE="Titulo de la pagina";
		$this->set(compact("PAGE_TITLE"));
	}

}