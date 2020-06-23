<?php

// Se hace uso de las clases de la libreria phpmailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
 *  Clase AdministradorModelo contiene todos los metodos que manejan la informacion del administrador
 */
class AdministradorModelo
{
    /**
     * guarda la conexion a la base de datos
     *
     * @var object
     */
    private $db;

    /**
     * metodo constructor guarda la conexion con la base de datos
     *
     * @return object
     */
    public function __construct()
    {
        // ejecuta el metodo conectar de la clase Conexion
        $this->db = Conexion::conectar();
    }

    /**
     * Esta funcion muestra los datos del administrador y empresa
     *
     * @param  string $correo
     * @return array
     */
    public function mostrarAdministrador($correo)
    {
        $sql = "SELECT * FROM tbl_administrador
                INNER JOIN tbl_empresa ON tbl_administrador.doc_administrador = tbl_empresa.doc_administrador
                WHERE tbl_administrador.correo_administrador = '$correo' ";

        $query = mysqli_query($this->db, $sql);
        $resultado = mysqli_fetch_assoc($query);
        return $resultado;
    }

    /**
     * Registra un administrador y valida que las contraseñas sean iguales y que el correo sea unico
     *
     * @param  mixed $administrador
     * @return void
     */
    public function registrarAdministrador($administrador = [])
    {
        $verificar = mysqli_query($this->db, "SELECT correo_administrador FROM tbl_administrador WHERE correo_administrador='" . $administrador['correo'] . "'");

        if (mysqli_num_rows($verificar) > 0) {
            echo "<script>alert(' ERROR: El Correo ya está registrado')</script>";
            echo "<script>window.history.go(-1)</script>";
        } else {
            if ($administrador['clave1'] == $administrador['clave2']) {
                $clave = md5($administrador['clave1']);

                $sql = "INSERT INTO tbl_administrador (doc_administrador, nom_administrador, ape_administrador, correo_administrador,clave) VALUES
                ('" . $administrador['documento'] . "','" . $administrador['nombre'] . "','" . $administrador['apellido'] . "','" . $administrador['correo'] . "','" . $clave . "')";

                mysqli_query($this->db, $sql);
                echo "<script>alert('Registro exitoso')</script>";
                redireccionar("/login");
            } else {
                echo "<script>alert('Las contraseñas no coinciden')</script>";
                echo "<script>window.history.go(-1)</script>";
            }
        }
    }

    /**
     * Actualiza los datos del administrador y compara que al cambiar la contraseña las contraseñas coincidan
     *
     * @param  array $administrador
     * @return void
     */
    public function actualizarAdministrador($administrador = [])
    {
        if ($administrador['clave1'] == "" && $administrador['clave2'] == "") {
            $sql = "UPDATE tbl_administrador SET nom_administrador='" . $administrador['nombre'] . "', ape_administrador='" . $administrador['apellido'] . "',correo_administrador='" . $administrador['correo'] . "' WHERE doc_administrador='" . $administrador['documento'] . "'";
            mysqli_query($this->db, $sql);
        } else {
            if ($administrador['clave1'] == $administrador['clave2']) {
                $sql = "UPDATE tbl_administrador SET nom_administrador='" . $administrador['nombre'] . "', ape_administrador='" . $administrador['apellido'] . "',correo_administrador='" . $administrador['correo'] . "', clave='" . $administrador['clave1'] . "'  WHERE doc_administrador='" . $administrador['documento'] . "'";
                mysqli_query($this->db, $sql);
            } else {
                echo "<script>alert('Las contraseñas no coinciden')</script>";
                redireccionar("/perfil");
            }
        }
    }


