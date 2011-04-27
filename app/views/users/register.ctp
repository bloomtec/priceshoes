<?php echo $this->Html->css('datepicker');?>
<div id="crear-usuario">

	<h1>CREA UNA CUENTA</h1>
	<h2>Nuevos Clientes PriceShoes</h2>
		<p>Compartiendo tus datos básicos con nosotros, no sólo te actualizaremos con lo último de <span>Price Shoes</span> sino que seras uno de los primero en enterarte de una gran variedad de ofertas y promociones, ademas al crear una cuenta en nuestra tienda, podrás moverse a través del proceso de pago más rápido, registrar tus direcciones para envíos, guardar, ver y comparar tus favoritos.</p>
		<?php echo $form->create("User",array("action"=>"register","controller"=>"users"));?>
			<div class="forma-linea">
			
			<div class="email forma-crear">
				<label for="UserFieldEmail">Dirección E-mail<br>(Este será tu usuario en <span>PriceShoes.com.co</span>)</label>
				<input id="Correos eléctronicos" type="email" required="required" minlength="9" name="data[User][email]" id="Correos eléctronicos">
			</div>
			
			<div class="email forma-crear">
				<label for="UserFieldEmail-repetir"><br>Escriba de nuevo tu dirección E-mail</label>
				<input id="UserFieldEmail-repetir" type="email" required="required" minlength="9" name="data[User][email-repetir]" data-equals="Correos eléctronicos" data-message="Por favor verifique este campo">
			</div>
			
			<div style="clear:both"></div>
			</div>
			<div class="forma-linea">
			<?php echo $form->input("password",array('type'=>'password','div' => 'password forma-crear',"label"=>"Contraseña",'required'=>'required'));?>
			<?php echo $form->input("password-repetir",array('type'=>'password','div' => 'password forma-crear',"label"=>"Escribe de nuevo tu contraseña",'required'=>'required','data-equals'=>"UserPassword","data-message"=>"Por favor verifique este campo"));?>
			<div style="clear:both"></div>
			</div>
			<div class="forma-linea">
			<?php echo $form->input("UserField.nombres",array('div' => 'nombres forma-crear',"label"=>"Escribe tu (s) Nombre (s)",'required'=>'required'));?>
			<?php echo $form->input("UserField.apellidos",array('div' => 'nombre forma-crear',"label"=>"Escribe tu (s) Apellido (s)",'required'=>'required'));?>
			<div style="clear:both"></div>
			</div>
			<div class="forma-linea">
				<div class="id forma-crear">
					<?php
		    		$options=array('cedula'=>'Cédula','extranjera'=>'C/Extranjería','pasaporte'=>'Pasaporte');
		    		$attributes=array('legend'=>'Identificación','default' => 'cedula');
		    		echo $this->Form->radio('UserField.tipo_identificacion',$options,$attributes);?>
		    		<div style="clear:both"></div>
		    		<?php echo $form->input("UserField.identificacion",array("label"=>false,'required'=>'required'));?>
	    		</div>
	    		<?php echo $form->input('UserField.sexo', array("div"=>'sexo forma-crear','label'=>'Sexo','required'=>'required','options' => array('F'=>'Femenino','M'=>'Masculino'))); ?>
	    		<div class="forma-crear calendario">
					<label>Fecha Nacimiento</label>
					<input class="date" type="date" min="1950-01-01" required="required" name="data[UserField][fecha_nacimiento]">
					<div style="clear:both"></div>
				</div>
	    		<div style="clear:both"></div>
    		</div>
    		<div class="forma-linea">
			<?php echo $form->input("UserField.pais",array('div' => 'residencia forma-crear',"label"=>"País de Residencia",'required'=>'required'));?>
			<?php echo $form->input("UserField.departamento_residencia",array('div' => 'residencia forma-crear',"label"=>"Departamento",'required'=>'required'));?>
			<div style="clear:both"></div>
			</div>
			<div class="forma-linea">
			<?php echo $form->input("UserField.ciudad_residencia",array('div' => 'forma-crear',"label"=>"Ciudad de Residencia",'required'=>'required'));?>
			<div style="clear:both"></div>
			</div>
			<div style="clear:both"></div>
			<div class="forma-linea">
			<?php echo $form->input("UserField.direccion",array('div' => 'direccion forma-crear',"label"=>"Dirección/Estado",'required'=>'required'));?>
			<?php echo $form->input("UserField.direccion2",array('div' => 'apto forma-crear',"label"=>"Apto/Interior/Oficina"));?>
			<div style="clear:both"></div>
			</div>
			<div class="forma-linea">
			<?php echo $form->input("UserField.telefono_fijo",array('div' => 'forma-crear',"label"=>"Teléfono Fijo"));?>
			<?php echo $form->input("UserField.telefono_movil",array('div' => 'forma-crear',"label"=>"Teléfono Móvil"));?>
			<div style="clear:both"></div>
			</div>
			<div style="clear:both"></div>
			<p>Al hacer click en el botón “Crear mi cuenta” a continuación, certifico que he leído y que acepto la <span>Condiciones de Servicio y Políticas de Privacidad de PriceShoes.com.co</span>, aceptando recibir comunicaciones electrónicas procedentes de <span>PriceShoes.com.co</span>, relacionadas con mi cuenta.</p>
			<?php echo $form->end(__('Crear mi Cuenta', true), array('div' => false));?> 
	<div style="clear:both;"></div>
</div>
<script type="text/javascript">
$(function(){
var send=false;
	$("form#UserRegisterForm").validator({lang: 'es','position':'bottom center'}).submit(function(e){
		var form = $(this);
	if (!e.isDefaultPrevented()) {
	
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
		}
	});
});
</script>
