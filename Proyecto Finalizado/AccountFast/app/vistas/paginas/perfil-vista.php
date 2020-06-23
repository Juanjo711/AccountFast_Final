<?php require RUTA_APP . '/vistas/inc/header.php'; ?>
<!-- SIDEBAR -->
<?php require RUTA_APP . '/vistas/inc/sidebar.php'; ?>


<div id="content" class="container-fluid">
    <!-- NAVBAR -->
    <?php require RUTA_APP . '/vistas/inc/navbar.php'; ?>

    <!-- CONTENIDO -->
    <div class="container mt-1">
        <header class="text-center text-secondary">
            <i class="fas fa-user-circle" style="font-size: 50px"></i>
            <h2>Perfil Usuario</h2>
        </header>
        <?php

        ?>
        <form action="perfil/actualizar" method="POST" class="mx-auto">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="text-center">Datos Personales</h5><br>
                    <div class="form-group">
                        <label>Documento de Identidad:</label>
                        <input type="number" name="documento" class="form-control" value="<?php echo $datos['doc'];?>" readonly required>
                    </div>
                    <div class="form-group">
                        <label>Nombres:</label>
                        <input type="text" name="nombre" class="form-control" value="<?php echo $datos['nombre'];?>" required>
                    </div>
                    <div class="form-group">
                        <label>Apellidos:</label>
                        <input type="text" name="apellido" class="form-control" value="<?php echo $datos['apellido'];?>" required>
                    </div>
                    <div class="form-group">
                        <label>Correo Electrónico:</label>
                        <input type="email" name="correo" class="form-control" value="<?php echo $datos['correo'];?>" required>
                    </div>
                    <hr>
                    <p class="text-center">Cambiar Contraseña:</p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="password" name="clave1" class="form-control" placeholder="Contraseña" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="password" name="clave2" class="form-control" placeholder="Confirme su Contraseña">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <h5 class="text-center">Datos de la Empresa</h5><br>
                    <div class="form-group">
                        <label>NIT Empresa:</label>
                        <input type="text" name="nit" class="form-control" value="<?php echo $datos['nit'];?>" readonly required>
                    </div>
                    <div class="form-group">
                        <label>Nombre Empresa:</label>
                        <input type="text" name="nom_empresa" class="form-control" value="<?php echo $datos['nom_empresa'];?>" required>
                    </div>
                    <div class="form-group">
                        <label>Correo Empresa:</label>
                        <input type="email" name="correo_empresa" class="form-control" value="<?php echo $datos['correo_empresa'];?>" required>
                    </div>
                    <div class="form-group">
                        <label>Teléfono:</label>
                        <input type="text" name="telefono" class="form-control" value="<?php echo $datos['telefono'];?>" required>
                    </div>
                    <div class="form-group">
                        <label>Direccion:</label>
                        <input type="text" name="direccion" class="form-control" value="<?php echo $datos['direccion'];?>" required>
                    </div>
                </div>
            </div>
            <hr>
            <div class="text-center">
                <input type="submit" value="Guardar" class="btn btn-dark ">
            </div>
        </form>
    </div>

    <!--  Fin Contenido    -->
</div>

<?php require RUTA_APP . '/vistas/inc/footer.php'; ?>