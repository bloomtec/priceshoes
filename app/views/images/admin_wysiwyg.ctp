<div id="fileBrowser">
	<div class="folders">
	 <?php // debug($path[0]);?>
	</div>
	<ul class="container">
	 	<?php foreach($folder[1] as $fileName):?>
	 		<li rel=<?php echo "/priceshoes".$folderPath."/".$fileName?>> 
	 			<?php echo $html->image($folderPath."/".$fileName);?>
	 		</li>
	 	<?php endforeach;?>
	</ul>
</div>