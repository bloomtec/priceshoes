<?php echo $this->element("banner-promocionados");?>
<div id="left-content-virtual">
	 <?php echo $this->element("promociones");?>
	 <?php echo $this->element("cesta");?>
	 <div style="clear:both"></div>
</div>
<div id="right-content-virtual">
	<div class="descripcion-categoria">
		<h2><?php echo $html->link($product['Category']['nombre'],array("controller"=>"categories","action"=>"view",$product['Category']['id']))?></h2>
		<p><?php echo ($product['Category']['descripcion'])?></p>
	</div>
	 <div id="producto-showcase">
	 	<?php echo $this->element("galeria");?>
	 	<div class="caracteristicas">
		 	<h1><?php echo $product['Product']['nombre'];?></h1>
		 	<?php echo $this->Html->para("precio","$".number_format($product['Product']['precio'], 0, ' ', '.')); ?>
			<ul class="botones-caracteristicas">
				<?php //if($session->read("Auth.User.id")):?>
				<li>
					<?php echo $this->Html->link("Añadir a favoritos",array('controller' => 'favorites', 'action' => 'addToFavorite', $product['Category']['id']),array('class'=>'boton-favoritos')); ?>
			   		<div class="add-confirm">
						producto añadido a favoritos
					</div>
				<div style="clear:left"></div>
			    <?php //endif;?>
				</li>
				<li>
				<?php echo $this->Html->link("Añadir al carrito",array('controller' => 'categories', 'action' => 'view', $product['Category']['id']),array('class'=>'boton-carrito')); ?>
			    	<div class="add-cart">
						producto añadido al carrito
					</div>
				<div style="clear:left"></div>
			    </li>
				<li>
				<a class='boton-facebook' href="javascript: void(0);" onclick="window.open('http://www.facebook.com/sharer.php?u=<?php echo urlencode("http://".$_SERVER['SERVER_NAME'].$html->url("/products/view/".$product["Product"]["id"]));?>','ventanacompartir', 'toolbar=0, status=0, width=650, height=450');">
					Compartir en facebook
				</a> 
				
			    <div style="clear:left"></div>
			    </li>
				<li>
					<script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>
						 <!-- <a href="http://twitter.com/share?url=http%3A%2F%2Fdev.twitter.com&amp;via=your_screen_name" class="boton-twitter">Compartir en twitter</a>--> 
						<a  onclick="window.open('http://twitter.com/share?url=<?php echo rawurlencode("http://".$_SERVER["SERVER_NAME"]."/products/view/".$html->url("/products/view/".$product["Product"]["id"]));?>','ventanacompartir', 'toolbar=0, status=0, width=650, height=450');"class="boton-twitter" target="_blank">Compartir en twitter</a>
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


    


