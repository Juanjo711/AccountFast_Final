<?php

/**
 * EmpleadoModelo
 */
class EmpleadoModelo
{
    /**
     * guarda la conexion con la bd
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
     * Muestra un solo empleado segun su id
     *
     * @param  int $id
     * @return void
     */
    public function verEmpleado($id)
    {
        $sql = "SELECT * FROM tbl_empleado WHERE doc_empleado='$id'";
        $query = mysqli_query($this->db, $sql);

        $resultado = mysqli_fetch_assoc($query);
        return $resultado;
    }


    /**
     * Muestra todos los empleados
     *
     * @return array
     */
    public function mostrarEmpleados()
    {
        $sql = "SELECT * FROM tbl_empleado";
        $query = mysqli_query($this->db, $sql);

        if (mysqli_num_rows($query)) {
            while ($row = mysqli_fetch_assoc($query)) {
                $resultado[] = $row;
            }

            return $resultado;
        } else {
            return $query;
        }
    }

    /**
     * Registra un empleado
     *
     * @param  array $empleado
     * @return void
     */
    public function registrarEmpleado($empleado = [])
    {
        $sql = "INSERT INTO tbl_empleado(doc_empleado, nomb_empleado, ape_empleado, tel_empleado, correo_empleado, cargo_empleado, nit) 
                VALUES ('" . $empleado['id'] . "','" . $empleado['nombre'] . "','" . $empleado['apellido'] . "','" . $empleado['telefono'] . "','" . $empleado['correo'] . "','" . $empleado['cargo'] . "', '" . $empleado['nit'] . "')";
        $query = mysqli_query($this->db, $sql);

        if ($query) {
            echo "<script>alert('Empleado Agregado')</script>";
            redireccionar("/empleado");
        } else {
            echo "<script>alert('ERROR: Al agregar empleado')</script>";
        }
    }

    /**
     * Actualiza los datos de un empleado
     *
     * @param  array $empleado
     * @return void
     */
    public function actualizarEmpleado($empleado = [])
    {
        $sql = "UPDATE tbl_empleado SET nomb_empleado='" . $empleado['nombre'] . "', ape_empleado='" . $empleado['apellido'] . "' ,tel_empleado='" . $empleado['telefono'] . "' ,correo_empleado='" . $empleado['correo'] . "' ,cargo_empleado='" . $empleado['cargo'] . "' WHERE doc_empleado='" . $empleado['id'] . "'";

        $query = mysqli_query($this->db, $sql);

        if ($query) {
            echo "<script>alert('Empleado Actualizado')</script>";
            redireccionar("/empleado");
        } else {
            echo "<script>alert('ERROR: Al actualizar empleado')</script>";
        }
    }

    /**
     * Elimina un empleado segun su id
     *
     * @param  int $id
     * @return void
     */
    public function eliminarEmpleado($id)
    {
        $sql = "DELETE FROM tbl_empleado WHERE doc_empleado='$id'";
        $query = mysqli_query($this->db, $sql);

        if ($query) {
            echo "<script>alert('Empleado eliminado')</script>";
            redireccionar("/empleado");
        } else {
            echo "<script>alert('ERROR: Al eliminar empleado')</script>";
        }
    }
}
