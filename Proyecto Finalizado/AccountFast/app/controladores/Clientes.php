<?php

/**
 * Controlador de la clase Clientes se encarga de recibir los datos que vienen de las vistas
 * y enviarlo al modelo Cliente hereda de la clase Controlador
 */
class Clientes extends Controlador
{
    /**
     * guarda la variable de sesion del usuario
     *
     * @var string
     */
    public $sesion;
    /**
     * guarda el modelo de la clase
     *
     * @var string
     */
    protected $modelo;

    /**
     * Verefica que la sesion este iniciada para mostrar contenido
     *
     * @return void
     */
    public function __construct()
    {
        // Se guarda el modelo que se va a usar en el atributo modelo
        $this->modelo = $this->modelo("ClienteModelo");

        // Se instancia la clase sesion
        $this->sesion = new Session();
        // Se inician las sesiones
        $this->sesion->iniciar();
        // Se valida que la sesion exista
        if ($this->sesion->get('email') == null) {
            redireccionar("/login");
        }
    }

    /**
     * Muestra la vista Clientes
     *
     * @return void
     */
    public function index()
    {
        // Trae un array del modelo cliente con todos los clientes registrados
        $resultado = $this->modelo->mostrarClientes();
        // Guarda los datos que se trajeron en el array datos, en la posicion clientes
        $datos = [
            "clientes" => $resultado
        ];
        // Se llama la vista y se le pasan los clientes en el array datos
        $this->vista("paginas/cliente", $datos);
    }

    /**
     * Envia los datos que se traen desde la vista al modelo Cliente metodo registrarCliente
     *
     * @return void
     */
    public function registrar()
    {
        // Se hace un array con los todos los datos que se traen de la vista para ser usados en el modelo
        $datos = [
            "id"       => $_POST['id_cliente'],
            "nombre"   => $_POST['nombre'],
            "telefono" => $_POST['telefono'],
            "correo"   => $_POST['correo']
        ];

        // Se mandan los datos el metodo registrarCliente
        $this->modelo->registrarCliente($datos);
    }

    /**
     * Recibe un id el cual se manda al modelo para eliminar un dato de la BD
     *
     * @param  int $id
     * @return void
     */
    public function eliminar($id)
    {
        $this->modelo->eliminarCliente($id);
    }

    /**
     * Recibe un id para consultar los datos y luego mostrarlos en la vista de editar
     *
     * @param  int $id
     * @return void
     */
    public function editar($id)
    {
        // Consulta los datos de un cliente por su id
        $resultado =  $this->modelo->verCliente($id);
        // se hace un arreglo con los datos que nos trajo
        $datos = [
            "id"       => $resultado['doc_cliente'],
            "nombre"   => $resultado['nomb_cliente'],
            "telefono" => $resultado['tel_cliente'],
            "correo"   => $resultado['correo_cliente']
        ];
        // Se mandan esos datos a la vista de editar
        $this->vista("paginas/clienteEditar", $datos);
    }

    /**
     * Recibe los datos que se quieren editar y se mandan al modelo para hacer la actualizacion
     *
     * @return void
     */
    public function actualizar()
    {
        // Se guardan todos los datos en un array
        $datos = [
            "id"       => $_POST['id_cliente'],
            "nombre"   => $_POST['nombre'],
            "telefono" => $_POST['telefono'],
            "correo"   => $_POST['correo']
        ];
        // Se mandan esos datos al modelo metodo actualizarCliente
        $this->modelo->actualizarCliente($datos);
    }
}
