<div id="header-virtual">
	<h1><?php echo $this->Html->link("Priceshoes",array("controller"=>"categories","action"=>"index")) ?></h1>
		<div id="buscar">
			<?php echo $form->create("Product",array("action"=>"search","controller"=>"products"));?>
	            <fieldset>
	              <?php echo $form->input("query",array("label"=>""), array('div' => false));?>
	              <?php echo $form->submit(__('Buscar', true), array('div' => false));?>   
	            </fieldset>
	        <?php echo $form->end();?>
		</div>	
		
		<div class="opciones">
			<ul>
				<li>
					<a href="#">Mi cuenta</a>
					
				</li>
				<li>
					<a href="#">Mi carrito</a>
					<?php echo $this->Html->image('carrito.png')?>
				</li>
				<li>
					<a href="#">Mis Favoritos</a>
					<?php echo $this->Html->image('favoritos.png')?>
				</li>
		        <li>
		            <a href="#">Registro</a>
		        </li>
			</ul>
		</div>
		<div id="main-nav">
	          <ul>
	          	<?php $categories = $this->requestAction('/categories/menuCategories'); ?>
	          	<?php foreach($categories as $category):?> 
	          	<li> <?php echo $this->Html->link($category["Category"]["nombre"],array("controller"=>"categories","action"=>"view",$category["Category"]["id"])) ?></li>
	          	<?php endforeach;?>
	          </ul>
	    </div>
	 <div style="clear:both"></div>
</div>
