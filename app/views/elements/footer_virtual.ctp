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
	<h3>Favoritos</h3>
	<p>Es fácil asignar etiquetas a sus favoritos.</p>
</div>

<div class="opciones-virtual">
	<h3>Mi Cuenta</h3>
		<ul>
			<li>
				<a href="#">Registro</a>
			</li>
			<li>
				<a href="#">Ver Carrito</a>
			</li>
			<li>
				<a href="#">Favoritos</a>
			</li>
			<li>
				<a href="#">Ayuda</a>
			</li>
		</ul>	
</div>


<div class="opciones-virtual">
	<h3>Priceshoes On-line</h3>
		<ul>
			<li>
				<a href="#">Acerca de PriceShoes</a>
			</li>
			<li>
				<a href="#">Nuestras Tiendas</a>
			</li>
			<li>
				<a href="#">Tienda Virtual</a>
			</li>
			<li>
				<a href="#">Franquicias</a>
			</li>
			<li>
				<a href="#">Contacto</a>
			</li>
			<li>
				<a href="#">Envios y Devoluciones</a>
			</li>
			<li>
				<a href="#">Compra Segura</a>
			</li>
			<li>
				<a href="#">Mapa del Sitio</a>
			</li>
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
		

