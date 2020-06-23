<?php

/**
 * Clase Paginas hereda de la clase Controlador
 */
class Paginas extends Controlador
{
	/**
	 * guarda la sesion
	 *
	 * @var string
	 */
	public $sesion;

	/**
	 * valida si la sesion esta iniciada para mostrar el contenido
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->sesion = new Session();
		$this->sesion->iniciar();
		if ($this->sesion->get('email') == !null) {
			redireccionar("/inicio");
		}
	}

	/**
	 * Muestra la vista (index)
	 *
	 * @return void
	 */
	public function index()
	{
		$this->vista('paginas/index');
	}
}
