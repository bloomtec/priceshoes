 <?php if (!empty($products)):?>
 <ul class="productos">
	 <?php $i=0;?>
	 
	 <?php foreach ($products as $product):?>
	 <li <?php if($i%3==1) echo "class='centro'"?>> 
		 <?php echo $this->Html->image("uploads/200x200/".$product["Product"]['imagen'])?>
		 <?php echo $this->Html->link($product["Product"]["nombre"],array("controller"=>"products","action"=>"view",$product["Product"]['id'])) ?>
	     <?php echo $this->Html->para("precio","$".number_format($product["Product"]['precio'], 0, ' ', '.')) ?>
	 </li>
	 <?php 
	 $i++;
	 endforeach; ?>
 </ul>
 <div style="clear:both"></div>
 <div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('anterior', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('siguiente', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
<?php endif; ?>