    /**
     * Valida que los datos esten en la base de datos para iniciar sesion
     *
     * @param  string $correo
     * @param  string $clave
     * @return boolean
     */
    public function iniciarSesion($correo, $clave)
    {
        // Encripta la contraseña
        $newClave = md5($clave);
        $sql = "SELECT correo_administrador, clave FROM tbl_administrador WHERE correo_administrador='$correo' AND clave='$newClave'";

        $select = mysqli_query($this->db, $sql);

        if (mysqli_num_rows($select) > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Valida que el correo exista en la base de datos para enviar el codigo de recuperacion
     * y luego en el correo para restablecer la contraseña
     *
     * @param  string $correo
     * @return void
     */
    public function recuperarPass($correo)
    {
        $sql = "SELECT * FROM tbl_administrador WHERE correo_administrador = '$correo'";
        $query = mysqli_query($this->db, $sql);

        // Verifica que el correo exista
        if (mysqli_num_rows($query) > 0) {
            // Por medio de la funcion md5 se crea un codigo unico de 32 caracteres
            $codigo = substr(md5(time()), 0, 16);
            $actualizar = "UPDATE tbl_administrador SET codigo_recuperar = '$codigo' WHERE correo_administrador = '$correo'";
            $query2 = mysqli_query($this->db, $actualizar);
            if ($query2) {
                $this->enviarCorreo($correo, $codigo);
            } else {
                echo "ERROR al enviar codigo recuperar";
            }
        } else {
            echo "<script>alert('El correo electrónico no se encuentra registrado en el sistema')</script>";
            redireccionar('/login');
        }
    }

    /**
     * Verifica que el codigo de recuperacion de contraseña sea el mismo que se envio por correo
     *
     * @param  string $codigo
     * @return boolean
     */
    public function validarCodigo($codigo)
    {
        $sql = "SELECT * FROM tbl_administrador WHERE codigo_recuperar = '$codigo'";
        $query = mysqli_query($this->db, $sql);

        if (mysqli_num_rows($query) > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Permite el cambio de contraseña verificando el codigo de recuperacion 
     * y que las contraseñas sean inguales
     *
     * @param  string $codigo
     * @param  string $clave1
     * @param  string $clave2
     * @return void
     */
    public function cambiarPassword($codigo, $clave1, $clave2)
    {
        if ($clave1 == $clave2) {
            // Encripta la contraseña por medio de la funcion md5
            $newClave = md5($clave1);
            $sql = "UPDATE tbl_administrador SET clave = '$newClave' WHERE codigo_recuperar = '$codigo'";
            $query = mysqli_query($this->db, $sql);
            if ($query) {
                echo "<script>alert('Contraseña actualizada con exito')</script>";
                redireccionar('/login');
            } else {
                echo "<script>alert('Error al actualizar contraseña')</script>";
                redireccionar('/login');
            }
        } else {
            echo "<script>alert('Las contraseñas no coinciden')</script>";
            echo "<script>window.history.go(-1)</script>";
        }
    }

    /**
     * Usando la libreria phpmailer se envia un correo de gmail al usuario que olvido
     * su contraseña para que pueda recuperarla
     *
     * @param  string $correo
     * @param  string $codigo
     * @return void
     */
    public function enviarCorreo($correo, $codigo)
    {

        $mail = new PHPMailer(true);
        // Permite caracteres especiales como ñ y tildes
        $mail->CharSet = 'UTF-8';

        try {
            //Configuracion del SMTP
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';            // Host de gmail por el cual se enviaran los correos
            $mail->SMTPAuth   = true;                       // Activa la autenticacion de SMTP
            $mail->Username   = 'accfast00@gmail.com';     // Correo desde el cual se envian los correos
            $mail->Password   = 'accountfast01';          // Contraseña del correo
            $mail->SMTPSecure = 'tls';                   // Activa la encriptacion tls
            $mail->Port       = 587;                    // Puerto de conexion

            // Desde donde se enviara el correo
            $mail->setFrom('accfast00@gmail.com', 'AccountFast');
            $mail->addAddress($correo);

            // Conenido del correo
            $mail->isHTML(true);
            $mail->Subject = 'Recuperar Contraseña - Cuenta AccountFast';
            $mail->Body    = '
            <b>Hola!</b>
            <p>Recientemente solicitó restablecer su contraseña para su cuenta de AccountFast. Use el enlace de abajo para cambiar su contraseña</p>
            <a href=' . RUTA_URL . '/login/restablecerPassword/' . $codigo . '>Recuperar Contraseña</a>
            <br><br>
            Gracias, <br>
            Equipo de AccountFast
            ';

            // Metodo de envio
            $mail->send();
            echo "<script>alert('Se ha enviado un correo electrónico con las instrucciones para restablecer su contraseña')</script>";
            redireccionar('/login');
        } catch (Exception $e) {
            echo "El mensaje no pudo ser enviado. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
