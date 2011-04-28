<?php echo $this->Html->css('datepicker');?>
<div id="crear-usuario">

	<h1>Modifica tus datos</h1>
	<?php echo $form->create("User",array("action"=>"edit","controller"=>"users"));?>
			<?php echo $this->Form->input('id'); ?>
		<?php echo $this->Form->input('UserField.id'); ?>
			
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
			<?php echo $form->end(__('Modificar', true), array('div' => false));?> 
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
