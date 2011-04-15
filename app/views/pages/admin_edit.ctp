<div class="pages form">
<?php echo $this->Form->create('Page');?>
	<fieldset>
 		<legend><?php __('Admin Edit Page'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title',array("div"=>"float"));
		echo $this->Form->input('slug',array("div"=>"float"));
		echo $this->Form->input('description');
		
		//echo $this->Form->input('order');
		echo $this->Form->input('content');
		
	?>
	</fieldset>
<?php echo $this->Form->end();?>
	<div class="botones">
		<?php echo $form->button("",array("class"=>"atras","url"=>$html->url(array("action"=>"index"))));?>
		<?php //echo $form->button("",array("class"=>"limpiar"));?>
		<?php echo $form->button("",array("class"=>"guardar"));?>
	</div>
</div>

<script type="text/javascript">
					CKEDITOR.replace( 'data[Page][content]' );
	
</script>