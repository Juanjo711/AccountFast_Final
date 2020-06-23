<?php require RUTA_APP . '/vistas/inc/header.php'; ?>
<!-- SIDEBAR -->
<?php require RUTA_APP . '/vistas/inc/sidebar.php'; ?>


<div id="content" class="container-fluid">
    <!-- NAVBAR -->
    <?php require RUTA_APP . '/vistas/inc/navbar.php'; ?>

    <!-- CONTENIDO -->
    <div class="container mt-3">
        <header class="text-center text-secondary">
            <i class="fas fa-briefcase" style="font-size: 45px;"></i>
            <h1>Facturación</h1>
        </header>
    </div>
    <div class="container-fluid">
        <nav class="nav bg-light justify-content-end">
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target=".bd-example-modal-xl">+ Nueva Factura</button>
        </nav><br>

        <!-- MODAL -->
        <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal">
                            Nueva Factura
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="factura/registrar" method="POST">
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <label for="cliente">Cliente</label>
                                        <select name="cliente" id="cliente" class="form-control" required>
                                            <option value="">
                                                <?php if ($datos['clientes'] == "") {
                                                    echo "No hay clientes registrados";
                                                } else {
                                                    echo "Seleccione un cliente";
                                                } ?>
                                            </option>
                                            <?php foreach ($datos['clientes'] as $fila) : ?>
                                                <option value="<?php echo $fila['doc_cliente']; ?>"> <?php echo $fila['nomb_cliente']; ?> </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="numero_fac">Factura #</label>
                                        <input type="number" class="form-control" name="num_fac" placeholder="Factura de venta N°" value="00<?php echo $datos['numero']; ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-4">
                                        <label>Fecha</label>
                                        <input type="date" name="fecha" class="form-control" placeholder="Fecha" required>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Plazo</label>
                                        <select class="form-control" name="plazo" required>
                                            <option>De contado</option>
                                            <option>8 Días</option>
                                            <option>15 Días</option>
                                            <option>30 Días</option>
                                            <option>60 Días</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Vencimiento</label>
                                        <input type="date" name="ven" class="form-control" placeholder="Vencimiento" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="table-responsive">
                                    <table id="tabla" class="table table-hover table-sm">
                                        <thead class="text-center">
                                            <tr>
                                                <th scope="col">Producto</th>
                                                <th scope="col">Unidades disponibles</th>
                                                <th scope="col">Cantidad</th>
                                                <th scope="col">Valor unitario</th>
                                                <th scope="col">Impuesto %</th>
                                                <th scope="col">Valor total</th>
                                            </tr>
                                        </thead>
                                        <tbody id="contenido-tabla">

                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-center">
                                    <a id="agregar_fila" class="btn btn-success text-white">Agregar</a>
                                    <a id="eliminar_fila" class="btn btn-danger text-white">Eliminar</a>
                                </div>
                                <hr>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-2"><label>Subtotal:</label></div>
                                    <div class="col-md-6"><input type="number" id="sub_total" name="subtotal" class="form-control" readonly></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-2"><label>Descuento %:</label></div>
                                    <div class="col-md-6"><input type="number" id="descuento" name="descuento" class="form-control" required></div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-2"><label>TOTAL:</label></div>
                                    <div class="col-md-6"><input type="number" id="total" name="total" class="form-control" readonly></div>
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-outline-dark btn-lg btn-block" name="registrar">Guardar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table id="tablaF" class="table table-hover" style="width:100%">
                <thead class=" bg-dark text-white">
                    <tr>
                        <th>N° Factura</th>
                        <td>Cliente</td>
                        <td>Creación</td>
                        <td>Plazo</td>
                        <td>Vencimiento</td>
                        <td>Total</td>
                        <td>Estado</td>
                        <td></td>
                        <td>Acciones</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datos['facturas'] as $fila) : ?>
                        <tr>
                            <td>00<?php echo $fila['num_factura']; ?></td>
                            <td><?php echo $fila['nomb_cliente']; ?></td>
                            <td><?php echo $fila['fecha']; ?></td>
                            <td><?php echo $fila['plazo']; ?></td>
                            <td><?php echo $fila['vencimiento']; ?></td>
                            <td><?php echo $fila['total']; ?></td>
                            <td class="text-warning"><?php echo $fila['estado']; ?></td>
                            <?php
                            if ($fila['estado'] == 'PENDIENTE') {
                            ?>
                                <td><a href="factura/actualizar/<?php echo $fila['num_factura']; ?>" onclick="return confirmEstado()"><i class="fas fa-clipboard-check" style="font-size: 25px"></i></a></td>
                            <?php
                            } else {
                            ?>
                                <td></td>
                            <?php
                            }
                            ?>
                            <td class="text-center"><a target="_blank" href="factura/verPdf/<?php echo $fila['num_factura']; ?>"><i class="text-success fas fa-file-pdf" style="font-size:25px"></i></a></td>
                            <td><a href="factura/anular/<?php echo $fila['num_factura']; ?>" onclick="return confirmAnular()"><i class="text-danger fas fa-ban" style="font-size:25px"></i></a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>


    <!--  Fin Contenido    -->
</div>

<script>
    function confirmAnular() {
        var respuesta = confirm("Esta seguro que desea Anular esta factura?");

        if (respuesta == true) {
            return true;
        } else {
            return false;
        }
    }

    function confirmEstado() {
        var respuesta = confirm("Esta seguro que desea confirmar el pago esta factura?");

        if (respuesta == true) {
            return true;
        } else {
            return false;
        }
    }
</script>

<?php require RUTA_APP . '/vistas/inc/footer.php'; ?>