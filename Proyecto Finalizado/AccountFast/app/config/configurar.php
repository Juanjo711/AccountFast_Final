<?php

	// En este archivo se maneja la configuracion del proyecto tanto del acceso a la base de datos como la ruta de acceso a las carpetas

	// Constante donde se guarda el host de la conexion a la base de datos
	define('DB_HOST', 'localhost');
	// Constante donde se guarda el usuario de la base de datos
	define('DB_USUARIO', 'root');
	// Constante donde se guarda la contraseña de la base de datos
	define('DB_PASSWORD', '');
	// Constante donde se guarda el nombre de la base de datos
	define('DB_NOMBRE', 'accountfast');

	// En esta constante se guarda la ruta app del proyecto que es donde se encuentra la logica todos los archivos php
	// La funcion dirname devuelve una carpeta del directorio donde nos encontramos
	// __FILE__ Nos devuelve la direccion exacta de donde nos encontramos (ruta actual)
	define('RUTA_APP', dirname(dirname(__FILE__)));
	// En esta constante se guarda la ruta url del proyecto que es donde se encuentan los archivos js,css y las imagenes
	define('RUTA_URL', 'http://localhost/Accountfast');
	// En esta constante se guarda el nombre que va tener el sitio en el navegador
	define('NOMBRESITIO', 'AccountFast');
