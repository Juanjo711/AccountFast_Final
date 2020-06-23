<?php
	
	/**
	 * Controlador esta es la clase de la cual heredarán todos los controladores del proyecto
	 */
	class Controlador{
		
		/**
		 * Verifica si el modelo existe dentro del proyecto
		 * @param  string $modelo nombre del modelo
		 * @return object retorna la instacia de la clase del modelo
		 */
		public function modelo($modelo){
			require_once '../app/modelos/'.$modelo. '.php';
			return new $modelo();
		}
		
		/**
		 * Verifica si la vista existe
		 * @param  string $vista el nombre de la vista que se va a solicitar
		 * @param  array $datos envia informacion que se va a usar dentro de la vista
		 * @return void
		 */
		public function vista($vista, $datos = []){
			if (file_exists('../app/vistas/'.$vista.'-vista.php')) {
				require_once '../app/vistas/'.$vista.'-vista.php';
			}else{
				die('La vista no existe');
			}
		}
	}
