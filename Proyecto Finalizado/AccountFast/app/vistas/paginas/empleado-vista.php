<?php require RUTA_APP . '/vistas/inc/header.php'; ?>
<!-- SIDEBAR -->
<?php require RUTA_APP . '/vistas/inc/sidebar.php'; ?>


<div id="content" class="container-fluid">
    <!-- NAVBAR -->
    <?php require RUTA_APP . '/vistas/inc/navbar.php'; ?>

    <!-- CONTENIDO -->
    <div class="container mt-3">
        <header class="text-center text-secondary">
            <i class="fas fa-address-book" style="font-size: 45px;"></i>
            <h1>Empleados</h1>
        </header>
    </div>

    <div class="container-fluid">
        <nav class="nav bg-light justify-content-end">
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#Modal">+ Nuevo Empleado</button>
        </nav><br>

        <!-- MODAL -->
        <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Registro de Empleados</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="empleado/registrar" method="post">
                            <div class="form-group">
                                <label for="empleado">Documento Empleado:</label>
                                <input type="text" name="id_empleado" id="empleado" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombres:</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="apellido">Apellidos:</label>
                                <input type="text" name="apellido" id="apellido" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="telefono">Telefono:</label>
                                <input type="text" name="telefono" id="telefono" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="correo">Correo:</label>
                                <input type="email" name="correo" id="correo" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="cargo">Cargo:</label>
                                <input type="text" name="cargo" id="cargo" class="form-control" required>
                            </div>
                            <hr>
                            <input type="submit" value="Registrar" class="btn btn-outline-dark btn-block">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- FIN MODAL -->

        <div class="table-responsive">
            <table id="tablaE" class="table table-striped table-hover" style="width:100%">
                <thead class="bg-dark text-white">
                    <tr>
                        <td>Documento</td>
                        <td>Nombres</td>
                        <td>Apellidos</td>
                        <td>Telefono</td>
                        <td>Correo</td>
                        <td>Cargo</td>
                        <td>Acciones</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datos['empleados'] as $fila) : ?>
                        <tr>
                            <td><?php echo $fila['doc_empleado']; ?></td>
                            <td><?php echo $fila['nomb_empleado']; ?></td>
                            <td><?php echo $fila['ape_empleado']; ?></td>
                            <td><?php echo $fila['tel_empleado']; ?></td>
                            <td><?php echo $fila['correo_empleado']; ?></td>
                            <td><?php echo $fila['cargo_empleado']; ?></td>
                            <td><a href="empleado/editar/<?php echo $fila['doc_empleado']; ?>"><i class="fas fa-edit" style="font-size: 25px"></i></a></td>
                            <td><a href="empleado/eliminar/<?php echo $fila['doc_empleado']; ?>" onclick="return confirmDelete()"><i class="fas fa-trash-alt text-danger" style="font-size: 25px"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!--  Fin Contenido    -->
</div>

<script>
    function confirmDelete() {
        var respuesta = confirm("Esta seguro que desea eliminar este Empleado?");

        if (respuesta == true) {
            return true;
        } else {
            return false;
        }
    }
</script>

<?php require RUTA_APP . '/vistas/inc/footer.php'; ?>