<?php

/**
 * Clase Perfil hereda de la clase Controlador
 */
class Perfil extends Controlador
{
    /**
     * guarda sesion
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
     * Valida que la sesion este iniciada
     *
     * @return void
     */
    public function __construct()
    {
        $this->modelo = $this->modelo("AdministradorModelo");

        $this->sesion = new Session();
        $this->sesion->iniciar();
        if ($this->sesion->get('email') == null) {
            redireccionar("/login");
        }
    }

    /**
     * Muestra la vista (EditarPerfil) y trae los datos de la empresa y el administrador
     *
     * @return void
     */
    public function index()
    {
        $resultado = $this->modelo->mostrarAdministrador($this->sesion->get("email"));
        $datos = [
            "doc"            => $resultado['doc_administrador'],
            "nombre"         => $resultado['nom_administrador'],
            "apellido"       => $resultado['ape_administrador'],
            "correo"         => $resultado['correo_administrador'],
            "nit"            => $resultado['nit'],
            "nom_empresa"    => $resultado['nombre'],
            "direccion"      => $resultado['direccion'],
            "telefono"       => $resultado['telefono'],
            "correo_empresa" => $resultado['correo']
        ];

        $this->vista("paginas/perfil", $datos);
    }

    /**
     * Recibe los datos que se cambiaron y los manda a los modelos (Empresa y Administrador) para ser actualizados
     *
     * @return void
     */
    public function actualizar()
    {
        $administrador = [
            'documento' => $_POST['documento'],
            'nombre'    => $_POST['nombre'],
            'apellido'  => $_POST['apellido'],
            'correo'    => $_POST['correo'],
            'clave1'    => $_POST['clave1'],
            'clave2'    => $_POST['clave2']
        ];

        $empresa = [
            'nit'         => $_POST['nit'],
            'nom_empresa'    => $_POST['nom_empresa'],
            'correo_empresa' => $_POST['correo_empresa'],
            'telefono'    => $_POST['telefono'],
            'direccion'   => $_POST['direccion'],
            'documento'   => $_POST['documento']
        ];

        $this->modelo->actualizarAdministrador($administrador);
        $this->modelo("EmpresaModelo")->actualizarEmpresa($empresa);
    }
}
