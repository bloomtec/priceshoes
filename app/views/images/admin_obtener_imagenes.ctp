
	<?php $p=0;?>
	<ul>
	<?php foreach ($imagenes as $imagen):?>
	<li rel="<?php echo $imagen["Image"]["id"];?>" >
	<?php echo($html -> link($html -> image('uploads/200x200/' . $imagen['Image']['path'], array("width" => "166")), array('action' => 'edit', $imagen['Image']['id']), array('escape' => false)));?>
	<div class="borrar pointer"> Borrar </div>
	<?php echo $this->Html->link(__('Modificar', true), array('action' => 'edit', $imagen['Image']['id']),array('class' => 'modificar','target'=>'_blank')); ?>					    
	</li>
	<?php
	$p++;
	endforeach; ?>
    </ul>
    
    					
							 