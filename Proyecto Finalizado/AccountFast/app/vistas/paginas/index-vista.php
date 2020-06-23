<?php require RUTA_APP . '/vistas/inc/header.php'; ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <a class="navbar-brand" href="#">
        <img src="<?php echo RUTA_URL; ?>/public/img/accountfast.png" width="30" height="30" class="d-inline-block align-top" alt="">
        AccountFast
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="ml-auto navbar-nav">
            <a class="nav-item nav-link" href="#factura">Facturación</a>
            <a class="nav-item nav-link" href="#balance">Balance</a>
            <a class="nav-item nav-link" href="#nomina">Nomina</a>
            <a class="nav-item nav-link" href="#proveedores">Proveedores</a>
            <a class="nav-item nav-link" href="#inventario">Inventario</a>
            <a class="nav-item nav-link btn btn-outline-secondary" href="login">INGRESAR</a>
        </div>
    </div>
</nav>

<div class="img-fluid">
    <div class="banner">
    </div>
    <div class="texto text-white text-right">
        <h2>Lleva tus Cuentas de una <br> Manera Rápida y Sencilla </h2>
        <p>Con nuestro Sistema de Apoyo para los Contadores <br> Enfocado en las Pequeñas y Medianas Empresas.</p>
    </div>
</div>



<main class="bg-white">
    <div class="container">
        <div id="factura"></div><br><br><br>
        <div class="container-fluid">
            <div class="row bg-light">
                <div class="col-md-6">
                    <h3 class="text-center">
                        <label class="titventas">Ventas y Facturación</label>
                    </h3>
                    <p class="text-justify">
                        Calculamos el tiempo que le puede tomar a una empresa comenzar a facturar electrónicamente (definir
                        si lo hace con desarrollos tecnológicos propios o a través de un proveedor tecnológico y realizar las
                        pruebas respectivas) puede ser unos seis meses, por eso es importante que se decidan ya por facturar
                        electrónicamente y no esperar a último momento, por eso te entregamos el mejor sistema contable al instante.
                    </p>
                </div>
                <div class="col-md-6">
                    <div class="container">
                        <img src="<?php echo RUTA_URL; ?>/public/img/factura.jpg" class="image-responsive ml-5" width="400">
                    </div>
                </div>
            </div>
        </div>

        <div id="balance"></div><br><br><br>

        <div class="container-fluid">
            <div class="row bg-light">
                <div class="col-md-6">
                    <div class="container">
                        <img src="<?php echo RUTA_URL; ?>/public/img/balance.png" class="image-responsive ml-5" width="350">
                    </div>
                </div>
                <div class="col-md-6">
                    <h3 class="text-center">
                        <label class="titventas">Balance</label>
                    </h3>
                    <p class="text-justify">
                        El balance general es un estado financiero que evidencia la situación económica y financiera de una
                        empresa en un momento determinado , siendo considerado el estado financiero más importante para poder
                        evaluar el panorama de la compañía por eso contamos con este modulo tan vital en el crecimiento de su
                        empresa.
                    </p>
                </div>
            </div>
        </div>

        <div id="nomina"></div><br><br><br>


        <div class="container-fluid">
            <div class="row bg-light">
                <div class="col-md-6">
                    <h3 class="text-center">
                        <label class="titventas">Nómina</label>
                    </h3>
                    <p class="text-justify">
                        En muchas ocasiones, el salario es uno de los métodos más efectivos para motivar a un trabajador, por lo
                        que una empresa debe abonar la nómina de manera oportuna y precisa.
                        Es importante que a todos los empleados se les pague con exactitud y oportunamente con las retenciones y
                        deducciones correctas, tanto en beneficio del perceptor, como de la misma empresa para asegurarse que
                        las retenciones y deducciones son presentadas de una manera apropiada.
                    </p>
                </div>
                <div class="col-md-6">
                    <div class="container">
                        <img src="<?php echo RUTA_URL; ?>/public/img/nomina.png" class="image-responsive ml-5" width="400" height="200">
                    </div>
                </div>
            </div>
        </div>

        <div id="proveedores"></div><br><br><br>

        <div class="container-fluid">
            <div class="row bg-light">
                <div class="col-md-6">
                    <div class="container">
                        <img src="<?php echo RUTA_URL; ?>/public/img/proveedor.jpg" class="image-responsive" width="400">
                    </div>
                </div>
                <div class="col-md-6">
                    <h3 class="text-center">
                        <label class="titventas">Proveedores</label>
                    </h3>
                    <p class="text-justify">
                        Somos conscientes que las empresas necesitan de todo tipo de recursos para poder realizar sus procesos
                        productivos de forma completa y conseguir esa "propuesta de venta" para obtener un beneficio. Por ello,
                        los proveedores son una parte fundamental del negocio, ya que sin ellos, no podemos realizar nuestra
                        actividad.
                    </p>
                </div>
            </div>
        </div>

        <div id="inventario"></div><br><br><br>

        <div class="container-fluid">
            <div class="row bg-light">
                <div class="col-md-6">
                    <h3 class="text-center">
                        <label class="titventas">Inventario</label>
                    </h3>
                    <p class="text-justify">
                        Con nuestro inventario la empresa lleva un control exhaustivo de mercadería mientras transcurre el
                        período comercial, y al final de éste tiene el balance final, ese balance es comparable con el de otros
                        años y sirve para sacar conclusiones y de ahí tomar determinadas acciones dependiendo del resultado.
                    </p>
                </div>
                <div class="col-md-6">
                    <div class="container">
                        <img src="<?php echo RUTA_URL; ?>/public/img/inventario.png" class="image-responsive ml-5" width="250" height="200">
                    </div>
                </div>
            </div>
        </div>

        <br>
        <br>
        <br>

        <div class="container-fluid mb-5 mt-5">
            <div class="row bg-light">
                <div class="col-md-6 border-dark border-right">
                    <h3 class="text-center">
                        <label class="titventas">Misión</label>
                    </h3>
                    <p class="text-justify">
                        Optimizar el trabajo de nuestros clientes por medio de un sistema de informacion capaz de contribuir a
                        la productividad y seguridad de los procesos de contabilidad, generando asi mayor bienestar y
                        rentabilidad para sus empresas.
                    </p>
                </div>
                <div class="col-md-6 border-dark border-left">
                    <h3 class="text-center">
                        <label class="titventas">Visión</label>
                    </h3>
                    <p class="text-justify">
                        Ser lideres en soluciones contables, administrativas y financieras que superen las expectativas de
                        nuestros clientes, quienes contarán con el compromiso de nuestra integridad, manteniendo altos
                        estandares éticos.
                    </p>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- FOOTER -->

