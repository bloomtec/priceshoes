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

</div>

<div class="favoritos">
	<h3>Favoritos</h3>
	<p>Es fácil asignar etiquetas a sus favoritos.</p>
</div>
<div class="cuenta">
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
</div>
<div style="clear:both"></div>

