<div id="left-content">
	 <?php echo $this->element("virtual");?>
	 <?php echo $this->element("social");?>
	
</div>

<div id="right-content" class="cambiar-contrasena">
	<div id="UserRegisterForm" class="cambiar form">
	<?php echo $this->Form->create('User');?>
		<fieldset>
			<p>
			Por favor ingrese su actual contraseña y su contraseña anterior
			</p>
		<?php
			echo $this->Form->input('actualPassword', array('label'=>'Contrasena Actual',"required"=>"required","div"=>"input required","type"=>"password"));
			echo $this->Form->input('password', array('label'=>'Contraseña Nueva',"required"=>"required","id"=>"Contraseñas"));  
	echo $this->Form->input('password2', array('label'=>'Confirmar contraseña',"div"=>"required input","required"=>"required","data-equals"=>"Contraseñas","type"=>"password","data-message"=>"Por favor verifique este campo"));    
		?>
		</fieldset>
		<?php echo $this->Form->end(__('Enviar', true));?>
		<div style="clear:both;"></div>
		<div class="mensaje"><?php if (isset($mensaje)) echo $mensaje ?></div>
	</div>
</div>
<script type="text/javascript">
$(function(){
	$("form").validator({lang: 'es'}).submit(function(e){
		var form = $(this);
		if (!e.isDefaultPrevented()) {
	
			// submit with AJAX
			$.getJSON(server+"users/checkPassword?" + form.serialize(), function(json) {
	
				// everything is ok. (server returned true)
				if (json === true)  {
					//form.load(form.attr("action"));
					
				location.href=server+"users/view/<?php echo $session->read("Auth.User.id");?>";
	
				// server-side validation failed. use invalidate() to show errors
				} else {
					form.data("validator").invalidate(json);
				}
			});
	
			// prevent default form submission logic
			e.preventDefault();
		}
	});
});
</script>