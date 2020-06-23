<?php

/**
 * Proveedor
 */
class Proveedor extends Controlador
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
     * Verifica que la sesion este iniciada para mostrar el contenido
     *
     * @return void
     */
    public function __construct()
    {
        $this->modelo = $this->modelo("ProveedorModelo");

        $this->sesion = new Session();
        $this->sesion->iniciar();
        if ($this->sesion->get('email') == null) {
            redireccionar("/login");
        }
    }

    /**
     * Muestra la vista (Proveedores) y los datos que se usaran en ella.
     *
     * @return void
     */
    public function index()
    {
        $proveedores = $this->modelo->mostrarProveedores();

        $datos = [
            "proveedores" => $proveedores
        ];

        $this->vista("paginas/proveedor", $datos);
    }

    /**
     * Recibe los datos de la vista y los manda al modelo
     *
     * @return void
     */
    public function registrar()
    {
        $datos = [
            "id"          => $_POST['id_proveedor'],
            "tipo"        => $_POST['tipo'],
            "nombre"      => $_POST['nombrep'],
            "telefono"    => $_POST['tel'],
            "correo"      => $_POST['email'],
            "descripcion" => $_POST['desc']
        ];

        $this->modelo->registrarProveedor($datos);
    }

    /**
     * Recibe un id el cual se envia al modelo para eliminar un dato
     *
     * @param  int $id
     * @return void
     */
    public function eliminar($id)
    {
        $this->modelo->eliminarProveedor($id);
    }

    /**
     * Recibe un id para consultar un proveedor y mostrar sus datos en la vista de editar
     *
     * @param  int $id
     * @return void
     */
    public function editar($id)
    {
        $proveedor = $this->modelo->verProveedor($id);

        $datos = [
            "id"       => $proveedor['id_proveedor'],
            "tipo"     => $proveedor['tipo_proveedor'],
            "nombre"   => $proveedor['nomb_proveedor'],
            "telefono" => $proveedor['tel_proveedor'],
            "correo"   => $proveedor['correo_proveedor'],
            "descripcion" => $proveedor['descripcion']
        ];

        $this->vista("paginas/proveedorEditar", $datos);
    }

    /**
     * Recibe los datos que se cambiaron y los manda al modelo para editarlos
     *
     * @return void
     */
    public function actualizar()
    {
        $datos = [
            "id"          => $_POST['id_proveedor'],
            "tipo"        => $_POST['tipo'],
            "nombre"      => $_POST['nombrep'],
            "telefono"    => $_POST['tel'],
            "correo"      => $_POST['email'],
            "descripcion" => $_POST['desc']
        ];

        $this->modelo->actualizarProveedor($datos);
    }
}
