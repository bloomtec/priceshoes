<?php
class PagesController extends AppController {

	var $name = 'Pages';
function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow('view');
	}
	

	function view($slug = null) {
		if (!$slug) {
			$this->Session->setFlash(__('Página inválida', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('page', $this->Page->findBySlug($slug));
		$this->set("homeID",$slug);
	}

	

	
	function admin_index() {
		$this->Page->recursive = 0;
		$this->set('pages', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid page', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('page', $this->Page->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Page->create();
			if ($this->Page->save($this->data)) {
				$this->Session->setFlash(__('La página ha sido guardada', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La página no puede ser guardada. Por favor, inténtelo de nuevo.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid page', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Page->save($this->data)) {
				parent::saveAudit("Service","Modificar", $this->data["Page"]["id"]);
				$this->Session->setFlash(__('La página se ha actualizado', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('No se pudo actualizar la página. Por favor, inténtelo de nuevo.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Page->read(null, $id);
		}
	}
	function contacto(){
		
	}
	function registro(){
		
	}
	function crear_usuario(){
		
	}
	
	/*function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for page', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Page->delete($id)) {
			$this->Session->setFlash(__('Page deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Page was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}*/
}
?>