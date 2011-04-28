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
<div style="clear:both"></div>
</div>


<div id="footer_links">
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
		<!--
		<li>
			<a href="#">Mapa del sitio</a>
		</li>
		-->
	</ul>
	<h4>© 2011 PriceShoes Online Store. Todos los derechos Reservados.</h4>
</div>
<div style="clear:both"></div>

