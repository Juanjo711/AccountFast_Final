<?php

/**
 * Clase Gastos hereda de la clase Controlador
 */
class Gastos extends Controlador
{
    /**
     * guarda la sesion
     *
     * @var string
     */
    public $sesion;
    /**
     * guarda el modelo
     *
     * @var string
     */
    protected $modelo;

    /**
     * Verifica que la sesion este iniciada para mostrar contenido
     *
     * @return void
     */
    public function __construct()
    {
        $this->modelo = $this->modelo("GastoModelo");

        $this->sesion = new Session();
        $this->sesion->iniciar();
        if ($this->sesion->get('email') == null) {
            redireccionar("/login");
        }
    }

    /**
     * Muestra la vista (Gastos)
     *
     * @return void
     */
    public function index()
    {
        $resultado = $this->modelo->mostrarGastos();
        $datos = [
            "gastos" => $resultado
        ];

        $this->vista("paginas/gastos", $datos);
    }

    /**
     * Recibe los datos de la vista para mandarsela al modelo e insertar en la BD
     *
     * @return void
     */
    public function registrar()
    {
        $nit = $this->modelo("EmpresaModelo")->nitEmpresa($this->sesion->get('email'));
        $datos = [
            "fecha" => $_POST['fecha'],
            "cantidad" => $_POST['cantidad'],
            "descripcion" => $_POST['descripcion'],
            "nit" => $nit
        ];

        $this->modelo->registrarGasto($datos);
    }

    /**
     * Recibe el id para consultar los datos y mostrarlos en la vista de editar
     *
     * @param  int $id
     * @return void
     */
    public function editar($id)
    {
        $resultado = $this->modelo->verGasto($id);

        $datos = [
            "id" => $resultado['id_gasto'],
            "fecha" => $resultado['fecha'],
            "descripcion" => $resultado['descripcion'],
            "cantidad" => $resultado['cantidad']
        ];

        $this->vista("paginas/gastosEditar", $datos);
    }

    /**
     * Recibe los datos de la vista editar los manda el modelo para actualizar los datos
     *
     * @return void
     */
    public function actualizar()
    {
        $datos = [
            "id" => $_POST['id'],
            "fecha" => $_POST['fecha'],
            "cantidad" => $_POST['cantidad'],
            "descripcion" => $_POST['descripcion']
        ];

        $this->modelo->actualizarGasto($datos);
    }

    /**
     * Recibe un id para luego eliminar dicho registro en la DB
     *
     * @param  int $id
     * @return void
     */
    public function eliminar($id)
    {
        $this->modelo->eliminarGasto($id);
    }
}
