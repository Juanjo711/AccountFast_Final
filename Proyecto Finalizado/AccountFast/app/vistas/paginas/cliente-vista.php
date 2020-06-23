<?php require RUTA_APP . '/vistas/inc/header.php'; ?>
<!-- SIDEBAR -->
<?php require RUTA_APP . '/vistas/inc/sidebar.php'; ?>


<div id="content" class="container-fluid">
    <!-- NAVBAR -->
    <?php require RUTA_APP . '/vistas/inc/navbar.php'; ?>

    <!-- CONTENIDO -->
    <div class="container mt-3">
        <header class="text-center text-secondary">
            <i class="fas fa-user" style="font-size: 45px;"></i>
            <h1>Clientes</h1>
        </header>
    </div>

    <div class="container-fluid">
        <nav class="nav bg-light justify-content-end">
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#Modal">+ Nuevo Cliente</button>
        </nav><br>

        <!-- MODAL -->
        <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Registro de Clientes</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="clientes/registrar" method="post">
                            <div class="form-group">
                                <label for="id">Identificación:</label>
                                <input type="number" name="id_cliente" id="id" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="tel">Teléfono:</label>
                                <input type="number" name="telefono" id="tel" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="correo">Correo Electrónico:</label>
                                <input type="email" name="correo" id="correo" class="form-control" required>
                            </div>
                            <hr>
                            <input type="submit" value="Guardar" class="btn btn-block btn-dark">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- FIN MODAL -->

        <!-- TABLA DE DATOS -->
        <div class="table-responsive">
            <table id="tablaC" class="table table-striped table-hover" style="width:100%">
                <thead class="bg-dark text-white">
                    <tr>
                        <td>Nombre</td>
                        <td>Identificación</td>
                        <td>Teléfono</td>
                        <td>Correo</td>
                        <td>Acciones</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if ($datos['clientes'] != NULL){
                        foreach ($datos['clientes'] as $fila) :
                    ?>
                        <tr>
                            <td><?php echo $fila['nomb_cliente']; ?></td>
                            <td><?php echo $fila['doc_cliente']; ?></td>
                            <td><?php echo $fila['tel_cliente']; ?></td>
                            <td><?php echo $fila['correo_cliente']; ?></td>
                            <td><a href="clientes/editar/<?php echo $fila['doc_cliente']; ?>"><i class="fas fa-edit" style="font-size: 25px"></i></a></td>
                            <td><a href="clientes/eliminar/<?php echo $fila['doc_cliente']; ?>" onclick="return confirmDelete()"><i class="fas fa-trash-alt text-danger" style="font-size: 25px"></i</a></td>
                        </tr>
                    <?php endforeach;} ?>
                </tbody>
            </table>
        </div>
        <!-- FIN TABLA DE DATOS -->
    </div>
    <!--  Fin Contenido    -->
</div>

<script>
    function confirmDelete() {
        var respuesta = confirm("Esta seguro que desea eliminar este Cliente?");

        if (respuesta == true) {
            return true;
        } else {
            return false;
        }
    }
</script>

<?php require RUTA_APP . '/vistas/inc/footer.php'; ?>