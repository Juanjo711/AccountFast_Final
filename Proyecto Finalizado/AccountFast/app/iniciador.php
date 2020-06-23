<?php
	//Cargamos librerias
	require_once "config/Configurar.php";
	require_once "librerias/url_helper.php";
	require_once "librerias/Session.php";
	require_once "librerias/Conexion.php";
	require_once "librerias/Controlador.php";
	require_once "librerias/Core.php";
	require_once "librerias/fpdf/fpdf.php";
	require_once "librerias/phpmailer/Exception.php";
	require_once "librerias/phpmailer/PHPMailer.php";
	require_once "librerias/phpmailer/SMTP.php";

	// Carga la libreria que recibe como parametro
	spl_autoload_register(function($nombreClase){
		require_once 'librerias/'.$nombreClase.'.php';
	})


?>