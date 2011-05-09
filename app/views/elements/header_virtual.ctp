<div id="header">
	<h1><?php echo $this->Html->link("Priceshoes",array("controller"=>"pages","action"=>"home")) ?></h1>
		<div id="buscar">
			<?php echo $form->create("Product",array("action"=>"search","controller"=>"products"));?>
	            <fieldset>
	              <?php echo $form->input("search",array("label"=>""), array('div' => false));?>
	              <?php echo $form->submit(__('Buscar', true), array('div' => false));?>   
	            </fieldset>
	        <?php echo $form->end();?>
		</div>	
		
		<div class="opciones">
			<ul>
				<li>
				<?php 
					echo $html->link("Mi Carrito",
            			array(
							"controller"=>"carts","action"=>"view")
						);
				 ?>
				</li>

		        
		        <li>
				<?php 
					echo $html->link("Mi Cuenta",
            			array(
							"controller"=>"users","action"=>"login")
						);
				 ?>
				</li>
				
				<li>
				<?php 
					echo $html->link("Registro",
            			array(
							"controller"=>"users","action"=>"register")
						);
				 ?>
				</li>
			</ul>
		</div>
		<div id="main-nav">
	          <ul>
	          	<li>
				<?php echo $html->link("Tienda Virtual","/tienda-virtual")?>
				</li>
	          	<?php 
				$categorias=$this->requestAction("/categories/promocionadas");
				foreach($categorias as $categoria):
				?>
				<li>
	              <?php echo $html->link($categoria["Category"]["nombre"],array("controller"=>"categories","action"=>"view",$categoria["Category"]["id"]))?>
	            </li>
				<?php
				endforeach;
				?>
				
	          </ul>
	    </div>
	<div style="clear:both"></div>    
</div>