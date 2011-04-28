<div id="left-content">
	 <?php echo $this->element("virtual");?>
	 <?php echo $this->element("social");?>
	
</div>

<div id="right-content" class="mi-cuenta">
<?php $userField["UserField"]=$user["UserField"]?>
	<ul class="userMenu">
		<li><?php echo $html->link("Modificar Datos",array("action"=>"edit")) ?></li>
	<li><?php echo $html->link("Cambiar contraseña",array("action"=>"cambiarContrasena")) ?></li>
	</ul>
	<div class="user-info">
		<dl><?php $i = 0; $class = ' class="altrow"';?>
		
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Email'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($user['User']['email'], array('controller' => 'users', 'action' => 'view', $user['User']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nombres'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $userField['UserField']['nombres']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Apellidos'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $userField['UserField']['apellidos']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Tipo Identificacion'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $userField['UserField']['tipo_identificacion']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Identificacion'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $userField['UserField']['identificacion']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Sexo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $userField['UserField']['sexo']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Fecha Nacimiento'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $userField['UserField']['fecha_nacimiento']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Pais'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $userField['UserField']['pais']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Departamento Residencia'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $userField['UserField']['departamento_residencia']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ciudad Residencia'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $userField['UserField']['ciudad_residencia']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Direccion'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $userField['UserField']['direccion']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Direccion2'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $userField['UserField']['direccion2']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Telefono Fijo'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $userField['UserField']['telefono_fijo']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Telefono Movil'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $userField['UserField']['telefono_movil']; ?>
			&nbsp;
		</dd>
	</dl>
	</div>
	<div class="favoritos">
	<h2><?php __('Favoritos');?></h2>
		<table cellpadding="0" cellspacing="0">
		<tr>
	
				<th>Producto</th>
				<th></th>
				<th>Acciones</th>
	
			
		</tr>
		<?php
		$i = 0;
		foreach ($favorites as $favorite):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			
			<td>
				<?php echo $this->Html->link($favorite['Product']['nombre'], array('controller' => 'products', 'action' => 'view', $favorite['Product']['id'])); ?>
			</td>
			<td>
				<?php echo $this->Html->image("uploads/200x200/".$favorite['Product']['imagen'],array("width"=>"100")); ?>
			</td>
			<td>
			</td>
			
		</tr>
	<?php endforeach; ?>
		</table>
	</div>

</div>