<!--
hacer funcion confirmacion (recibe id de la orden)
se piden todos los datos y se pasa a pagar
datos (# tarjeta y cod verificacion; cc; datos de envio - departamento, ciudad y direccion)
-->
<div class="confirmarOrden" id="crear-usuario">
	<?php echo $form->create("Datos", array('url'=>'/orders/pagar',"id"=>"ordenForm")); ?>
	<div class="layer">
	<h2>Datos De Envío</h2>
	<?php
		if(!isset($datos)){
			echo $form->hidden("Order.id", array('value'=>$this->getVar("order_id")));
			echo $form->input("Order.envio_nombre", array('type'=>'text', 'label'=>'Nombre (s)',"required"=>"required"));
			echo $form->input("Order.envio_apellido", array('type'=>'text', 'label'=>'Apellido (s)',"required"=>"required"));
			echo $form->input("Order.envio_estado", array('type'=>'text', 'label'=>'Estado',"required"=>"required"));
			echo $form->input("Order.envio_ciudad", array('type'=>'text', 'label'=>'Ciudad',"required"=>"required"));
			echo $form->input("Order.envio_direccion", array('type'=>'text', 'label'=>'Dirección',"required"=>"required"));
			echo $form->input("Order.envio_telefono", array('type'=>'text', 'label'=>'Teléfono',"required"=>"required"));
		}else{
			echo $form->hidden("Order.id", array('value'=>$this->getVar("order_id")));
			echo $form->input("Order.envio_nombre", array('type'=>'text', 'label'=>'Nombre (s)',"value"=>$datos["UserField"]["nombres"],"required"=>"required"));
			echo $form->input("Order.envio_apellido", array('type'=>'text', 'label'=>'Apellido (s)',"value"=>$datos["UserField"]["apellidos"],"required"=>"required"));
			echo $form->input("Order.envio_estado", array('type'=>'text', 'label'=>'Estado',"value"=>$datos["UserField"]["departamento_residencia"],"required"=>"required"));
			echo $form->input("Order.envio_ciudad", array('type'=>'text', 'label'=>'Ciudad',"value"=>$datos["UserField"]["ciudad_residencia"],"required"=>"required"));
			echo $form->input("Order.envio_direccion", array('type'=>'text', 'label'=>'Dirección',"value"=>$datos["UserField"]["direccion"].", ".$datos["UserField"]["direccion2"],"required"=>"required"));
			echo $form->input("Order.envio_telefono", array('type'=>'text', 'label'=>'Teléfono',"value"=>$datos["UserField"]["telefono_fijo"],"required"=>"required"));
		}
	//	echo $form->input("Order.envio_costo", array('type'=>'text', 'label'=>'Costo'));
	?>
	</div>
	<div class="layer">
	<h2>Datos De Pago</h2>
	<?php
		echo $form->input("Order.pago_nombre", array('type'=>'text', 'label'=>'Nombre (como aparece en la tarjeta)',"required"=>"required"));
	//	echo $form->input("Order.pago_apellido", array('type'=>'text', 'label'=>'Apellido'));
		echo $form->input("Order.pago_cedula", array('type'=>'text', 'label'=>'Cédula',"required"=>"required"));
	//	echo $form->input("Order.pago_direccion", array('type'=>'text', 'label'=>'Dirección'));
	//	echo $form->input("Order.pago_telefono", array('type'=>'text', 'label'=>'Teléfono'));
	//	echo $form->input("Order.pago_ciudad", array('type'=>'text', 'label'=>'Ciudad'));
	//	echo $form->input("Order.pago_estado", array('type'=>'text', 'label'=>'Estado'));
		echo $form->input("Order.tarjeta_numero", array('type'=>'text', 'label'=>'Número De La Tarjeta',"required"=>"required"));
		echo $form->input("Order.tarjeta_codigo", array('type'=>'text', 'label'=>'Código De Verificación',"required"=>"required"));
		
	?>
	</div>

	<?php echo $form->end("Confirmar"); ?>
<div style="clear:both"></div>
</div>
<script>
	$(function(){
var send=false;
	$("form#ordenForm").validator({lang: 'es','position':'bottom center'}).submit(function(e){
		var form = $(this);
	/*if (!e.isDefaultPrevented()) {
	
			// submit with AJAX

			$.getJSON(server+"users/checkEmail?" + form.serialize(), function(json) {
	
				// everything is ok. (server returned true)
				if (json === true)  {
					//form.load(form.attr("action"));
				send=true;	

				$("form#UserRegisterForm").unbind('submit').submit();
				return true;
	
				// server-side validation failed. use invalidate() to show errors
				} else {
					form.data("validator").invalidate(json);
				}
			});
	
			// prevent default form submission logic
			 e.preventDefault();
		}else{
			return true;
		}*/
	});
});
</script>