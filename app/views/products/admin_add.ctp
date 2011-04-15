<div class="products image-form">
	<?php echo $this->Form->create('Product');?>
		<fieldset>
			<legend><?php __('Nuevo Producto'); ?></legend>
		<?php
			echo $this->Form->input('category_id',array("label"=>"Categoría"));
			echo $this->Form->input('nombre');
			echo $this->Form->input('precio');
			echo $this->Form->input('base_iva');
			echo $this->Form->input('valor_iva');
			echo $this->Form->input('descripcion');
			//echo $this->Form->input('order');
			echo $this->Form->input('activo');
			echo $this->Form->input('promocionar');
			echo $this->Form->input('novedad');
			echo $this->Form->input("imagen",array("id"=>"single-field", "type"=>"hidden"));
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
