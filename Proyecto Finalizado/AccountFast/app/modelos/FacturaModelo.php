<?php

/**
 * Clase FacturaModelo
 */
class FacturaModelo
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
     * Registra una nueva factura
     *
     * @param  string $factura
     * @return void
     */
    public function registrarFactura($factura = [])
    {

        if ($factura['plazo'] == 'De contado') {
            $estado = "PAGO";
        } else {
            $estado = "PENDIENTE";
        }

        $sql = "INSERT INTO tbl_factura(num_factura,fecha,plazo,vencimiento,estado,subtotal,descuento,total,doc_cliente) VALUES
                ('" . $factura['num_factura'] . "','" . $factura['fecha'] . "','" . $factura['plazo'] . "','" . $factura['vencimiento'] . "', '$estado', '" . $factura['subtotal'] . "','" . $factura['descuento'] . "','" . $factura['total'] . "', '" . $factura['cliente'] . "')";

        $query = mysqli_query($this->db, $sql);

        if ($query) {
            redireccionar("/factura");
        } else {
            die(mysqli_error($this->db));
        }
    }

    /**
     * Muestra todas las facturas y el nombre del cliente
     *
     * @return array
     */
    public function mostrarFacturas()
    {
        $sql = "SELECT * FROM tbl_factura INNER JOIN tbl_cliente on tbl_factura.doc_cliente = tbl_cliente.doc_cliente";
        $query = mysqli_query($this->db, $sql);

        if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_array($query)) {
                $resultado[] = $row;
            }
            return $resultado;
        } else {
            return $query;
        }
    }

    /**
     * Trae el numero de la ultima factura que se guardo
     *
     * @return array
     */
    public function numFactura()
    {
        $sql = "SELECT num_factura FROM tbl_factura ORDER BY num_factura DESC LIMIT 1";
        $query = mysqli_query($this->db, $sql);

        $inicio = [
            "num_factura" => 0
        ];

        $fila = mysqli_fetch_array($query);


        if (mysqli_num_rows($query) > 0) {
            return $fila;
        } else {
            return $inicio;
        }
    }

    /**
     * Actualiza el estado de una factura
     * 
     * @param  int $id
     * @return void
     */
    public function actualizarEstado($id)
    {
        $sql = "UPDATE tbl_factura SET estado='PAGO' WHERE num_factura='$id'";
        $query = mysqli_query($this->db, $sql);

        if ($query) {
            redireccionar("/factura");
        } else {
            echo "<script>alert('Ocurrio un error')</script>";
        }
    }

    /**
     * Anula una factura segun su numero de factura
     *
     * @param  int $num_factura
     * @return void
     */
    public function anularFactura($num_factura)
    {
        $sql = "UPDATE tbl_factura SET estado='ANULADA' WHERE num_factura='$num_factura'";
        $query = mysqli_query($this->db, $sql);

        if ($query) {
            redireccionar("/factura");
        } else {
            echo "<script>alert('No fue posible anular la factura')</script>";
        }
    }


    /**
     * Muestra los productos que disponibles en la factura
     *
     * @return array
     */
    public function productoFactura()
    {
        $sql = "SELECT * FROM tbl_producto";
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

    /**
     * Muestra la suma del total del Facturas pagas
     *
     * @return int
     */
    public function totalVentas()
    {
        $sql = "SELECT SUM(total) as total from tbl_factura WHERE estado = 'PAGO'";
        $query = mysqli_query($this->db, $sql);

        $resultado = mysqli_fetch_assoc($query);
        return $resultado;
    }

    /**
     * Consulta el total de ventas por cada mes
     *
     * @param  int $a
     * @return array
     */
    public function totalMes($año)
    {
        $enero = mysqli_fetch_assoc(mysqli_query($this->db, "SELECT SUM(total) AS Total FROM tbl_factura WHERE estado = 'PAGO' AND MONTH(fecha)= 1 AND YEAR(fecha)='$año'"));
        $febrero = mysqli_fetch_assoc(mysqli_query($this->db, "SELECT SUM(total) AS Total FROM tbl_factura WHERE estado = 'PAGO' AND MONTH(fecha)= 2 AND YEAR(fecha)='$año'"));
        $marzo = mysqli_fetch_assoc(mysqli_query($this->db, "SELECT SUM(total) AS Total FROM tbl_factura WHERE estado = 'PAGO' AND MONTH(fecha)= 3 AND YEAR(fecha)='$año'"));
        $abril = mysqli_fetch_assoc(mysqli_query($this->db, "SELECT SUM(total) AS Total FROM tbl_factura WHERE estado = 'PAGO' AND MONTH(fecha)= 4 AND YEAR(fecha)='$año'"));
        $mayo = mysqli_fetch_assoc(mysqli_query($this->db, "SELECT SUM(total) AS Total FROM tbl_factura WHERE estado = 'PAGO' AND MONTH(fecha)= 5 AND YEAR(fecha)='$año'"));
        $junio = mysqli_fetch_assoc(mysqli_query($this->db, "SELECT SUM(total) AS Total FROM tbl_factura WHERE estado = 'PAGO' AND MONTH(fecha)= 6 AND YEAR(fecha)='$año'"));
        $julio = mysqli_fetch_assoc(mysqli_query($this->db, "SELECT SUM(total) AS Total FROM tbl_factura WHERE estado = 'PAGO' AND MONTH(fecha)= 7 AND YEAR(fecha)='$año'"));
        $agosto = mysqli_fetch_assoc(mysqli_query($this->db, "SELECT SUM(total) AS Total FROM tbl_factura WHERE estado = 'PAGO' AND MONTH(fecha)= 8 AND YEAR(fecha)='$año'"));
        $septiembre = mysqli_fetch_assoc(mysqli_query($this->db, "SELECT SUM(total) AS Total FROM tbl_factura WHERE estado = 'PAGO' AND MONTH(fecha)= 9 AND YEAR(fecha)='$año'"));
        $octubre = mysqli_fetch_assoc(mysqli_query($this->db, "SELECT SUM(total) AS Total FROM tbl_factura WHERE estado = 'PAGO' AND MONTH(fecha)= 10 AND YEAR(fecha)='$año'"));
        $noviembre = mysqli_fetch_assoc(mysqli_query($this->db, "SELECT SUM(total) AS Total FROM tbl_factura WHERE estado = 'PAGO' AND MONTH(fecha)= 11 AND YEAR(fecha)='$año'"));
        $diciembre = mysqli_fetch_assoc(mysqli_query($this->db, "SELECT SUM(total) AS Total FROM tbl_factura WHERE estado = 'PAGO' AND MONTH(fecha)= 12 AND YEAR(fecha)='$año'"));

        $data = array(
            0  => round($enero['Total'], 1),
            1  => round($febrero['Total'], 1),
            2  => round($marzo['Total'], 1),
            3  => round($abril['Total'], 1),
            4  => round($mayo['Total'], 1),
            5  => round($junio['Total'], 1),
            6  => round($julio['Total'], 1),
            7  => round($agosto['Total'], 1),
            8  => round($septiembre['Total'], 1),
            9 => round($octubre['Total'], 1),
            10 => round($noviembre['Total'], 1),
            11 => round($diciembre['Total'], 1)
        );

        return $data;
    }
}
