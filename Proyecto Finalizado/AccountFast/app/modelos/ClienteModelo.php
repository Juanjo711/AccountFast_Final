<?php

/**
 *  Clase ClienteModelo
 */
class ClienteModelo
{
    /**
     * guarda la conexion con la bd
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
     * Registra un nuevo cliente
     *
     * @param  array $cliente
     * @return void
     */
    public function registrarCliente($cliente = [])
    {
        $sql = "INSERT INTO tbl_cliente(doc_cliente, nomb_cliente, tel_cliente, correo_cliente) VALUES
                ('" . $cliente['id'] . "','" . $cliente['nombre'] . "','" . $cliente['telefono'] . "','" . $cliente['correo'] . "')";

        $query = mysqli_query($this->db, $sql);

        if ($query) {
            echo "<script>alert('Cliente registrado')</script>";
            redireccionar("/clientes");
        } else {
            echo "<script>alert('ERROR: Al registar cliente')</script>";
        }
    }

    /**
     * Muestra todos los clientes que hay en la bd
     *
     * @return array
     */
    public function mostrarClientes()
    {
        $sql = "SELECT * FROM tbl_cliente";
        $query = mysqli_query($this->db, $sql);

        if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_array($query)) {
                $resultado[] = $row;
            }
            return $resultado;
        } else {
            return "";
        }
    }

    /**
     * Elimina un cliente
     *
     * @param  int $id
     * @return void
     */
    public function eliminarCliente($id)
    {
        $sql = "DELETE FROM tbl_cliente WHERE doc_cliente='$id'";
        $query = mysqli_query($this->db, $sql);

        if ($query) {
            echo "<script>alert('Cliente eliminado')</script>";
            redireccionar("/clientes");
        } else {
            echo "<script>alert('No se pudo eliminar este cliente por que está asociado a una Factura.')</script>";
            redireccionar("/clientes");
        }
    }

    /**
     * Muestra un solo cliente
     *
     * @param  int $id
     * @return array
     */
    public function verCliente($id)
    {
        $sql = "SELECT * FROM tbl_cliente WHERE doc_cliente='$id'";
        $query = mysqli_query($this->db, $sql);

        $resultado = mysqli_fetch_array($query);

        return $resultado;
    }

    /**
     * Actualiza los datos de un cliente
     *
     * @param  array $cliente
     * @return void
     */
    public function actualizarCliente($cliente = [])
    {
        $sql = "UPDATE tbl_cliente SET nomb_cliente='" . $cliente['nombre'] . "', tel_cliente='" . $cliente['telefono'] . "', correo_cliente='" . $cliente['correo'] . "' WHERE doc_cliente='" . $cliente['id'] . "'";

        $query = mysqli_query($this->db, $sql);

        if ($query) {
            echo "<script>alert('Cliente Actualizado')</script>";
            redireccionar("/clientes");
        } else {
            echo "<script>alert('ERROR: Al actualizar cliente')</script>";
        }
    }
}
