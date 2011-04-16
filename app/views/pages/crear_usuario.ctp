<?php echo $this->Html->css('datepicker');?>
<div id="crear-usuario">
	<h1>CREA UNA CUENTA</h1>
	<h2>Nuevos Clientes PriceShoes</h2>
		<p>Compartiendo tus datos básicos con nosotros, no sólo te actualizaremos con lo último de <span>Price Shoes</span> sino que seras uno de los primero en enterarte de una gran variedad de ofertas y promociones, ademas al crear una cuenta en nuestra tienda, podrás moverse a través del proceso de pago más rápido, registrar tus direcciones para envíos, guardar, ver y comparar tus favoritos.</p>
		<?php echo $form->create("usuario",array("action"=>"crear","controller"=>"users"));?>
			<div class="forma-linea">
			
			<div class="email forma-crear">
				<label for="usuarioEmail">Dirección E-mail</label>
				<input id="usuarioEmail" type="email" required="required" minlength="9" name="data[usuario][email]">
			</div>
			
			<div class="email forma-crear">
				<label for="usuarioEmail-repetir">Escriba de nuevo tu dirección E-mail</label>
				<input id="usuarioEmail-repetir" type="email" required="required" minlength="9" data-equals="data[usuario][email]" name="data[usuario][email-repetir]">
			</div>
			
			<div style="clear:both"></div>
			</div>
			<div class="forma-linea">
			<?php echo $form->input("password",array('div' => 'password forma-crear',"label"=>"Contraseña",'required'=>'required'));?>
			<?php echo $form->input("password-repetir",array('type'=>'password','div' => 'password forma-crear',"label"=>"Escribe de nuevo tu contraseña",'required'=>'required'));?>
			<div style="clear:both"></div>
			</div>
			<div class="forma-linea">
			<?php echo $form->input("nombres",array('div' => 'nombres forma-crear',"label"=>"Escribe tu (s) Nombre (s)",'required'=>'required'));?>
			<?php echo $form->input("apellidos",array('div' => 'nombre forma-crear',"label"=>"Escribe tu (s) Apellido (s)",'required'=>'required'));?>
			<div style="clear:both"></div>
			</div>
			<div class="forma-linea">
				<div class="id forma-crear">
					<?php
		    		$options=array('cedula'=>'Cédula','extranjera'=>'C/Extranjería','pasaporte'=>'Pasaporte');
		    		$attributes=array('legend'=>'Identificación','required'=>'required');
		    		echo $this->Form->radio('tipoId',$options,$attributes);?>
		    		<div style="clear:both"></div>
		    		<?php echo $form->input("id",array("label"=>false,'required'=>'required'));?>
	    		</div>
	    		<?php echo $form->input('Sexo', array("div"=>'sexo forma-crear','required'=>'required','options' => array('F'=>'Femenino','M'=>'Masculino'))); ?>
	    		<div class="forma-crear calendario">
					<label>Fecha Nacimiento</label>
					<input class="date" type="date" min="1950-01-01" required="required" name="data[usuario][fecha]">
					<div style="clear:both"></div>
				</div>
	    		<div style="clear:both"></div>
    		</div>
    		<div class="forma-linea">
			<?php echo $form->input("pais",array('div' => 'residencia forma-crear',"label"=>"País de Residencia",'required'=>'required'));?>
			<?php echo $form->input("departamento",array('div' => 'residencia forma-crear',"label"=>"Departamento",'required'=>'required'));?>
			<div style="clear:both"></div>
			</div>
			<div class="forma-linea">
			<?php echo $form->input("ciudad",array('div' => 'forma-crear',"label"=>"Ciudad de Residencia",'required'=>'required'));?>
			<div style="clear:both"></div>
			</div>
			<div style="clear:both"></div>
			<div class="forma-linea">
			<?php echo $form->input("direccion",array('div' => 'direccion forma-crear',"label"=>"Dirección/Estado",'required'=>'required'));?>
			<?php echo $form->input("apto",array('div' => 'apto forma-crear',"label"=>"Apto/Interior/Oficina",'required'=>'required'));?>
			<div style="clear:both"></div>
			</div>
			<div class="forma-linea">
			<?php echo $form->input("telefono",array('div' => 'forma-crear',"label"=>"Teléfono Fijo"));?>
			<?php echo $form->input("movil",array('div' => 'forma-crear',"label"=>"Teléfono Móvil"));?>
			<div style="clear:both"></div>
			</div>
			<div style="clear:both"></div>
			<p>Al hacer click en el botón “Crear mi cuenta” a continuación, certifico que he leído y que acepto la <span>Condiciones de Servicio y Políticas de Privacidad de PriceShoes.com.co</span>, aceptando recibir comunicaciones electrónicas procedentes de <span>PriceShoes.com.co</span>, relacionadas con mi cuenta.</p>
			<?php echo $form->end(__('Crear mi Cuenta', true), array('div' => false));?> 
	<div style="clear:both;"></div>
</div>