<div class="footer bg-dark">
    <div class="container">
        <div class="row text-white">
            <div class="col-md-4">
                <h3 class="text-center mt-3">Contáctenos</h3>
                <div class="mt-2">
                    <h6><b>Email:</b>
                        <p class="text-muted">accountfast.info@gmail.com</p>
                    </h6>
                    <h6><b>Teléfono:</b>
                        <p class="text-muted">(+57) 3002845699</p>
                    </h6>
                </div>
            </div>
            <div class="col-md-4">
                <h3 class="text-center mt-3">Síguenos</h3>
                <p class="display-4 text-white text-center mt-4 border-right border-left">
                    <i class="fab fa-facebook-square"></i>
                    <i class="fab fa-twitter-square"></i>
                    <i class="fab fa-instagram"></i>
                </p>
            </div>
            <div class="col-md-4">
                <h3 class="text-center mt-3">AccountFast</h3>
                <div class="mt-3">
                    <h6 class="text-center text-muted">Copyright © 2021 Accountfast</h6>
                    <h6 class="text-center text-muted"><a href="#" style="color: gray;">Términos y condiciones </a>| <a href="#" style="color: gray;">Accesibilidad</a></h6>
                    <h6 class="text-center text-muted"><a href="#" style="color: gray;">Políticas de privacidad</a></h6>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require RUTA_APP . '/vistas/inc/footer.php'; ?>