<?php

/**
 * La clase Core es la clase principal del proyecto y es la que se encarga se manejar la URL amigable
 */
class Core
{
	/**
	 * controladorActual se carga un controlador por defecto
	 * @var string
	 */
	protected $controladorActual = 'Paginas';
	/**
	 * metodoActual se carga el metodo del index
	 * @var string
	 */
	protected $metodoActual = 'index';
	/**
	 * parametros en este array se guardan los parametros que se le van a pasar a las funciones dentro de los controladores
	 * @var array
	 */
	protected $parametros = [];

	/**
	 * Captura todo lo que hay en la url y lo guarda
	 * @return string
	 */
	public function getUrl()
	{
		if (isset($_GET['url'])) {
			$url = rtrim($_GET['url'], '/');
			$url = filter_var($url, FILTER_SANITIZE_URL);
			$url = explode('/', $url);
			return $url;
		}
	}

	/**
	 * Verifica que lo que hay en la url exista para luego mostrar el contenido 
	 * @return void
	 */
	public function __construct()
	{
		$url = $this->getUrl();
		// Verifica si existe el controlador obtenido por la url y lo guarda en la variable global
		if (file_exists('../app/controladores/' . ucwords($url[0]) . '.php')) {
			// ucwords convierte a mayuscula la primera letra
			$this->controladorActual = ucwords($url[0]);
			// unset destruye la variable
			unset($url[0]);
		}

		// Se llama al controlar obtenido
		require_once '../app/controladores/' . $this->controladorActual . '.php';
		// Se instancia la clase que hay dentro del controlador
		$this->controladorActual = new $this->controladorActual;

		// Se valida que dentro del controlador exista el metodo que se solicita por la url y se guarda en la variable global
		if (isset($url[1])) {
			if (method_exists($this->controladorActual, $url[1])) {
				$this->metodoActual = $url[1];
				unset($url[1]);
			}
		}

		// Valida los parametros que se envian por la url y los guarda en la varible local
		$this->parametros = $url ? array_values($url) : [];
		// Llama a la variable que retorna la funcion
		echo call_user_func_array([$this->controladorActual, $this->metodoActual], $this->parametros);
	}
}
