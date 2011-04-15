
<div class="galleries">
	<div id="menu_principal">
			<ul class="galeria">
				<?php
					$i = 0;
					foreach ($galleries as $galeria):
						$class = null;
						if ($i++ % 2 == 0) {
							$class = ' class="altrow"';
							if($i==1) $class = ' class="altrow selected"';
						}
					?>
					<li<?php echo $class;?> id='<?php echo $galeria['Gallery']['id'] ?>'>
						<div class="nombre">
							<a><?php echo $galeria['Gallery']['nombre']; ?></a>
						</div>
						<div class="acciones">
							<?php echo $this->Html->link(__('Modificar', true), array('action' => 'edit', $galeria['Gallery']['id'])); ?>
							<div class="borrar"></div>
						</div>
						
					</li>
				<?php endforeach; ?>
			</ul>
	</div>
	<div id="contenido">
			<div id="multiple-upload">
		    </div>
			<div class="descripcion">
			</div>
			<div style="clear:both"></div>
			<div class="foticos">
				<ul>
					
				</ul>
			</div>
		</div>
	</div>

	<script>
	$(function(){
		$(".borrar").live("click",function(){
		    var imagen=$(this).parent();
			var imagenId=$(this).parent().attr("rel");
			$.post("/priceshoes/images/ajax_delete",{"id":imagenId},function(data){
			 	if(data){
			 		imagen.hide("slow");
			 	}else{
			 	 alert("No se pudo eliminar el producto");
			 	}
			});
		});
	});
	</script>
