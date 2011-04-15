<?php echo $this->element("banner-promocionados");?>
<div id="left-content-virtual">
	 <?php echo $this->element("promociones");?>
	 <?php echo $this->element("mas-vendidos");?>
	 <?php echo $this->element("sondeo");?>
</div>
<div id="right-content-virtual">
	<div class="descripcion-categoria">
		<h2><?php echo ($category["Category"]["nombre"])?></h2>
		<p><?php echo ($category["Category"]["descripcion"])?></p>
		
	</div>
	<?php echo $this->element("listado-producto");?>
</div>


