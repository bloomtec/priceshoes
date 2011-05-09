<div id="info-wrapper">
<div class="registrar">
	<h2>Regístra tu correo</h2>
	<div id="mail">
			<?php echo $form->create("Mail",array("action"=>"mail","controller"=>"mail"));?>
	            <fieldset>
	              <?php echo $form->input("mail",array("label"=>""), array('div' => false));?>
	              <?php echo $form->submit(__('Enviar', true), array('div' => false));?>   
	            </fieldset>
	        <?php echo $form->end();?>
	</div>	
	<p>Al registrar mi dirección de correo electrónico, certifico que la información que proporciono es correcta y que soy mayor de edad.</p>
	<div class="sociales">
		<ul>
			<li>
				<?php echo $html->image('facebook2.png', array('alt' => 'facebook', 'url' => 'http://www.facebook.com'));?>
			</li>
			<li>
				<?php echo $html->image('twitter2.png', array('alt' => 'twitter', 'url' => 'http://www.twitter.com'));?>
			</li>
			<li>
				<?php echo $html->image('linkedin.png', array('alt' => 'linkedin', 'url' => 'http://www.linkedin.com/'));?>
			</li>
			<li>
				<h1>Síguenos!!</h1>
			</li>
		</ul>
	</div>
</div>

<div class="favoritos-virtual">
	<h3><?php 
					echo $html->link("Favoritos",
            			array(
							"controller"=>"users","action"=>"favoritos")
						);
				 ?></h3>
	<p>Es fácil asignar etiquetas a sus favoritos.</p>
</div>

<div class="opciones-virtual">
	<h3><?php 	echo $html->link("Mi Cuenta",
            			array(
							"controller"=>"users","action"=>"login")
						);
				 ?></h3>
		<ul>
			<li>
				<?php echo $html->link("Registro",array("controller"=>"users","action"=>"register"))?>
				
			</li>
			<li>
				<?php echo $html->link("Ver Carrito",array("controller"=>"carts","action"=>"view"))?>
			</li>
			
			<li>
				<?php echo $html->link("Ayuda",array("controller"=>"pages","action"=>"view","ayuda"))?>
			</li>
		</ul>	
</div>


<div class="opciones-virtual">
	<h3>Priceshoes On-line</h3>
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
			<?php echo $html->link("Envíos & Devoluciones",array("controller"=>"pages","action"=>"view","envios-devoluciones"))?>
		</li>
		<li>
			<?php echo $html->link("Compra Segura",array("controller"=>"pages","action"=>"view","compra-segura"))?>
		</li>
		<!--
		<li>
			<a href="#">Mapa del sitio</a>
		</li>
		-->
	</ul>
	
</div>
 <div class="tarjetas">
 <?php echo $html->image('tarjetas.png', array('alt' => 'tarjetas', 'url' => ''));?>
 </div>
<div style="clear:both"></div>
</div>

<div id="footer_links">
	<ul>
		<li>
			<a href="#">Acerca de</a>
		</li>
		<li>
			<a href="#">Nuestras Tiendas</a>
		</li>
		<li>
			<a href="#">Tendencias</a>
		</li>
		<li>
			<a href="#">Tienda Virtual</a>
		</li>
		<li>
			<a href="#">Franquincias</a>
		</li>
		<li>
			<a href="#">Contacto</a>
		</li>
		<li>
			<a href="#">Mapa del sitio</a>
		</li>
	</ul>
	<h4>© 2011 PriceShoes Online Store. Todos los derechos Reservados.</h4>
	<div style="clear:both"></div>
</div>
		

