<div class="products image-form">
	<?php echo $this->Form->create('Product');?>
		<fieldset>
		<div class="left">
	<?php
		echo $this->Form->input('category_id');
		echo $this->Form->input('nombre');
		echo $this->Form->input('referencia');
		echo $this->Form->input('precio');
		echo $this->Form->hidden('tarifa_iva',array("value"=>"1.16"));
		
		
	
	?>
	</div>
	<div class="right">
		<?php
		//echo $this->Form->input('order');
		echo $this->Form->input('descripcion');
		echo $this->Form->hidden('imagen',array("id"=>"single-field"));
		echo $this->Form->input('activo');
		echo $this->Form->input('promocionar');
		echo $this->Form->input('novedad');
		echo $this->Form->input('mas_vendido');
		?>
	</div>
		</fieldset>
	<?php echo $this->Form->end(__('Guardar', true));?>
	<div class="images">
			<h2>Imagen</h2>
			<div class="preview">
				
			</div>
			<div id="single-upload" controller="colecciones"> </div>
			
	</div>
</div>
