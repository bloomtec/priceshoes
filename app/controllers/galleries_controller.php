<?php
class GalleriesController extends AppController {

	var $name = 'Galleries';
	function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->deny("admin_index","admin_view","admin_add","admin_edit","admin_delete");
	}
	function index() {
		$this->Gallery->recursive = 0;
		$this->set('galleries', $this->paginate());
	}
	function getByNombre(){
		$nombre=$_GET["nombre"];
		echo json_encode($this->Gallery->findByNombre($nombre));
		Configure::write("debug",0);
		$this->autorender=false;
		exit(0);
	}
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Galería inválida', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('gallery', $this->Gallery->read(null, $id));
	}

	
	function admin_index() {
		$this->Gallery->recursive = 0;
		$this->set('galleries', $this->paginate());
	}
	function admin_product($productId){
		$inventarios=$this->requestAction("/products/getColores/".$productId);
			$galleries=array();
			foreach($inventarios as $inventario){
				$galleries[]=$this->Gallery->find("first",array(
					"conditions"=>array(
						"nombre"=>"$productId-".$inventario['Color']['id']
						)
					));
			}
			//debug($galleries);
		$this->set("galleries",$galleries);
	}
	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Galería inválida', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('gallery', $this->Gallery->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Gallery->create();
			if ($this->Gallery->save($this->data)) {
				$this->Session->setFlash(__('Galería guardada', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('La galería no pudo ser guardada. Por favor, intente de nuevo.', true));
			}
		}
		$inventories = $this->Gallery->Inventory->find('list');
		$this->set(compact('inventories'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Galería inválida', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Gallery->save($this->data)) {
				$this->Session->setFlash(__('Galería actualizada', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('No se pudo actualizar la galería. Por favor, intente de nuevo.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Gallery->read(null, $id);
		}
		$inventories = $this->Gallery->Inventory->find('list');
		$this->set(compact('inventories'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Galería inválida', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Gallery->delete($id)) {
			$this->Session->setFlash(__('Galería eliminida', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('La galería no pudo ser eliminada', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>