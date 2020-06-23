<?php
	/**
	 *  Clase de Conexion con la base de datos
	 */
	class Conexion{		
		/**
		 * host de la base de datos
		 * @var string
		 */
		private $host = DB_HOST;		
		/**
		 * usuario
		 * @var string
		 */
		private $usuario = DB_USUARIO;		
		/**
		 * password
		 * @var string
		 */
		private $password = DB_PASSWORD;		
		/**
		 * nombre de la base de datos
		 * @var string
		 */
		private $nombre_base = DB_NOMBRE;

				
		/**
		 * Se usa para conectarse con la base de datos
		 *
		 * @return object de conexion si se conecta con exito
		 */
		public function conectar(){
			try{
				$db = mysqli_connect(DB_HOST, DB_USUARIO, DB_PASSWORD, DB_NOMBRE);
			}catch(Exception $e){
				die("error".$e);
			}

			return $db;
		}


	}
