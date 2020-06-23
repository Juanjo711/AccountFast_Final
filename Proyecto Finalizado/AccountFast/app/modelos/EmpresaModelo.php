<?php

/**
 * Clase EmpresaModelo
 */
class EmpresaModelo
{
    /**
     * Guarda la conexion con la bd
     *
     * @var string
     */
    private $db;

    /**
     * Ejecuta la conexion
     *
     * @return void
     */
    public function __construct()
    {
        $this->db = Conexion::conectar();
    }

    /**
     * Registra una empresa
     *
     * @param  array $empresa
     * @return void
     */
    public function registrarEmpresa($empresa = [])
    {
        $sql = "INSERT INTO tbl_empresa(nit,nombre,direccion,telefono,correo,doc_administrador) VALUES
        ('" . $empresa['nit'] . "','" . $empresa['nom_empresa'] . "','" . $empresa['direccion'] . "','" . $empresa['telefono'] . "','" . $empresa['correo_empresa'] . "','" . $empresa['documento'] . "')";

        $consulta = mysqli_query($this->db, "SELECT nit FROM tbl_empresa WHERE nit ='" . $empresa['nit'] . "'");

        if (mysqli_num_rows($consulta) > 0) {
            echo "<script>alert(' ERROR: El NIT ya está registrado')</script>";
            echo "<script>window.history.go(-1)</script>";
        } else {
            $query = mysqli_query($this->db, $sql);
            if ($query) {
                "<script>alert('Registro exitoso')</script>";
                redireccionar("/login");
            }
        }
    }

    /**
     * Actualiza los datos de una Empresa
     *
     * @param  array $empresa
     * @return void
     */
    public function actualizarEmpresa($empresa = [])
    {
        $sql = "UPDATE tbl_empresa SET nombre='" . $empresa['nom_empresa'] . "', direccion='" . $empresa['direccion'] . "', telefono='" . $empresa['telefono'] . "', correo='" . $empresa['correo_empresa'] . "' WHERE nit='" . $empresa['nit'] . "'";

        $query = mysqli_query($this->db, $sql);

        if ($query) {
            echo "<script>alert('Datos Actualizados')</script>";
            redireccionar("/perfil");
        } else {
            echo "<script>alert('ERROR: Al actualizar sus datos')</script>";
        }
    }

    /**
     * Muestra el nombre de la empresa segun el correo del administrador
     *
     * @param  string $correo
     * @return array
     */
    public function nombreEmpresa($correo)
    {
        $sql = "SELECT tbl_empresa.nombre FROM tbl_empresa
                INNER JOIN tbl_administrador ON tbl_empresa.doc_administrador = tbl_administrador.doc_administrador
                WHERE tbl_administrador.correo_administrador = '$correo'";
        $query = mysqli_query($this->db, $sql);

        $fila = mysqli_fetch_assoc($query);

        return $fila['nombre'];
    }

    /**
     * Muestra el nit de la empresa segun el correo del administrador
     *
     * @param  mixed $correo
     * @return array
     */
    public function nitEmpresa($correo)
    {
        $sql = "SELECT tbl_empresa.nit FROM tbl_empresa
                INNER JOIN tbl_administrador ON tbl_empresa.doc_administrador = tbl_administrador.doc_administrador
                WHERE tbl_administrador.correo_administrador = '$correo'";
        $query = mysqli_query($this->db, $sql);

        $fila = mysqli_fetch_assoc($query);

        return $fila['nit'];
    }
}
