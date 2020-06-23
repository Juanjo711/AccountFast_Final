<?php require RUTA_APP . '/vistas/inc/header.php'; ?>
<!-- SIDEBAR -->
<?php require RUTA_APP . '/vistas/inc/sidebar.php'; ?>


<div id="content" class="container-fluid">
    <!-- NAVBAR -->
    <?php require RUTA_APP . '/vistas/inc/navbar.php'; ?>

    <!-- CONTENIDO -->
    <div class="container-fluid p-3 mt-4">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <h5 class="card-header bg-secondary text-white">Nuevo Producto</h5>
                    <div class="card-body">
                        <form id="form-inventory">
                            <div class="form-group">
                                <input type="text" id="id" class="form-control" placeholder="ID producto" required>
                            </div>
                            <div class="form-group">
                                <input type="text" id="nombre" class="form-control" placeholder="Nombre Producto" required>
                            </div>
                            <div class="form-group">
                                <input type="number" id="precio" class="form-control" placeholder="Precio" required>
                            </div>
                            <div class="form-group">
                                <input type="number" id="cantidad" class="form-control" placeholder="Cantidad" required>
                            </div>
                            <div class="form-group">
                                <input type="file" id="imagen" class="form-control-file">
                            </div>
                            <div class="form-group">
                                <select id="proveedor" class="form-control" required>
                                    <?php
                                    if ($datos['proveedores'] != NULL) { ?>
                                        <option value="">Proveedor</option>
                                        <?php foreach ($datos['proveedores'] as $fila) : ?>
                                            <option value="<?php echo $fila['id_proveedor'] ?>"><?php echo $fila['nomb_proveedor']; ?></option>
                                        <?php endforeach;
                                    } else {
                                        ?>
                                        <option value="">No hay proveedores registrados</option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <select id="categoria" class="form-control" required>
                                    <?php
                                    if ($datos['categorias'] != NULL) { ?>
                                        <option value="">Categoria</option>
                                        <?php foreach ($datos['categorias'] as $fila) : ?>
                                            <option value="<?php echo $fila['id_categoria']; ?>"><?php echo $fila['categoria']; ?></option>
                                        <?php endforeach;
                                    } else {
                                        ?>
                                        <option value="">No hay categorias registradas</option>
                                    <?php } ?>
                                </select>
                                <a href="" class="text-muted ml-2" data-toggle="modal" data-target="#exampleModal">Nueva categoria</a>
                            </div>
                            <hr>
                            <input type="submit" value="Agregar" class="btn btn-outline-dark btn-block">
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">

                <div class="container">
                    <header class="text-center text-secondary">
                        <h2><i class="fas fa-warehouse" style="font-size:35px;"></i> Productos</h2>
                    </header>
                </div>

                <!-- TABLA -->
                <div class="table-responsive mt-2">
                    <table id="tablaP" class="table table-bordered table-sm table-hover text-center" width="100%">
                        <thead class="bg-secondary text-white">
                            <tr>
                                <th>ID</th>
                                <td>Imagen</td>
                                <td>Nombre</td>
                                <td>Precio</td>
                                <td>Cant.</td>
                                <td>Categoria</td>
                                <td>Proveedor</td>
                                <td></td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL CATEGORIA -->

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Categoria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="Inventario/registrarCategoria" method="post">
                        <div class="form-group">
                            <label for="categoria1">Categoria:</label>
                            <input type="text" name="categoria" id="categoria1" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción:</label>
                            <textarea name="descripcion" id="descripcion" cols="30" rows="4" class="form-control"></textarea>
                        </div>
                        <hr>
                        <input type="submit" value="Agregar" class="btn btn-outline-dark btn-block">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--  Fin Contenido    -->
</div>

<?php require RUTA_APP . '/vistas/inc/footer.php'; ?>