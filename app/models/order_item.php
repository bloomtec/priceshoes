<?php
class OrderItem extends AppModel {
	var $name = 'OrderItem';
	var $displayField = 'order_id';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Inventory' => array(
			'className' => 'Inventory',
			'foreignKey' => 'inventory_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Order' => array(
			'className' => 'Order',
			'foreignKey' => 'order_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>