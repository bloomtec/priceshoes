<!--
hacer funcion confirmacion (recibe id de la orden)
se piden todos los datos y se pasa a pagar
datos (# tarjeta y cod verificacion; cc; datos de envio - departamento, ciudad y direccion)
-->
<div class="confirmarOrden" id="crear-usuario">
	<?php echo $form->create("Datos", array('url'=>'/orders/pagar')); ?>
	<div class="layer">
	<h2>Datos De Envío</h2>
	<?php
		
		echo $form->hidden("Order.id", array('value'=>$this->getVar("order_id")));
		echo $form->input("Order.envio_nombre", array('type'=>'text', 'label'=>'Nombre'));
		echo $form->input("Order.envio_apellido", array('type'=>'text', 'label'=>'Apellido'));
		echo $form->input("Order.envio_estado", array('type'=>'text', 'label'=>'Estado'));
		echo $form->input("Order.envio_ciudad", array('type'=>'text', 'label'=>'Ciudad'));
		echo $form->input("Order.envio_direccion", array('type'=>'text', 'label'=>'Dirección'));
		echo $form->input("Order.envio_telefono", array('type'=>'text', 'label'=>'Teléfono'));
		
	//	echo $form->input("Order.envio_costo", array('type'=>'text', 'label'=>'Costo'));
	?>
	</div>
	<div class="layer">
	<h2>Datos De Pago</h2>
	<?php
		echo $form->input("Order.pago_nombre", array('type'=>'text', 'label'=>'Nombre (como aparece en la tarjeta)'));
	//	echo $form->input("Order.pago_apellido", array('type'=>'text', 'label'=>'Apellido'));
		echo $form->input("Order.pago_cedula", array('type'=>'text', 'label'=>'Cédula'));
	//	echo $form->input("Order.pago_direccion", array('type'=>'text', 'label'=>'Dirección'));
	//	echo $form->input("Order.pago_telefono", array('type'=>'text', 'label'=>'Teléfono'));
	//	echo $form->input("Order.pago_ciudad", array('type'=>'text', 'label'=>'Ciudad'));
	//	echo $form->input("Order.pago_estado", array('type'=>'text', 'label'=>'Estado'));
		echo $form->input("Order.tarjeta_numero", array('type'=>'text', 'label'=>'Número De La Tarjeta'));
		echo $form->input("Order.tarjeta_codigo", array('type'=>'text', 'label'=>'Código De Verificación'));
		
	?>
	</div>

	<?php echo $form->end("Confirmar"); ?>
<div style="clear:both"></div>
</div>