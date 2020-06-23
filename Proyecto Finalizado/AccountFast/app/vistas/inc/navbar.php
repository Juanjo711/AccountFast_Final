<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<button type="button" id="sidebarCollapse" class="btn btn-secondary">
		<i class="fas fa-align-left" style="font-size: 30px;"></i>
	</button>

	<div class="dropdown ml-auto">
		<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<?php echo $this->sesion->get("email"); ?>
		</button>
		<div class="dropdown-menu dropdown-menu-right dropdown-secondary" aria-labelledby="dropdownMenu2">
			<a class="dropdown-item" href="perfil"><i class="fas fa-user-circle"></i> Perfil</a>
			<div class="dropdown-divider"></div>
			<a class="dropdown-item" href="login/cerrarSesion"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
		</div>
	</div>
</nav>