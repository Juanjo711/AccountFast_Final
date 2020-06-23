<?php require RUTA_APP . '/vistas/inc/header.php'; ?>
<!-- SIDEBAR -->
<?php require RUTA_APP . '/vistas/inc/sidebar.php'; ?>


<div id="content" class="container-fluid">
    <!-- NAVBAR -->
    <?php require RUTA_APP . '/vistas/inc/navbar.php'; ?>

    <!-- CONTENIDO -->

    <div class="container">
        <div class="row mt-3">
            <div class="col-md-6">
                <div class="card text-white text-center bg-dark mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <i class="mt-3 fas fa-shopping-cart text-center" style="font-size: 80px"></i>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h3 class="card-title">Total de Ventas</h3>
                                <p class="card-text">$ <?php echo $datos['ventas'] ;?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card text-white text-center bg-secondary">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <i class="mt-2 fas fa-comment-dollar text-center" style="font-size: 80px"></i>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h3 class="card-title">Total de Gastos</h3>
                                <p class="card-text">$ <?php echo $datos['gastos'] ;?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <select id="año" class="form-control">
            <option>2019</option>
            <option selected>2020</option>
        </select>

        <canvas id="grafico" width="400" height="150"></canvas>
    </div>

    <!--  Fin Contenido    -->
</div>

<?php require RUTA_APP . '/vistas/inc/footer.php'; ?>
<!-- SCRIPT DE LA GRAFICA -->
<script src="<?php echo RUTA_URL; ?>/public/js/grafica.js"></script>