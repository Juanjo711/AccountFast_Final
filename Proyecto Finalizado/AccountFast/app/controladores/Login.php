<?php

/**
 * Clase Login hereda de la clase Controlador
 */
class Login extends Controlador
{

    /**
     * guarda el modelo administrador
     *
     * @var string
     */
    protected $administrador;
    /**
     * guarda el modelo empresa
     *
     * @var string
     */
    protected $empresa;
    /**
     * guarda la sesion
     *
     * @var string
     */
    public    $sesion;

    /**
     * Verifica que la sesion este iniciada para mostrar el contenido
     *
     * @return void
     */
    public function __construct()
    {
        $this->administrador = $this->modelo("AdministradorModelo");
        $this->empresa = $this->modelo("EmpresaModelo");

        $this->sesion = new Session();
        $this->sesion->iniciar();
        if ($this->sesion->get('email') == !null) {
            redireccionar("/inicio");
        }
    }

    /**
     * Muestra la vista (login)
     *
     * @return void
     */
    public function index()
    {
        $this->vista("paginas/login");
    }

    /**
     * Recibe los datos del administrador y de empresa para luego enviarlos a sus respectivos modelos
     *
     * @return void
     */
    public function registrar()
    {
        $datos = [
            'documento' => $_POST['documento'],
            'nombre'    => $_POST['nombre'],
            'apellido'  => $_POST['apellido'],
            'correo'    => $_POST['correo'],
            'clave1'    => $_POST['clave1'],
            'clave2'    => $_POST['clave2']
        ];

        $datos2 = [
            'nit'            => $_POST['nit'],
            'nom_empresa'    => $_POST['nom_empresa'],
            'correo_empresa' => $_POST['correo_empresa'],
            'telefono'       => $_POST['telefono'],
            'direccion'      => $_POST['direccion'],
            'documento'      => $_POST['documento']
        ];


        $this->administrador->registrarAdministrador($datos);
        $this->empresa->registrarempresa($datos2);
    }

    /**
     * Valida que los datos que se ingresan son correctos para iniciar sesion
     *
     * @return void
     */
    public function iniciarSesion()
    {
        $correo = $_POST['correo'];
        $clave  = $_POST['clave'];

        if ($this->administrador->iniciarSesion($correo, $clave) == true) {
            $nom_empresa = $this->empresa->nombreEmpresa($correo);
            $this->sesion->add('empresa', $nom_empresa);
            $this->sesion->add('email', $correo);
            echo "1";
        } else {
            echo "error";
        }
    }

    /**
     * Cierra la sesion
     *
     * @return void
     */
    public function cerrarSesion()
    {
        $this->sesion->iniciar();
        $this->sesion->close();
        redireccionar("/login");
    }
    
    /**
     * Recibe el coreo del usuario y lo manda al modelo para validar que sea correcto
     *
     * @return void
     */
    public function recuperarPass(){
        $correo = $_POST['correo'];

        $this->administrador->recuperarPass($correo);
    }
    
    /**
     * Valida que el codigo de recuperacion que se envio al correo sea correcto para 
     * permitir el cambio de contraseña
     *
     * @param  string $codigo
     * @return void
     */
    public function restablecerPassword($codigo = NULL){
        if ($codigo != NULL){
            $respuesta = $this->administrador->validarCodigo($codigo);
            if ($respuesta == true){
                $datos = [
                    "codigo" => $codigo
                ];
                $this->vista('paginas/recuperarPass', $datos);
            }else{
                redireccionar('/login');
            }
        }else{
            redireccionar('/login');
        }
    }
    
    /**
     * Recibe el codigo de recuperacion y la nueva contraseña para enviarlos al modelo metodo cambiarPassword
     *
     * @return void
     */
    public function cambiarPassword(){
        $codigo = $_POST['codigo'];
        $clave1 = $_POST['clave1'];
        $clave2 = $_POST['clave2'];

        $this->administrador->cambiarPassword($codigo, $clave1, $clave2);
    }
}
