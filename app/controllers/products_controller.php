<?php
class ProductsController extends AppController {

	var $name = 'Products';
	var $uses=array("Product","Gallery");
	function beforeFilter(){
		parent::beforeFilter();
		$this->Auth->allow("index","view","promocionados","novedad","news","search");
	}
	function getRef($productId){
		$this->Product->recursive=0;
		$product=$this->Product->read(null,$productId);
		return $product["Product"]["referencia"];
	}
	function getColores($id){
		/**
		 * Devueve un array con los colores y las tallas disponibles de un determinado produto
		 */
		 return $this->Product->Inventory->getColores($id);
	}
	function getGallery($id,$colorId){
		if(!empty($this->params['requested'])){
			return $this->Gallery->find("first",array(
				"conditions"=>array(
					"name"=>"$id-$colorId"
				)));
		}else{//AJAX
			
		}
	}
	function getColor($id){
		/**
		 * Devueve un array con un color y las tallas disponibles de un determinado produto
		 */
		 return $this->Product->Inventory->getColor($id);
	}
	function index() {
		$this->Product->recursive = 0;
		$this->set('products', $this->paginate());
	}
	
	function search(){
			$this->set("products",$this->paginate("Product",array("Product.nombre like"=>"%".$this->data["Product"]["search"]."%")));
	}
	function promocionados(){
		$this->Product->recursive=-1;	
		$productos=$this->Product->find("all",array("conditions"=>array("promocionar"=>true)));
		return $productos;
	}
	
	function novedad(){
		$this->Product->recursive=-1;
		$novedades=$this->Product->find("all",array("conditions"=>array("novedad"=>true)));
		$seleccionado=rand(0, count($novedades)-1);
		
		return $novedades[$seleccionado];
	}
	function masvendidos(){
		/*
		 * HACER FUNCION QUE DEVUELVA LOS 10 productos mas vendidos y un aleatorio que devuelva uno de esos 10
		 * 
		 */
		$this->Product->recursive=-1;
		$masVendidos=$this->Product->find("all",array("limit"=>"10"));
		$seleccionado=rand(0, count($masVendidos)-1);
		return $masVendidos[$seleccionado];
	}
	function view($id = null) {
		$this->layout="virtual";
		if (!$id) {
			$this->Session->setFlash(__('Producto inválido', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('product', $this->Product->read(null, $id));
	}

	function admin_index() {
		$this->Product->recursive = 0;
		$this->set('products', $this->paginate());
	}
	
	function lists() {
		$categories = $this->Category->find( 'all', array( 'order' => 'Category.id ASC' ));		
		$categories = $this->Category->buildCategories($categories, $this->passedArgs['c']);
		$children_ids  = $this->Category->getChildCategories($categories, $this->passedArgs['c'], true);
		$allCatIds = array_merge(array($this->passedArgs['c']), $children_ids);
		return $this->Product->lists($allCatIds);
	}
	
	function admin_updateField($id=null,$field=null,$valor=null){
		$this->Product->recursive=-1;
		$product=$this->Product->read(null,$id);
		$product["Product"][$field]=$valor;
		if($this->Product->save($product)){
			$this->Session->setFlash(__('Producto actualizado', true));
		}else{
			$this->Session->setFlash(__('No se pudo actualizar el producto. Por favor, Intente de nuevo', true));
		}
		$this->redirect($this->referer());
	}
	
	function admin_disponibilidad($productoId){
		$tallas=$this->Product->Inventory->Talla->find("list");
		$colores=$this->Product->Inventory->Color->find("list");
		$inventarios=$this->Product->Inventory->find("list",array("conditions"=>array("product_id"=>$productoId),"fields"=>array("talla_id","disponible","color_id")));
		$this->set(compact("tallas","inventarios","colores"));
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Producto inválido', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('product', $this->Product->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Product->create();
			if ($this->Product->save($this->data)) {
				$this->Session->setFlash(__('Producto guardado', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El producto no pudo ser guardado. Por favor, intente de nuevo.', true));
			}
		}
		$categories = $this->Product->Category->find('list');
		$this->set(compact('categories'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Producto inválido', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Product->save($this->data)) {
				$this->Session->setFlash(__('Producto actualizado', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('El producto no pudo ser actualizado. Por favor, intente de nuevo.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Product->read(null, $id);
		}
		$categories = $this->Product->Category->find('list');
		$this->set(compact('categories'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Producto inválido', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Product->delete($id)) {
			$this->Session->setFlash(__('Producto eliminado', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('El producto no pudo ser eliminado', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>