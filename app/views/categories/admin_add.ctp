<div class="categories image-form">
<?php echo $this->Form->create('Category');?>
	<fieldset>
		<legend><?php __('Nueva Categoría'); ?></legend>
	<?php
		
		echo $this->Form->input('nombre');
		echo $this->Form->input('descripcion');
		echo $this->Form->input('imagen',array("id"=>"single-field", "type"=>"hidden"));
	?>

	</fieldset>
<?php echo $this->Form->end(__('Guardar', true));?>
<div class="images">
		<h2>Imagen</h2>
		<div class="preview">
			
		</div>
		<div id="single-upload" controller="colecciones"> </div>
		
</div>
</div>
