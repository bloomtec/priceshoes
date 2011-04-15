<?php
	echo 'Welcome to the land of music!
	<br />
	Please select your own music product!
	<br />
	Thanks for dropping by!<br />';	
	if ($inventory_id) {
		//echo $this->element('product_details');	
	} else if ($category_id) {
		echo $this->element('productos');	
	} else {
		echo $this->element('categorias');	
	}
?>