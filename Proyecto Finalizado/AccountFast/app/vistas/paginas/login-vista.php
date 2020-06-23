<!-- Trae el header desde la carpeta de los includes -->
<?php require RUTA_APP . '/vistas/inc/header.php'; ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 mt-3">
            <a href="index"><i class="mt-3 text-dark fas fa-arrow-circle-left" style="font-size: 30px"></i></a>
            <div class="mt-5 text-center">
                <h4>Bienvenido a AccountFast</h4>
                <img src="<?php echo RUTA_URL; ?>/public/img/accountfast.png" id="logo_rot"><br><br>
            </div>
            <div id="alerta"></div>
            <form id="login-form" method="post">
                <div class="form-group">
                    <label for="correo">Correo Electrónico:</label>
                    <input type="email" class="form-control" id="correo" required>
                </div>
                <div class="form-group">
                    <label for="pass">Contraseña:</label>
                    <input type="password" class="form-control" id="pass" required>
                </div>
                <hr>
                <input type="submit" value="Ingresar" class="btn btn-dark btn-block">
            </form>
            <div class="clearfix mt-4">
                <div class="float-left">
                    <a href="#" data-toggle="modal" data-target="#modalRecuperar">¿Olvidaste tu contraseña?</a>
                </div>
                <div class="float-right">
                    Registrate gratis <a href="#" data-toggle="modal" data-target="#exampleModal">Aquí</a>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="login_img">
            </div>
        </div>
    </div>
</div>

<!-- Modal Registro -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Registro</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="login/registrar" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="text-center">Datos Personales</h5><br>
                            <div class="form-group">
                                <input type="number" name="documento" class="form-control" placeholder="Documento de Identidad" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="nombre" class="form-control" placeholder="Nombres" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="apellido" class="form-control" placeholder="Apellidos" required>
                            </div>
                            <div class="form-group">
                                <input type="email" name="correo" class="form-control" placeholder="Correo Electronico" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="password" name="clave1" class="form-control" placeholder="Contraseña" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="password" name="clave2" class="form-control" placeholder="Confirme su Contraseña" required>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <h5 class="text-center">Datos de la Empresa</h5><br>
                            <div class="form-group">
                                <input type="text" name="nit" class="form-control" placeholder="NIT Empresa" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="nom_empresa" class="form-control" placeholder="Nombre Empresa" required>
                            </div>
                            <div class="form-group">
                                <input type="email" name="correo_empresa" class="form-control" placeholder="Correo Empresa" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="telefono" class="form-control" placeholder="Telefono" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="direccion" class="form-control" placeholder="Direccion" required>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <input type="submit" value="Registrar" class="btn btn-dark btn-block">
                </form>
            </div>

        </div>
    </div>
</div>

<!-- Modal Recuperar Contraseña -->
<div class="modal fade" id="modalRecuperar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Recuperar Contraseña</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="login/recuperarPass" method="post">
                    <div class="form-group">
                        <label for="correoR">Correo Electrónico:</label>
                        <input type="email" name="correo" id="correoR" class="form-control" required>
                    </div>
                    <hr>
                    <input type="submit" value="Enviar" class="btn btn-block btn-dark">
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Trae los scripts de la carpeta includes -->
<?php require RUTA_APP . '/vistas/inc/footer.php'; ?>