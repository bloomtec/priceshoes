<?php
	if ($inventory_id) {
		$this->requestAction('/carts/add/inventory_id:' . $inventory_id);
		echo $this->element('cesta');
		echo $this->element('inventarios');
	} else if ($category_id) {
		echo $this->element('productos');	
	} else {
		echo $this->element('categorias');	
	}
?>