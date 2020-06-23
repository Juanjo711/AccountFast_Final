<?php

/**
 * Clase Factura hereda de la clase Controlador
 */
class Factura extends Controlador
{    
    /**
     * guarda la sesion
     *
     * @var string
     */
    public $sesion;    
    /**
     * guarda el modelo de la clase
     *
     * @var string
     */
    protected $modelo;
    
    /**
     * Verifica que la sesion este iniciada para dar acceso al contenido
     *
     * @return void
     */
    public function __construct()
    {
        $this->modelo = $this->modelo("FacturaModelo");

        $this->sesion = new Session();
        $this->sesion->iniciar();
        if ($this->sesion->get('email') == null) {
            redireccionar("/login");
        }
    }
    
    /**
     * Muestra la vista (Factura)  y los datos que se usan es esta
     *
     * @return void
     */
    public function index()
    {
        $resultado = $this->modelo->mostrarFacturas();
        // Muestra la lista de clientes a la hora de realizar una factura
        $clientes = $this->modelo("ClienteModelo")->mostrarClientes();
        // Se controla el numero de la factura
        $num_factura = $this->modelo->numFactura();

        $datos = [
            'facturas' => $resultado,
            'clientes' => $clientes,
            'numero'   => $num_factura['num_factura'] + 1
        ];

        $this->vista("paginas/factura", $datos);
    }
    
    /**
     * Recibe todos los datos de la vista y se envian a su modelo para insertar en la BD
     *
     * @return void
     */
    public function registrar()
    {
        // Este arreglo se inserta en la tabla factura
        $datos = [
            "num_factura" => $_POST['num_fac'],
            "cliente"     => $_POST['cliente'],
            "fecha"       => $_POST['fecha'],
            "plazo"       => $_POST['plazo'],
            "vencimiento" => $_POST['ven'],
            "subtotal"    => $_POST['subtotal'],
            "descuento"   => $_POST['descuento'],
            "total"       => $_POST['total']
        ];

        // Estos son arreglos que contienen los productos que se insertaron en la factura y se guardaran en la tabla detalleFactura
        $producto     = $_POST['producto'];
        $ci           = $_POST['cantidad_inventario'];
        $cantidad     = $_POST['cantidad'];
        $impuesto     = $_POST['impuesto'];
        $precio_produ = $_POST['precio_produ'];
        $num_factura = $_POST['num_fac'];

        $this->modelo->registrarFactura($datos);
        $this->modelo("DetalleFacturaModelo")->registrarDetalle($producto, $ci ,$cantidad, $impuesto, $precio_produ, $num_factura);
    }
    
    /**
     * elimina factura
     *
     * @param  int $num_factura
     * @return void
     */
    public function anular($num_factura)
    {
        $this->modelo->anularFactura($num_factura);
    }
    
    /**
     * Envia los datos de la factura para sacar la vista en PDF
     *
     * @param  int $num_factura
     * @return void
     */
    public function verPdf($num_factura){
        $this->modelo("PdfModelo")->facturaPdf($num_factura, $this->sesion->get('email'));
        // print_r($this->modelo("PdfModelo")->consultaFactura($num_factura));
    }
    
    /**
     * Recibe el id para actualizar el estado de la factura
     *
     * @param  mixed $id
     * @return void
     */
    public function actualizar($id){
        $this->modelo->actualizarEstado($id);
    }
    
    /**
     * Permite agregar una fila en la que se insertara un nuevo producto
     *
     * @return void
     */
    public function agregarFila()
    {
        $resultado = $this->modelo->productoFactura();

?>
        <!-- Este codigo se agregara a la vista cada que se ejecute la funcion -->
        <tr>
            <th>
                <select name="producto[]" class="producto form-control col-md-12" required>
                    <option value="">
                        <?php if($resultado == ''){
                            echo "Sin productos";
                        }else{
                            echo "Seleccione un producto";
                        }
                         ?>
                    </option>
                    <?php foreach ($resultado as $fila) : ?>
                        <option value="<?php echo $fila['id_producto']; ?>"><?php echo $fila['nomb_producto']; ?></option>
                    <?php endforeach; ?>
                </select>
            </th>
            <td>
                <input type="number" name="cantidad_inventario[]" class="cantidad_inventario form-control col-md-12" readonly>
            </td>
            <td>
                <input type="number" name="cantidad[]" class="cantidad form-control col-md-12" required>
            </td>
            <td>
                <input type="number" name="precio[]" class="precio form-control col-md-12" readonly>
            </td>
            <td>
                <input type="number" name="impuesto[]" class="impuesto form-control" required>
            </td>
            <td>
                <input type="number" name="precio_produ[]" class="precio_produ form-control col-md-12" readonly>
            </td>
        </tr>
<?php
    }
}
