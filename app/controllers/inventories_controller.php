<?php
class InventoriesController extends AppController {

	var $name = 'Inventories';
	var $uses=array("Inventory","Gallery");
	
	function getInventoryID ( $product_id = null, $color_id = null, $talla_id = null ) {
		$data = $this -> Inventory -> find('first', array('conditions' => array('product_id' => $product_id, 'talla_id' => $talla_id, 'color_id' => $color_id)));
		return $data['Inventory']['id'];
	}
	
	function index() {
		$this->Inventory->recursive = 0;
		$this->set('inventories', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid inventory', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('inventory', $this->Inventory->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Inventory->create();
			if ($this->Inventory->save($this->data)) {
				$this->Session->setFlash(__('The inventory has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The inventory could not be saved. Please, try again.', true));
			}
		}
		$products = $this->Inventory->Product->find('list');
		$tallas = $this->Inventory->Talla->find('list');
		$colores = $this->Inventory->Color->find('list');
		$this->set(compact('products', 'tallas', 'colores'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid inventory', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Inventory->save($this->data)) {
				$this->Session->setFlash(__('The inventory has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The inventory could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Inventory->read(null, $id);
		}
		$products = $this->Inventory->Product->find('list');
		$tallas = $this->Inventory->Talla->find('list');
		$colores = $this->Inventory->Color->find('list');
		$this->set(compact('products', 'tallas', 'colores'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for inventory', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Inventory->delete($id)) {
			$this->Session->setFlash(__('Inventory deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Inventory was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->Inventory->recursive = 0;
		$this->set('inventories', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid inventory', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('inventory', $this->Inventory->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Inventory->create();
			if ($this->Inventory->save($this->data)) {
				$this->Session->setFlash(__('The inventory has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The inventory could not be saved. Please, try again.', true));
			}
		}
		$products = $this->Inventory->Product->find('list');
		$tallas = $this->Inventory->Talla->find('list');
		$colores = $this->Inventory->Color->find('list');
		$this->set(compact('products', 'tallas', 'colores'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid inventory', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Inventory->save($this->data)) {
				$this->Session->setFlash(__('The inventory has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The inventory could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Inventory->read(null, $id);
		}
		$products = $this->Inventory->Product->find('list');
		$tallas = $this->Inventory->Talla->find('list');
		$colores = $this->Inventory->Color->find('list');
		$this->set(compact('products', 'tallas', 'colores'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for inventory', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Inventory->delete($id)) {
			$this->Session->setFlash(__('Inventory deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Inventory was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}

	function admin_disponibilidad(){
		$productID = $this->data['Product']['id'];
		$data = $this->data['Inventory'];
		//debug( $this->data);
		foreach ($data as $colorID=>$porColores) {
			foreach ($porColores as $tallaID=>$porTallas) {
				$unInventario = $this->Inventory->find('first', array('conditions' => array('product_id' => $productID,'talla_id' => $tallaID, 'color_id' => $colorID)));
				if(isset($unInventario['Inventory'])){
					// El inventario ya existe -> Actualizar
					//
			 		$this->Inventory->read(null, $unInventario['Inventory']['id']);
			 		$this->Inventory->set('disponible', $data["$colorID"]["$tallaID"]);
			 		$this->Inventory->save();
				} else {
					// El inventario no existe -> Crear
					//
					// Cada vez que se crea un inventario, se debe validar si existe la galeria del respectivo color para el producto
					//si no existe se debe crear una galeria con nombre producto-color
					$encontrado=$this->Gallery->find('count',array("conditions"=>array('Gallery.nombre'=>$productID.'-'.$colorID)));
					if(!$encontrado){
						$gallery["Gallery"]["nombre"]=$productID.'-'.$colorID;
						$this->Inventory->Color->recursive=0;
						$color=$this->Inventory->Color->read(null,$colorID);
						$gallery["Gallery"]["descripcion"]=$color["Color"]["nombre"];
						$this->Gallery->create();
						$this->Gallery->save($gallery);
					}
					$this->Inventory->create();
					$this->Inventory->set('product_id', $productID);
					$this->Inventory->set('talla_id', $tallaID);
					$this->Inventory->set('color_id', $colorID);
					$this->Inventory->set('disponible', $data["$colorID"]["$tallaID"]);
					$this->Inventory->save();
				}
			}
		}
		$this->Session->setFlash(__('Disponibilidad Actualizada', true));
		$this->redirect('/admin/products/disponibilidad/' . $productID);
	}

	function getAll() {
		return $this->Inventory->find('all', array('conditions' => array('disponible' => 1)));
	}

}
?>