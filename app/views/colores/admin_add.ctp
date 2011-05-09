<script>
	$(function(){
		$('#ColorCodigo').ColorPicker({
				onSubmit:function(hsb, hex, rgb, el){
					$(el).val("#"+	hex);
					$(el).ColorPickerHide();
				},
				onBeforeShow: function () {
					$(this).ColorPickerSetColor(this.value);
				}
			}).bind('keyup', function(){
					$(this).ColorPickerSetColor(this.value);
				});
	});
</script>
<div class="colores form">
<?php echo $this->Form->create('Color');?>
	<fieldset>
		<legend><?php __('Nuevo Color'); ?></legend>
	<?php
		echo $this->Form->input('nombre');
		echo $this->Form->input('codigo');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Guardar', true));?>
</div>
