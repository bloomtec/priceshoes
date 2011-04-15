<?php
class Inventory extends AppModel {
	var $name = 'Inventory';
	//The Associations below have been created with all possible keys, those that are not needed can be removed


	var $belongsTo = array(
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'product_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Talla' => array(
			'className' => 'Talla',
			'foreignKey' => 'talla_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Color' => array(
			'className' => 'Color',
			'foreignKey' => 'color_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	function getColores($product_id){
		/**
		 * Devueve un array con los colores y las tallas disponibles de un determinado produto
		 */
		 $array=array();
		$colores=$this->find("list",array("fields"=>array("color_id","color_id"),"conditions"=>array("disponible"=>true,"product_id"=>$product_id)));
		foreach($colores as $color){
			$this->Color->recursive=0;
			$elColor=$this->Color->read(null,$color);
			$array[$elColor["Color"]["id"]]["Color"]=$elColor["Color"];
			//debug($elColor);
			$this->Talla->recursive=0;
			$tallas=$this->find("list",array("fields"=>array("talla_id","talla_id"),"conditions"=>array("Inventory.disponible"=>true,"Inventory.product_id"=>$product_id,"Inventory.color_id"=>$color)));
			foreach($tallas as $talla){
				$this->Talla->recursive=0;
				$laTalla=$this->Talla->read(null,$talla);
				$array[$elColor["Color"]["id"]]["Talla"][$laTalla["Talla"]["id"]]=$laTalla["Talla"];
			}
		}
		return $array;
	}
}
?>