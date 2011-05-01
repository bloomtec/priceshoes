<?php
class FavoritesController extends AppController {

	var $name = 'Favorites';
	    var $components = array('Cookie');
	    function beforeFilter() {
	    	parent::beforeFilter();

			$this->Auth->allow('ajaxAdd');
	
	}
	function ajaxAdd(){
		$favorite["Favorite"]["user_id"]=$this->Auth->user("id");
		$favorite["Favorite"]["product_id"]=$_POST["product_id"];
		if($favorite["Favorite"]["user_id"]){//Si el usuario está logueado
			
			$check=$this->Favorite->find("count",array("conditions"=>array("product_id"=>$_POST["product_id"],"user_id"=>$favorite["Favorite"]["user_id"])));
			if(!$check){
				$this->Favorite->create();
				if($this->Favorite->save($favorite)){
					echo true;
				} else{
					echo false;
				}
			}else{
				echo true;
			}	
		}else{// si no esta logueado se guarda en una cookie
			$this->Favorite->Product->recursive=-1;
			$product=$this->Favorite->Product->read(null,$favorite["Favorite"]["product_id"]);
			$this->Cookie->write($favorite["Favorite"]["product_id"].".id", $product["Product"]["id"]);
			$this->Cookie->write($favorite["Favorite"]["product_id"].".nombre", $product["Product"]["nombre"]);
			$this->Cookie->write($favorite["Favorite"]["product_id"].".referencia", $product["Product"]["referencia"]);
			$this->Cookie->write($favorite["Favorite"]["product_id"].".imagen", $product["Product"]["imagen"]);
			$this->Cookie->write($favorite["Favorite"]["product_id"].".valor", $product["Product"]["valor"]);
			echo true;
			Configure::write("debug",0);
			$this->autoRender=0;
			exit(0);
		}		
		Configure::write("debug",0);
		$this->autoRender=0;
		exit(0);
	}
	function favoritosCookie(){
		return $this->Cookie->read();
		
	}
	function index() {
		$this->Favorite->recursive = 0;
		$this->set('favorites', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid favorite', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('favorite', $this->Favorite->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Favorite->create();
			if ($this->Favorite->save($this->data)) {
				$this->Session->setFlash(__('The favorite has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The favorite could not be saved. Please, try again.', true));
			}
		}
		$products = $this->Favorite->Product->find('list');
		$users = $this->Favorite->User->find('list');
		$this->set(compact('products', 'users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid favorite', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Favorite->save($this->data)) {
				$this->Session->setFlash(__('The favorite has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The favorite could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Favorite->read(null, $id);
		}
		$products = $this->Favorite->Product->find('list');
		$users = $this->Favorite->User->find('list');
		$this->set(compact('products', 'users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for favorite', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Favorite->delete($id)) {
			$this->Session->setFlash(__('Favorite deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Favorite was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->Favorite->recursive = 0;
		$this->set('favorites', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid favorite', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('favorite', $this->Favorite->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Favorite->create();
			if ($this->Favorite->save($this->data)) {
				$this->Session->setFlash(__('The favorite has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The favorite could not be saved. Please, try again.', true));
			}
		}
		$products = $this->Favorite->Product->find('list');
		$users = $this->Favorite->User->find('list');
		$this->set(compact('products', 'users'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid favorite', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Favorite->save($this->data)) {
				$this->Session->setFlash(__('The favorite has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The favorite could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Favorite->read(null, $id);
		}
		$products = $this->Favorite->Product->find('list');
		$users = $this->Favorite->User->find('list');
		$this->set(compact('products', 'users'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for favorite', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Favorite->delete($id)) {
			$this->Session->setFlash(__('Favorite deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Favorite was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>