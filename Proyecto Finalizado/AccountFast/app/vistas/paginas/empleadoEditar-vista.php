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
                    <i class="fas fa-address-book" style="font-size: 45px;"></i>
                    <h2>Actualizar Empleado</h2>
                </header>
            </div>
            <div class="col-md-1 col-3">
                <a href="<?php echo RUTA_URL; ?>/empleado">
                    <i class="fas fa-sign-out-alt display-4 text-dark"></i>
                </a>
            </div>
        </div>

        <form class="col-md-6 mx-auto mt-3" action="<?php echo RUTA_URL; ?>/empleado/actualizar" method="post">
            <div class="form-group">
                <label for="empleado">Documento Empleado:</label>
                <input type="text" name="id_empleado" id="empleado" class="form-control" value="<?php echo $datos['id']; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="nombre">Nombres:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $datos['nombre']; ?>">
            </div>
            <div class="form-group">
                <label for="apellido">Apellidos:</label>
                <input type="text" name="apellido" id="apellido" class="form-control" value="<?php echo $datos['apellido']; ?>">
            </div>
            <div class="form-group">
                <label for="telefono">Telefono:</label>
                <input type="text" name="telefono" id="telefono" class="form-control" value="<?php echo $datos['telefono']; ?>">
            </div>
            <div class="form-group">
                <label for="correo">Correo:</label>
                <input type="email" name="correo" id="correo" class="form-control" value="<?php echo $datos['correo']; ?>">
            </div>
            <div class="form-group">
                <label for="cargo">Cargo:</label>
                <input type="text" name="cargo" id="cargo" class="form-control" value="<?php echo $datos['cargo']; ?>">
            </div>
            <hr>
            <input type="submit" value="Actualizar" class="btn btn-outline-dark btn-block">
        </form>
    </div>

    <!--  Fin Contenido    -->
</div>

<?php require RUTA_APP . '/vistas/inc/footer.php'; ?>