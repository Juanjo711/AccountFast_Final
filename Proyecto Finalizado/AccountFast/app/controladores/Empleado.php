<?php

/**
 * Controlador de Empleado extiende de la Clase Controlador
 */
class Empleado extends Controlador
{
    /**
     * guarda la sesion
     *
     * @var string
     */
    public $sesion;
    /**
     * guarda el modelo Empleado
     *
     * @var string
     */
    protected $modelo;

    /**
     * Valida que la sesion este iniciada para dar acceso al contenido
     *
     * @return void
     */
    public function __construct()
    {
        $this->modelo = $this->modelo("EmpleadoModelo");

        $this->sesion = new Session();
        $this->sesion->iniciar();
        if ($this->sesion->get('email') == null) {
            redireccionar("/login");
        }
    }

    /**
     * Muestra la vista (Empleado) y los datos que se usaran dentro de esta
     *
     * @return void
     */
    public function index()
    {
        $empleado = $this->modelo->mostrarEmpleados();

        $datos = [
            "empleados" => $empleado
        ];

        $this->vista("paginas/empleado", $datos);
    }

    /**
     * Manda los datos que recibe de la vista al modelo donde se hara la insercion en la BD
     *
     * @return void
     */
    public function registrar()
    {
        $nit = $this->modelo("EmpresaModelo")->nitEmpresa($this->sesion->get('email'));
        $datos = [
            "id"       => $_POST['id_empleado'],
            "nombre"   => $_POST['nombre'],
            "apellido" => $_POST['apellido'],
            "telefono" => $_POST['telefono'],
            "correo"   => $_POST['correo'],
            "cargo"    => $_POST['cargo'],
            "nit"      => $nit

        ];
        $this->modelo->registrarEmpleado($datos);
    }

    /**
     * 
     * Recibe un id para hacer una consulta en la BD y luego mostrar los datos en la vista editar
     * @param  int $id
     * @return void
     */
    public function editar($id)
    {
        $resultado = $this->modelo->verEmpleado($id);
        $datos = [
            "id"       => $resultado['doc_empleado'],
            "nombre"   => $resultado['nomb_empleado'],
            "apellido" => $resultado['ape_empleado'],
            "telefono" => $resultado['tel_empleado'],
            "correo"   => $resultado['correo_empleado'],
            "cargo"    => $resultado['cargo_empleado']
        ];

        $this->vista("paginas/EmpleadoEditar", $datos);
    }

    /**
     * Recibe los datos de la vista editar luego se mandan al modelo y se actualizan los datos 
     *
     * @return void
     */
    public function actualizar()
    {
        $datos = [
            "id"       => $_POST['id_empleado'],
            "nombre"   => $_POST['nombre'],
            "apellido" => $_POST['apellido'],
            "telefono" => $_POST['telefono'],
            "correo"   => $_POST['correo'],
            "cargo"    => $_POST['cargo']

        ];
        $this->modelo->actualizarEmpleado($datos);
    }

    /**
     * recibe el id del registro que se quiere eliminar
     *
     * @param  int $id
     * @return void
     */
    public function eliminar($id)
    {
        $this->modelo->eliminarEmpleado($id);
    }
}
