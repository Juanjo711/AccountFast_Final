<div>
	<nav id="sidebar" class="bg-dark">
		<div class="sidebar-header">
			<i class="fas fa-user-circle ml-4 text-light" style="font-size: 150px;"></i><hr>
			<h3 class="text-white text-center"><?php echo $this->sesion->get('empresa'); ?></h3>
		</div>
		<ul class="components list-unstyled">
			<li>
				<a href="<?php echo RUTA_URL;?>/inicio"><i class="fas fa-chart-line" style="font-size: 25px;"></i> Inicio</a>
			</li>
			<li>
				<a href="<?php echo RUTA_URL;?>/factura"><i class="fas fa-briefcase" style="font-size: 25px;"></i> Facturación</a>
			</li>
			<li>
				<a href="<?php echo RUTA_URL;?>/gastos"><i class="fas fa-comment-dollar" style="font-size: 25px;"></i> Gastos</a>
			</li>
			<li>
				<a href="<?php echo RUTA_URL;?>/clientes"><i class="fas fa-user" style="font-size: 25px;"></i> Clientes</a>
			</li>
			<li>
				<a href="<?php echo RUTA_URL;?>/proveedor"><i class="fas fa-users" style="font-size: 25px;"></i>  Proveedores</a>
			</li>
			<li>
				<a href="<?php echo RUTA_URL;?>/empleado"><i class="fas fa-address-book" style="font-size: 25px;"></i> Nómina</a>
			</li>
			<li>
				<a href="<?php echo RUTA_URL;?>/inventario"><i class="fas fa-warehouse" style="font-size:25px;"></i> Inventario</a>
			</li>
	    </ul>
	</nav>
</div>