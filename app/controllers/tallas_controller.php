<?php
class TallasController extends AppController {

	var $name = 'Tallas';
	function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->deny("admin_index","admin_view","admin_add","admin_edit","admin_delete","add","edit");
	}
	function index() {
		$this->Talla->recursive = 0;
		$this->set('tallas', $this->paginate());
	}
	function getNombre($tallaId){
		$this->Talla->recursive=0;
		$talla=$this->Talla->read(null,$tallaId);
		return $talla["Talla"]["nombre"];
	}
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid talla', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('talla', $this->Talla->read(null, $id));
	}

	
	function admin_index() {
		$this->Talla->recursive = 0;
		$this->set('tallas', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid talla', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('talla', $this->Talla->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Talla->create();
			if ($this->Talla->save($this->data)) {
				$this->Session->setFlash(__('The talla has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The talla could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid talla', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Talla->save($this->data)) {
				$this->Session->setFlash(__('The talla has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The talla could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Talla->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for talla', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Talla->delete($id)) {
			$this->Session->setFlash(__('Talla deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Talla was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>