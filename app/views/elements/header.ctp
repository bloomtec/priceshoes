<div id="header">
	<h1><?php echo $this->Html->link("Priceshoes",array("controller"=>"pages","action"=>"home")) ?></h1>
		<div id="buscar">
			<?php echo $form->create("Product",array("action"=>"search","controller"=>"products"));?>
	            <fieldset>
	              <?php echo $form->input("search",array("label"=>""), array('div' => false));?>
	              <?php echo $form->submit(__('Buscar', true), array('div' => false));?>   
	            </fieldset>
	        <?php echo $form->end();?>
	        <div style="clear:both;"></div>
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
            		if(!$session->read("Auth.User.id")){
            			echo $html->link("Registro",array("controller"=>"users","action"=>"register"));
					}else{
						 echo $html->link("Salir",array("controller"=>"users","action"=>"logout"));
					}
					
				?>
		        </li>
			</ul>
		</div>
		<div id="main-nav">
	          <ul>
	          	<li>
	              <?php echo $html->link("Acerca de",array("controller"=>"pages","action"=>"view","acerca-de"))?>
	            </li>
	            <li>
	               <?php echo $html->link("Nuestras Tiendas",array("controller"=>"pages","action"=>"view","nuestras-tiendas"))?>
	            </li>
	            <li>
	               <?php echo $html->link("Tendencias",array("controller"=>"pages","action"=>"view","tendencias"))?>
	            </li>
	            <li>
	               <?php echo $html->link("Tienda Virtual","/tienda-virtual")?>
	            </li>
	           	<li>
				<?php echo $html->link("Franquicias",array("controller"=>"pages","action"=>"view","franquicias"))?>
				</li>
				<li>
				<?php echo $html->link("Contacto",array("controller"=>"pages","action"=>"contacto"))?>
				</li>
	          </ul>
	    </div>
	<div style="clear:both"></div>    
</div>