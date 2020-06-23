<?php

/**
 * Clase GastoModelo
 */
class GastoModelo
{
    /**
     * Guarda la conexion con la bd
     *
     * @var object
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
     * Muestra todos los gastos
     *
     * @return array
     */
    public function mostrarGastos()
    {
        $sql = "SELECT * FROM tbl_gasto";
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
     * Muestra un unico gasto segun el id
     *
     * @param  int $id
     * @return array
     */
    public function verGasto($id)
    {
        $sql = "SELECT * FROM tbl_gasto WHERE id_gasto = '$id'";
        $query = mysqli_query($this->db, $sql);

        $resultado = mysqli_fetch_assoc($query);

        return $resultado;
    }

    /**
     * Registra un gasto
     *
     * @param  array $gasto
     * @return void
     */
    public function registrarGasto($gasto = [])
    {
        $sql = "INSERT INTO tbl_gasto(fecha, descripcion, cantidad, nit) VALUES
                ('" . $gasto['fecha'] . "','" . $gasto['descripcion'] . "','" . $gasto['cantidad'] . "','" . $gasto['nit'] . "')";
        $query = mysqli_query($this->db, $sql);

        if ($query) {
            echo "<script>alert('Gasto registrado')</script>";
            redireccionar("/gastos");
        } else {
            echo "<script>alert('ERROR: Al registar gasto')</script>";
        }
    }

    /**
     * Actualiza un gasto
     *
     * @param  array $gasto
     * @return void
     */
    public function actualizarGasto($gasto = [])
    {
        $sql = "UPDATE tbl_gasto SET fecha = '" . $gasto['fecha'] . "', descripcion = '" . $gasto['descripcion'] . "', cantidad = '" . $gasto['cantidad'] . "' WHERE id_gasto = '" . $gasto['id'] . "'";
        $query = mysqli_query($this->db, $sql);

        if ($query) {
            echo "<script>alert('Gasto Actualizado')</script>";
            redireccionar("/gastos");
        } else {
            echo "<script>alert('ERROR: Al actualizar gasto')</script>";
        }
    }

    /**
     * Elimina un gasto segun su id
     *
     * @param  int $id
     * @return void
     */
    public function eliminarGasto($id)
    {
        $sql = "DELETE FROM tbl_gasto WHERE id_gasto = '$id'";
        mysqli_query($this->db, $sql);
        redireccionar("/gastos");
    }

    /**
     * Muestra el total de gastos
     *
     * @return int
     */
    public function totalGastos()
    {
        $sql = "SELECT SUM(cantidad) as total FROM tbl_gasto";
        $query = mysqli_query($this->db, $sql);

        $resultado = mysqli_fetch_assoc($query);

        return $resultado;
    }

    /**
     * Muestra el total de gastos por cada mes
     *
     * @param  int $a
     * @return array
     */
    public function totalMes($año)
    {

        $enero = mysqli_fetch_assoc(mysqli_query($this->db, "SELECT SUM(cantidad) as Total FROM tbl_gasto WHERE MONTH(fecha)=1 AND YEAR(fecha)= '$año'"));
        $febrero = mysqli_fetch_assoc(mysqli_query($this->db, "SELECT SUM(cantidad) as Total FROM tbl_gasto WHERE MONTH(fecha)=2 AND YEAR(fecha)= '$año'"));
        $marzo = mysqli_fetch_assoc(mysqli_query($this->db, "SELECT SUM(cantidad) as Total FROM tbl_gasto WHERE MONTH(fecha)=3 AND YEAR(fecha)= '$año'"));
        $abril = mysqli_fetch_assoc(mysqli_query($this->db, "SELECT SUM(cantidad) as Total FROM tbl_gasto WHERE MONTH(fecha)=4 AND YEAR(fecha)= '$año'"));
        $mayo = mysqli_fetch_assoc(mysqli_query($this->db, "SELECT SUM(cantidad) as Total FROM tbl_gasto WHERE MONTH(fecha)=5 AND YEAR(fecha)= '$año'"));
        $junio = mysqli_fetch_assoc(mysqli_query($this->db, "SELECT SUM(cantidad) as Total FROM tbl_gasto WHERE MONTH(fecha)=6 AND YEAR(fecha)= '$año'"));
        $julio = mysqli_fetch_assoc(mysqli_query($this->db, "SELECT SUM(cantidad) as Total FROM tbl_gasto WHERE MONTH(fecha)=7 AND YEAR(fecha)= '$año'"));
        $agosto = mysqli_fetch_assoc(mysqli_query($this->db, "SELECT SUM(cantidad) as Total FROM tbl_gasto WHERE MONTH(fecha)=8 AND YEAR(fecha)= '$año'"));
        $septiembre = mysqli_fetch_assoc(mysqli_query($this->db, "SELECT SUM(cantidad) as Total FROM tbl_gasto WHERE MONTH(fecha)=9 AND YEAR(fecha)= '$año'"));
        $octubre = mysqli_fetch_assoc(mysqli_query($this->db, "SELECT SUM(cantidad) as Total FROM tbl_gasto WHERE MONTH(fecha)=10 AND YEAR(fecha)= '$año'"));
        $noviembre = mysqli_fetch_assoc(mysqli_query($this->db, "SELECT SUM(cantidad) as Total FROM tbl_gasto WHERE MONTH(fecha)=11 AND YEAR(fecha)= '$año'"));
        $diciembre = mysqli_fetch_assoc(mysqli_query($this->db, "SELECT SUM(cantidad) as Total FROM tbl_gasto WHERE MONTH(fecha)=12 AND YEAR(fecha)= '$año'"));

        $data = array(
            12  => round($enero['Total'], 1),
            13  => round($febrero['Total'], 1),
            14  => round($marzo['Total'], 1),
            15  => round($abril['Total'], 1),
            16  => round($mayo['Total'], 1),
            17  => round($junio['Total'], 1),
            18  => round($julio['Total'], 1),
            19  => round($agosto['Total'], 1),
            20  => round($septiembre['Total'], 1),
            21 => round($octubre['Total'], 1),
            22 => round($noviembre['Total'], 1),
            23 => round($diciembre['Total'], 1)
        );

        return $data;
    }
}
