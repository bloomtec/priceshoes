<div id="sondeo">
		<div class="titulo">
			<h1>Sondeo</h1>
		</div>
	<?php $sondeo=$this->requestAction("/surveys/sondeo");?>
	<div class="wrapper">
		<?php if($sondeo):?>
		<h3><?php echo $sondeo["Survey"]["titulo"]; ?></h3>
		<ul>
		<?php foreach($sondeo["SurveyOption"] as $option):?>
			<li><span rel="<?php echo $option["id"];?>"></span> <?php echo $option["name"]?></li>
		<?php endforeach;?>
		</ul>
		<div class="votar">votar</div>
		<?php endif;?>
	</div>
	<div class="mensaje">
		Muchas gracias por participar en la encuesta
	</div>
</div>

