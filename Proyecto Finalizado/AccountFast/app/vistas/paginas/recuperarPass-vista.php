<?php require RUTA_APP . '/vistas/inc/header.php'; ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 mt-5">
            <div class="mt-5">
                <h4 class="text-center">Recupera tu contraseña</h4>
                <div class="text-center">
                    <img src="<?php echo RUTA_URL; ?>/public/img/accountfast.png" id="logo_rot"><br><br>
                </div>
                <form action="<?php echo RUTA_URL; ?>/login/cambiarPassword" method="post">
                    <input type="hidden" name="codigo" value="<?php echo $datos['codigo']; ?>">
                    <div class="form-group">
                        <label for="clave1">Nueva Contraseña:</label>
                        <input type="password" name="clave1" id="clave1" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="clave2">Repita su Contraseña:</label>
                        <input type="password" name="clave2" id="clave2" class="form-control">
                    </div>
                    <hr>
                    <input type="submit" value="Restablecer Contraseña" class="btn btn-block btn-dark">
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <div class="login_img">
            </div>
        </div>
    </div>
</div>

<?php require RUTA_APP . '/vistas/inc/footer.php'; ?>