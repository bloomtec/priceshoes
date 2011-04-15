<div class="disponibilidad form">
	<!--
	 	* Matriz para ver disponibilidad de un
	 	* producto mostrando Colores vs Tallas
	 	* @$tallas [id][talla]
	 	* @$colores [id][color]
	 	* @$inventarios [id_color][id_talla][disponibilidad]
 	-->

	<?php echo $this -> Form -> create('Inventory'); ?>
	<fieldset>
		
		<?php echo $this -> Form -> input("Product.id", array('value' => $this -> params['pass']['0'])); ?>
		
		<legend>Disponibilidad De Inventario</legend>

		<!-- Crear la tabla -->	
		<table>
	
			<!-- Crear las cabeceras -->
			<tr>
				<th>Colores\Tallas</th>
				<?php
					foreach($tallas as $unaTalla) {
						echo '<th>' . $unaTalla . '</th>';
					}
				?>
			</tr>
	
			<!-- Llenar la tabla -->
			<?php 
				$posColores = 1;
				foreach($colores as $idColor=>$unColor): 
			?>
			<tr idColor="$idColor">
				<td> <?php echo $unColor ?> </td>
				<?php 
					$posTallas = 1;
					foreach($tallas as $idTalla=>$unaTalla):
						echo '<td colorID=' . "$idColor" . ' tallaID=' . "$idTalla" . '>';
						if(!isset($inventarios[$posColores][$posTallas]) || $inventarios[$posColores][$posTallas] == 0) {
							echo $this -> Form -> input("Inventory.$idColor."."$idTalla", array('value' => 0,"label"=>false));
						} else {
							echo $this -> Form -> input("Inventory.$idColor."."$idTalla", array('value' => $inventarios[$idColor][$idTalla],"label"=>false));
						}
						echo '</td>';
						$posTallas++;
				?>
				<?php endforeach; ?>
			</tr>
			<?php $posColores++; endforeach; ?>
		</table>
	</fieldset>
	<?php echo $this -> Form -> end(__('Enviar', true)); ?>
</div>
