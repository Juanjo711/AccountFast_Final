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
                    <i class="fas fa-comment-dollar" style="font-size: 45px;"></i>
                    <h2>Actualizar Gasto</h2>
                </header>
            </div>
            <div class="col-md-1 col-3">
                <a href="<?php echo RUTA_URL; ?>/gastos">
                    <i class="fas fa-sign-out-alt display-4 text-dark"></i>
                </a>
            </div>
        </div>

        <form action="<?php echo RUTA_URL; ?>/gastos/actualizar" method="post" class="col-md-6 mx-auto mt-4">
            <input type="hidden" name="id" value="<?php echo $datos['id']; ?>">
            <div class="form-group">
                <label for="fecha">Fecha:</label>
                <input type="date" name="fecha" id="fecha" class="form-control" value="<?php echo $datos['fecha']; ?>" required>
            </div>
            <div class="form-group">
                <label for="cantidad">Cantidad:</label>
                <input type="number" name="cantidad" id="cantidad" class="form-control" value="<?php echo $datos['cantidad']; ?>" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea name="descripcion" id="descripcion" cols="30" rows="5" class="form-control" required><?php echo $datos['descripcion']; ?></textarea>
            </div>
            <hr>
            <input type="submit" value="Actualizar" class="btn btn-outline-dark btn-block">
        </form>
    </div>

    <!--  Fin Contenido    -->
</div>

<?php require RUTA_APP . '/vistas/inc/footer.php'; ?>