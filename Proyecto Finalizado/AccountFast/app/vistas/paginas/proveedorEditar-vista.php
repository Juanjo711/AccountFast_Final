<?php require RUTA_APP . '/vistas/inc/header.php'; ?>
<!-- SIDEBAR -->
<?php require RUTA_APP . '/vistas/inc/sidebar.php'; ?>


<div id="content" class="container-fluid">
    <!-- NAVBAR -->
    <?php require RUTA_APP . '/vistas/inc/navbar.php'; ?>

    <!-- CONTENIDO -->

    <div class="container mt-3">
        <div class="row">
            <div class="col-md-11 col-9">
                <header class="text-center text-secondary">
                    <i class="fas fa-users" style="font-size: 45px;"></i>
                    <h2>Actualizar Proveedor</h2>
                </header>
            </div>
            <div class="col-md-1 col-3">
                <a href="<?php echo RUTA_URL; ?>/proveedor">
                    <i class="fas fa-sign-out-alt display-4 text-dark"></i>
                </a>
            </div>
        </div>
        <form class="col-md-6 mx-auto mt-5" action="<?php echo RUTA_URL; ?>/proveedor/actualizar" method="POST">
			<div class="form-group">
				<label>Identificación</label>
				<input type="text" name="id_proveedor" class="form-control" value="<?php echo $datos['id']; ?>" required readonly>
			</div>
			<div class="form-group">
				<div class="form-group">
					<label>Nombre del proveedor</label>
					<input type="text" name="nombrep" class="form-control" value="<?php echo $datos['nombre']; ?>">
				</div>
				<div class="form-group">
					<label>Tipo de Proveedor (<?php echo $datos['tipo']; ?>)</label>
					<select class="form-control" name="tipo">
						<option value="<?php echo $datos['tipo']; ?>"></option>
						<option>Proveedor de productos</option>
						<option>Proveedor de servicios</option>
						<option>Proveedor de recursos</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label>Teléfono</label>
				<input type="number" name="tel" class="form-control" value="<?php echo $datos['telefono']; ?>">
			</div>
			<div class="form-group">
				<label>Correo Electrónico</label>
				<input type="email" name="email" class="form-control" value="<?php echo $datos['correo']; ?>">
			</div>
			<div class="form-group">
				<label>Descripción</label>
				<textarea class="form-control rounded-0" name="desc" rows="3"><?php echo $datos['descripcion']; ?></textarea>
			</div>
			<hr>
			<button type="submit" class="btn btn-outline-dark btn-lg btn-block" name="editar">Guardar</button><br>
		</form>

    </div>
    <!--  Fin Contenido    -->
</div>

<?php require RUTA_APP . '/vistas/inc/footer.php'; ?>