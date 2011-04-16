<?php echo $this->element("banner-promocionados");?>
<div id="left-content-virtual">
	 <?php echo $this->element("promociones");?>
	 <?php echo $this->element("mas-vendidos");?>
	 <div style="clear:both"></div>
</div>
<div id="right-content-virtual">
	<div class="descripcion-categoria">
		<h2><?php echo $product['Category']['nombre']?></h2>
		<p><?php echo ($product['Category']['descripcion'])?></p>
	</div>
	 <div id="producto-showcase">
	 	<?php echo $this->element("galeria");?>
	 	<div class="caracteristicas">
		 	<h1><?php echo $product['Product']['nombre'];?></h1>
		 	<?php echo $this->Html->para("precio","$".number_format($product['Product']['precio'], 0, ' ', '.')); ?>
			<ul class="botones-caracteristicas">
				<li>
				<?php echo $this->Html->link("Añadir a favoritos",array('controller' => 'categories', 'action' => 'view', $product['Category']['id']),array('class'=>'boton-favoritos')); ?>
			    <div style="clear:left"></div>
			    </li>
				<li>
				<?php echo $this->Html->link("Añadir al carrito",array('controller' => 'categories', 'action' => 'view', $product['Category']['id']),array('class'=>'boton-carrito')); ?>
			    <div style="clear:left"></div>
			    </li>
				<li>
				<?php echo $this->Html->link("Compartir en facebook",array('controller' => 'categories', 'action' => 'view', $product['Category']['id']),array('class'=>'boton-facebook')); ?>
			    <div style="clear:left"></div>
			    </li>
				<li>
				<?php echo $this->Html->link("Compartir en Twitter",array('controller' => 'categories', 'action' => 'view', $product['Category']['id']),array('class'=>'boton-twitter')); ?>
			    <div style="clear:left"></div>
			    </li>
			</ul>
			<div class="wsiwyg-caracteristicas">
			 <?php echo $product['Product']['descripcion']; ?>
			</div>
			<div class="colores">
				Colores:
				<ul class="cuadros-colores">
					<?php $inventarios=$this->requestAction("/products/getColores/".$product['Product']['id']); ?>
			  		<?php 
			  			if (!empty($inventarios)):
			  			$i=0;
			  			foreach($inventarios as $inventario): 
			  			if($i==0) $inventarioActual=$inventario;
						$i++;
			  		?>
			  		<li class="<?php if($i==1) echo 'selected'?>" rel="<?php echo $product['Product']['id']."-".$inventario['Color']['id'];?>" style="background-color:<?php echo $inventario['Color']['codigo']?>"></li>
			  		<?php endforeach;
					      endif;
			  		?>
			  			
				</ul>
				<div style="clear:both"></div>
			</div>
			<div class="tallas">
				Tallas:
				<ul class="cuadros-tallas">
					<?php $inventarios=$this->requestAction("/products/getColores/".$product['Product']['id']); ?>
			  		<?php 
			  			$i=0;
			  			if (!empty($inventarios)): 
						$i++;
			  		?>
			  		<?php foreach($inventarioActual["Talla"] as $talla): ?>
			  		<li rel="<?php echo $talla['id'];?>" class="<?php if($i==1) echo "selected"?>"> <?php echo $talla["nombre"] ?></li>
			  		<?php endforeach;
						endif;
			  		?>	
				</ul>
				<div style="clear:both"></div>
			</div>
		</div>
	 </div>	
</div>


    


