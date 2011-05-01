<?php
class ColoresController extends AppController {

	var $name = 'Colores';

	function index() {
		$this->Color->recursive = 0;
		$this->set('colores', $this->paginate());
	}
	function getNombre($colorId){
		$this->Color->recursive=0;
		$colore=$this->Color->read(null,$colorId);
		return $colore["Color"]["nombre"];
	}
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Color inválido', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('color', $this->Color->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Color->create();
			if ($this->Color->save($this->data)) {
				$this->Session->setFlash(__('Color guardado', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El color no pudo ser guardado. Por favor, intente de nuevo.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Color inválido', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Color->save($this->data)) {
				$this->Session->setFlash(__('Color actualizado', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El color no pudo ser actualizado. Por favor, intente de nuevo.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Color->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Color inválido', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Color->delete($id)) {
			$this->Session->setFlash(__('Color eliminado', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('El color no pudo ser eliminado', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->Color->recursive = 0;
		$this->set('colores', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Color inválido', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('color', $this->Color->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Color->create();
			if ($this->Color->save($this->data)) {
				$this->Session->setFlash(__('Color guardado', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El color no pudo ser guardado. Por favor, intente de nuevo.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Color inválido', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Color->save($this->data)) {
				$this->Session->setFlash(__('Color actualizado', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El color no pudo ser actualizado. Por favor, intente de nuevo.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Color->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Color inválido', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Color->delete($id)) {
			$this->Session->setFlash(__('Color borrado', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('El color no pudo ser borrado', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>