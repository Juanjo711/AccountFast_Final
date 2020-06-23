<?php require RUTA_APP . '/vistas/inc/header.php'; ?>
<!-- SIDEBAR -->
<?php require RUTA_APP . '/vistas/inc/sidebar.php'; ?>


<div id="content" class="container-fluid">
    <!-- NAVBAR -->
    <?php require RUTA_APP . '/vistas/inc/navbar.php'; ?>

    <!-- CONTENIDO -->
    <div class="container mt-3">
        <header class="text-center text-secondary">
            <i class="fas fa-comment-dollar" style="font-size: 45px;"></i>
            <h1>Gastos</h1>
        </header>
    </div>

    <div class="container-fluid">
        <nav class="nav bg-light justify-content-end">
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#Modal">+ Nuevo Gasto</button>
        </nav><br>

        <!-- MODAL -->
        <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Registro de Gastos</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="gastos/registrar" method="post">
                            <div class="form-group">
                                <label for="fecha">Fecha:</label>
                                <input type="date" name="fecha" id="fecha" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="cantidad">Cantidad:</label>
                                <input type="number" name="cantidad" id="cantidad" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción:</label>
                                <textarea name="descripcion" id="descripcion" cols="30" rows="5" class="form-control" required></textarea>
                            </div>
                            <hr>
                            <input type="submit" value="Registrar" class="btn btn-outline-dark btn-block">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- FIN MODAL -->
        <table id="tablaG" class="table table-striped table-hover" style="width:100%">
            <thead class="bg-dark text-white">
                <tr>
                    <td>Fecha</td>
                    <td>Descripción</td>
                    <td>Cantidad</td>
                    <td>Acciones</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datos['gastos'] as $fila) : ?>
                    <tr>
                        <td><?php echo $fila['fecha']; ?></td>
                        <td><?php echo $fila['descripcion']; ?></td>
                        <td><?php echo $fila['cantidad']; ?></td>
                        <td><a href="gastos/editar/<?php echo $fila['id_gasto']; ?>"><i class="fas fa-edit" style="font-size: 25px"></i></a></td>
                        <td><a href="gastos/eliminar/<?php echo $fila['id_gasto']; ?>" onclick="return confirmDelete()"><i class="fas fa-trash-alt text-danger" style="font-size: 25px"></i></a></td>
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
        var newLine = "\r\n";
        var respuesta = confirm("Esta seguro que desea eliminar este Gasto?"+newLine+"No se recomienda eliminar gastos.");

        if (respuesta == true) {
            return true;
        } else {
            return false;
        }
    }
</script>

<?php require RUTA_APP . '/vistas/inc/footer.php'; ?>