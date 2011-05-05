<?php
class CategoriesController extends AppController {

	var $name = 'Categories';
	
	function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->deny("admin_index","admin_view","admin_add","admin_edit","admin_delete");
	}
	
	function getAll() {
		return $this->Category->find('all');
	}	
	
	function menu() {
		// get all categories ordered by category name		
		$categories = $this->Category->find('all');
		// format the categories for display
		//return $this->Category->buildCategories($categories, $this->passedArgs['c']);
		return $categories;
	}
	
	function menuCategories(){
		$this->Category->recursive=-1;
		$categories=$this->Category->find("all",array(
			"conditions"=>array(
				"order <="=>"8"
				))
			);
		return $categories;
	}
	function promocionadas(){
		$this->Category->recursive=-1;
		$categories=$this->Category->find("all",array(
			"conditions"=>array(
				"promocionar"=>true
				))
			);
		return $categories;
	}
	function index() {
		$this->layout="virtual";
		$this->Category->recursive = 0;
		$this->set('categories', $this->paginate());
	}

	function view($id = null) {
		$this->layout="virtual";
		if (!$id) {
			$this->Session->setFlash(__('Categoría inválida', true));
			$this->redirect(array('action' => 'index'));
		}
		
		$this->paginate=array("Product"=>array("limit"=>"12","joins"=>array(
			array('table' => 'inventories',"alias"=>"Inventory","type"=>"left",'conditions' => array(
					'Product.id=Inventory.product_id',
					)
			)
		),"conditions"=>array("Inventory.disponible"=>true),
			"fields"=>array("DISTINCT Product.id","imagen","nombre","precio")
		));
		//debug($this->paginate("Product",array("category_id"=>$id)));
		$this->set("products",$this->paginate("Product",array("category_id"=>$id)));
		$this->set('category', $this->Category->read(null, $id));
	}
	
	function news($id = null) {
		/*if (!$id) {
			$this->Session->setFlash(__('Invalid category', true));
			$this->redirect(array('action' => 'index'));
		}*/
		$this->paginate=array("Product"=>array("limit"=>"12"));
		$this->set("products",$this->paginate("Product",array("novedad"=>true)));
		$this->set('category', $this->Category->read(null, $id));
	}
	
	function admin_index() {
		$this->Category->recursive = 0;
		$this->set('categories', $this->paginate());
	}
	function admin_updateField($id=null,$field=null,$valor=null){
		$this->Category->recursive=-1;
		$category=$this->Category->read(null,$id);
		$category["Category"][$field]=$valor;
		if($this->Category->save($category)){
			$this->Session->setFlash(__('La categoría ha sido actualizada', true));
		}else{
			$this->Session->setFlash(__('No se pudo actualizar la categoría. Por favor, Intente de nuevo', true));
		}
		$this->redirect($this->referer());
	}
	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid category', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('category', $this->Category->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Category->create();
			$this->data["Category"]["order"]=$this->Category->find("count")+1;
			if ($this->Category->save($this->data)) {
				$this->Session->setFlash(__('Categoría actualizada', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('No se pudo actualizar la categoría. Por favor, Intente de nuevo', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Categoría inválida', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Category->save($this->data)) {
				$this->Session->setFlash(__('Categoría actualizada', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('No se pudo actualizar la categoría. Por favor, Intente de nuevo', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Category->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Categoría inválida', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Category->delete($id)) {
			$this->Session->setFlash(__('Categoría eliminada', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('No se pudo borrar la categoría', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>