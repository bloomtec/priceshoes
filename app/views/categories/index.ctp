<div class="promocionados">
	<ul>
		<?php $i=0; ?>
		<?php $categories = $this->requestAction('/categories/promocionadas'); ?>
		<?php foreach($categories as $category):?>
			<?php if($i<5){?>
			<li> 
			<?php echo $this->Html->image("uploads/".$category["Category"]["imagen"])?>
			<?php echo $this->Html->link($category["Category"]["nombre"],array("controller"=>"categories","action"=>"view",$category["Category"]["id"])) ?>
			</li>
			<?php }$i++;?>
		<?php endforeach;?>
	</ul>
	<div style="clear:both"></div>
</div>
<?php echo $this->element("banner-promocionados");?>
