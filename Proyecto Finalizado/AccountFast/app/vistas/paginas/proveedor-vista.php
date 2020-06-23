<?php require RUTA_APP . '/vistas/inc/header.php'; ?>
<!-- SIDEBAR -->
<?php require RUTA_APP . '/vistas/inc/sidebar.php'; ?>


<div id="content" class="container-fluid">
    <!-- NAVBAR -->
    <?php require RUTA_APP . '/vistas/inc/navbar.php'; ?>

    <!-- CONTENIDO -->
    <div class="container mt-3">
        <header class="text-center text-secondary">
            <i class="fas fa-users" style="font-size: 45px;"></i>
            <h1>Proveedores</h1>
        </header>
    </div>

    <div class="container-fluid">
        <nav class="nav bg-light justify-content-end">
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#Modal">+ Nuevo Proveedor</button>
        </nav><br>
    </div>

    <!-- MODAL -->
    <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Registro de Proveedores</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="proveedor/registrar" method="POST">
                        <div class="form-group">
                            <label>Identificación</label>
                            <input type="text" name="id_proveedor" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Tipo de Proveedor</label>
                            <select class="form-control" name="tipo" required>
                                <option></option>
                                <option>Proveedor de productos</option>
                                <option>Proveedor de servicios</option>
                                <option>Proveedor de recursos</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Nombre del proveedor</label>
                            <input type="text" name="nombrep" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Teléfono</label>
                            <input type="number" name="tel" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Correo Electrónico</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Descripción</label>
                            <textarea class="form-control rounded-0" name="desc" rows="3"></textarea>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-outline-dark btn-lg btn-block" name="registrar">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="table-responsive p-3">
        <table id="tablaPr" class="table table-hover table-striped" style="width:100%"">
            <thead class="bg-dark text-white">
                <tr>
                    <td>Identificación</td>
                    <td>Tipo</td>
                    <td>Nombre</td>
                    <td>Telefono</td>
                    <td>Correo</td>
                    <td>Descripción</td>
                    <td>Acciones</td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <?php foreach($datos['proveedores'] as $fila): ?>
                    <tr>
                        <td><?php echo $fila['id_proveedor']; ?></td>
                        <td><?php echo $fila['tipo_proveedor']; ?></td>
                        <td><?php echo $fila['nomb_proveedor']; ?></td>
                        <td><?php echo $fila['tel_proveedor']; ?></td>
                        <td><?php echo $fila['correo_proveedor']; ?></td>
                        <td><?php echo $fila['descripcion']; ?></td>
                        <td><a href="proveedor/editar/<?php echo $fila['id_proveedor']; ?>"><i class="fas fa-edit" style="font-size: 25px"></i></a></td>
                        <td><a href="proveedor/eliminar/<?php echo $fila['id_proveedor']; ?>" onclick="return confirmDelete()"><i class="fas fa-trash-alt text-danger" style="font-size: 25px"></i></a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!--  Fin Contenido    -->
</div>

<script>
    function confirmDelete() {
        var respuesta = confirm("Esta seguro que desea eliminar este Proveedor?");

        if (respuesta == true) {
            return true;
        } else {
            return false;
        }
    }
</script>

<?php require RUTA_APP . '/vistas/inc/footer.php'; ?>