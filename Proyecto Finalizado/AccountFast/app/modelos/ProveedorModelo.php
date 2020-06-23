<?php

/**
 * Clase ProveedorModelo
 */
class ProveedorModelo
{
    /**
     * Guarda la conexion con la bd
     *
     * @var mixed
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
     * Muestra todos los proveedores
     *
     * @return array
     */
    public function mostrarProveedores()
    {
        $sql = "SELECT * FROM tbl_proveedor";
        $query = mysqli_query($this->db, $sql);

        if (mysqli_num_rows($query) > 0) {

            while ($row = mysqli_fetch_assoc($query)) {
                $resultado[] = $row;
            }

            return $resultado;
        } else {
            return $query;
        }
    }

    /**
     * Muestra un proveedor segun su id
     *
     * @param  int $id
     * @return array
     */
    public function verProveedor($id)
    {
        $sql = "SELECT * FROM tbl_proveedor WHERE id_proveedor='$id'";
        $query = mysqli_query($this->db, $sql);

        $resultado = mysqli_fetch_assoc($query);

        return $resultado;
    }

    /**
     * Registra un proveedor
     *
     * @param  array $proveedor
     * @return void
     */
    public function registrarProveedor($proveedor = [])
    {
        $sql = "INSERT INTO tbl_proveedor (id_proveedor,tipo_proveedor,nomb_proveedor,tel_proveedor,correo_proveedor,descripcion)
                VALUES ('" . $proveedor['id'] . "', '" . $proveedor['tipo'] . "','" . $proveedor['nombre'] . "','" . $proveedor['telefono'] . "','" . $proveedor['correo'] . "','" . $proveedor['descripcion'] . "')";
        $query = mysqli_query($this->db, $sql);

        if ($query) {
            echo "<script>alert('Proveedor Registrado')</script>";
            redireccionar("/proveedor");
        } else {
            echo "ERROR";
            redireccionar("/proveedor");
        }
    }

    /**
     * Actualiza los datos de un proveedor
     *
     * @param  array $proveedor
     * @return void
     */
    public function actualizarProveedor($proveedor = [])
    {
        $sql = "UPDATE tbl_proveedor SET tipo_proveedor='" . $proveedor['tipo'] . "', nomb_proveedor='" . $proveedor['nombre'] . "', tel_proveedor='" . $proveedor['telefono'] . "', correo_proveedor='" . $proveedor['correo'] . "', descripcion='" . $proveedor['descripcion'] . "' WHERE id_proveedor='" . $proveedor['id'] . "'";
        $query = mysqli_query($this->db, $sql);

        if ($query) {
            echo "<script>alert('Proveedor Actualizado')</script>";
            redireccionar("/proveedor");
        } else {
            echo "<script>alert('ERROR: Al actualizar proveedor')</script>";
        }
    }

    /**
     * Elimina un proveedor segun su id
     *
     * @param  int $id
     * @return void
     */
    public function eliminarProveedor($id)
    {
        $sql = "DELETE FROM tbl_proveedor WHERE id_proveedor='$id'";
        $query = mysqli_query($this->db, $sql);

        if ($query) {
            echo "<script>alert('Proveedor eliminado')</script>";
            redireccionar("/proveedor");
        } else {
            echo "<script>alert('No se puede eliminar este proveedor ya que está asociado a uno o varios productos')</script>";
            redireccionar("/proveedor");
        }
    }

    /**
     * Muestra solo los proveedores de productos
     *
     * @return array
     */
    public function proveedorProducto()
    {
        $sql = "SELECT id_proveedor,nomb_proveedor FROM tbl_proveedor WHERE tipo_proveedor = 'Proveedor de productos' ";
        $query = mysqli_query($this->db, $sql);

        if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                $resultado[] = $row;
            }
            return $resultado;
        } else {
            return "";
        }
    }
}
