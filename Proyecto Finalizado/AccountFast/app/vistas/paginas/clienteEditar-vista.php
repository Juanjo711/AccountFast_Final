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
                    <i class="fas fa-user" style="font-size: 45px;"></i>
                    <h2>Actualizar Cliente</h2>
                </header>
            </div>
            <div class="col-md-1 col-3">
                <a href="<?php echo RUTA_URL; ?>/clientes">
                    <i class="fas fa-sign-out-alt display-4 text-dark"></i>
                </a>
            </div>
        </div>

        <form action="<?php echo RUTA_URL; ?>/clientes/actualizar" method="post" class="col-md-6 mx-auto mt-4">
            <div class="form-group">
                <label>ID Cliente</label>
                <input type="text" name="id_cliente" class="form-control" value="<?php echo $datos['id']; ?>" readonly>
            </div>
            <div class="form-group">
                <label>Nombre cliente</label>
                <input type="text" name="nombre" class="form-control" value="<?php echo $datos['nombre']; ?>" required>
            </div>
            <div class="form-group">
                <label>Telefono</label>
                <input type="text" name="telefono" class="form-control" value="<?php echo $datos['telefono']; ?>" required>
            </div>
            <div class="form-group">
                <label>Correo</label>
                <input type="text" name="correo" class="form-control" value="<?php echo $datos['correo']; ?>" required>
            </div>
            <hr>
            <input type="submit" value="Actualizar" class="btn btn-dark btn-block">
        </form>
    </div>
    <!--  Fin Contenido    -->
</div>

<?php require RUTA_APP . '/vistas/inc/footer.php'; ?>