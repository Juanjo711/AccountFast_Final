<?php

/**
 *  Clase DetalleFacturaModelo manipula la informacion de los productos que se registran en cada factura
 */
class DetalleFacturaModelo
{
    /**
     * guarda la conexion con la bd
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
     * Registra cada uno de los productos de una factura
     *
     * @param  array $producto
     * @param  array $ci
     * @param  array $cantidad
     * @param  array $impuesto
     * @param  array $precio_produ
     * @param  array $num_factura
     * @return void
     */
    public function registrarDetalle($producto = [], $ci = [], $cantidad = [], $impuesto = [], $precio_produ = [], $num_factura)
    {

        // En este ciclo se van insertando los productos que hay en los arreglos en cada una de sus posiciones
        for ($i = 0; $i < count($producto); $i++) {
            // ACTUALIZAR LA CANTIDAD DE PRODUCTOS
            $valor = $ci[$i] - $cantidad[$i];
            $update = "UPDATE tbl_producto SET cantidad_producto='$valor' WHERE id_producto = '" . $producto[$i] . "'";
            $consulta = mysqli_query($this->db, $update);
            // -------------------------------------------


            $sql = "INSERT INTO tbl_detalle_factura(num_factura, id_producto, cantidad, impuesto, precio) VALUES
                        ('$num_factura','" . $producto[$i] . "','" . $cantidad[$i] . "','" . $impuesto[$i] . "','" . $precio_produ[$i] . "')";
            $query = mysqli_query($this->db, $sql);

            if ($query && $consulta) {
                redireccionar("/factura");
            } else {
                die(mysqli_error($this->db));
            }
        }
    }
}
