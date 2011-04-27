<div id="header">
	<h1><?php echo $this->Html->link("Priceshoes",array("controller"=>"categories","action"=>"index")) ?></h1>
		<div id="buscar">
			<?php echo $form->create("Search",array("action"=>"search","controller"=>"searchs"));?>
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
	               <a href="#">Acerca de</a>
	            </li>
	            <li>
	               <a href="#">Nuestras tiendas</a>
	            </li>
	            <li>
	               <a href="#">Tendencias</a>
	            </li>
	            <li>
	               <a href="#">Tienda virtual</a>
	            </li>
	            <li>
	               <a href="#">Franquincias</a>
	            </li>
	            <li>
	               <?php 
            	echo $html->link("Contacto",
            			array(
							"controller"=>"pages","action"=>"contacto")
						);
				?>
	            </li>
	          </ul>
	    </div>
	<div style="clear:both"></div>    
</div>