<?php

/**
 * Clase PdfModelo
 */
class PdfModelo extends FPDF
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
     * Se muestran los datos de la factura en PDF
     *
     * @param  int $num_factura
     * @param  string $sesion
     * @return void
     */
    public function facturaPdf($num_factura, $sesion)
    {
        $fila = $this->consultaFactura($num_factura);
        $empresa = $this->consultaEmpresa($sesion);
        $anulada = $this->estadoFactura($num_factura);

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->Ln(12);
        $pdf->SetFont('Arial', 'B', 15);
        if ($anulada['estado'] == 'ANULADA') {
            $pdf->SetFontSize(60);
            $pdf->SetTextColor(128, 128, 128);
            $pdf->Cell(45, 0, '', 0, 0, 'l');
            $pdf->Cell(0, 0, $anulada['estado'], 0, 0, 'c');
        }
        $pdf->ln(50);
        $pdf->SetFontSize(16);
        $pdf->SetTextColor(0, 0, 0);
        // Logo
        $pdf->Image(RUTA_URL . '/public/img/accountfast.png', 95, 60, 20, 20);
        $pdf->Cell(12);
        // Título
        $pdf->Cell(20, 10, $empresa['nombre'], 0, 0, 'c');
        // Movernos a la derecha
        $pdf->Cell(120);
        $pdf->Cell(20, 10, 'Factura #00' . $num_factura, 0, 0, 'c');
        // Salto de línea
        $pdf->Ln(12);
        $pdf->Cell(0, 0, '', 1, 0, 'c');
        $pdf->Ln(5);

        $pdf->SetTextColor(0, 0, 0);
        $pdf->setFont('Arial', '', 12);
        $pdf->Cell(15);
        $pdf->Cell(35, 10, 'NIT: ' . $empresa['nit'], 0, 0, 'L');
        $pdf->Cell(70);
        $pdf->Cell(20, 10, 'CLIENTE: ' . $fila['nomb_cliente'], 0, 0, 'L');

        $pdf->Ln(12);
        $pdf->Cell(15);
        $pdf->Cell(35, 10, 'DIRECCION: ' . $empresa['direccion'], 0, 0, 'L');
        $pdf->Cell(70);
        $pdf->Cell(20, 10, 'DOCUMENTO: ' . $fila['doc_cliente'], 0, 0, 'L');

        $pdf->Ln(12);
        $pdf->Cell(15);
        $pdf->Cell(35, 10, 'TELEFONO: ' . $empresa['telefono'], 0, 0, 'L');
        $pdf->Cell(70);
        $pdf->Cell(20, 10, 'CORREO: ' . $fila['correo_cliente'], 0, 0, 'L');

        $pdf->Ln(12);
        $pdf->Cell(15);
        $pdf->Cell(35, 10, 'CORREO: ' . $empresa['correo'], 0, 0, 'L');
        $pdf->Cell(70);
        $pdf->Cell(20, 10, 'TELEFONO: ' . $fila['tel_cliente'], 0, 0, 'L');

        $pdf->Ln(12);
        $pdf->Cell(192, 0, '', 1, 0, 'c');
        $pdf->Ln(5);

        $pdf->Cell(9);
        $pdf->Cell(35, 10, 'FECHA DE COMPRA: ' . $fila['fecha'], 0, 0, 'L');
        $pdf->Cell(35);
        $pdf->Cell(35, 10, utf8_decode('PLAZO: ' . $fila['plazo']), 0, 0, 'L');
        $pdf->Cell(12);
        $pdf->Cell(35, 10, 'VENCE: ' . $fila['vencimiento'], 0, 0, 'L');

        $pdf->Ln(12);
        $pdf->Cell(192, 0, '', 1, 0, 'c');
        $pdf->Ln(10);

        $pdf->Cell(3);
        $pdf->Cell(50, 10, 'PRODUCTO', 1, 0, 'C', 0);
        $pdf->Cell(28, 10, 'CANTIDAD', 1, 0, 'C', 0);
        $pdf->Cell(42, 10, 'VALOR UNITARIO', 1, 0, 'C', 0);
        $pdf->Cell(28, 10, 'IMPUESTO', 1, 0, 'C', 0);
        $pdf->Cell(38, 10, 'VALOR TOTAL', 1, 1, 'C', 0);


        $datos = $this->consultaDetalleFactura($num_factura);

        foreach ($datos as $fila) {
            $pdf->Cell(3);
            $pdf->Cell(50, 10, $fila['nomb_producto'], 1, 0, 'C', 0);
            $pdf->Cell(28, 10, $fila['cantidad'], 1, 0, 'C', 0);
            $pdf->Cell(42, 10, $fila['precio_producto'], 1, 0, 'C', 0);
            $pdf->Cell(28, 10, $fila['impuesto'] . "%", 1, 0, 'C', 0);
            $pdf->Cell(38, 10, $fila['precio'], 1, 1, 'C', 0);
        }

        $fila2 = $this->consultaFactura($num_factura);

        // $pdf->Ln(20);
        $pdf->SetFont('Arial', '', 14);
        $pdf->Cell(123);
        $pdf->Cell(20, 10, 'Subtotal ', 0);
        $pdf->Cell(8);
        $pdf->Cell(38, 10, $fila2['subtotal'], 1, 0, 'R');

        $pdf->Ln(10);
        $pdf->Cell(123);
        $pdf->Cell(20, 10, 'Descuento ', 0);
        $pdf->Cell(8);
        $pdf->Cell(38, 10, $fila2['descuento'] . '%', 1, 0, 'R');

        $pdf->Ln(10);
        $pdf->Cell(123);
        $pdf->Cell(20, 10, 'TOTAL ', 0);
        $pdf->Cell(8);
        $pdf->Cell(38, 10, $fila2['total'], 1, 0, 'R');

        $pdf->Output();
    }

    /**
     * Muestra el detalle de la factura segun el numero de factura
     *
     * @param  int $num_factura
     * @return array
     */
    public function consultaDetalleFactura($num_factura)
    {
        $sql = "SELECT * FROM tbl_detalle_factura
                INNER JOIN tbl_producto ON tbl_detalle_factura.id_producto = tbl_producto.id_producto
                WHERE num_factura = '$num_factura'";

        $query = mysqli_query($this->db, $sql);

        while ($fila = mysqli_fetch_assoc($query)) {
            $resultado[] = $fila;
        }

        return $resultado;
    }

    /**
     * Trae todos los datos que se van a usar en el PDF
     *
     * @param  int $num_factura
     * @return array
     */
    public function consultaFactura($num_factura)
    {
        $sql = "SELECT * FROM tbl_cliente
                INNER JOIN tbl_factura ON tbl_cliente.doc_cliente = tbl_factura.doc_cliente
                INNER JOIN tbl_detalle_factura ON tbl_factura.num_factura = tbl_detalle_factura.num_factura
                INNER JOIN tbl_producto ON tbl_detalle_factura.id_producto = tbl_producto.id_producto
                WHERE tbl_factura.num_factura = '$num_factura'";
        $query = mysqli_query($this->db, $sql);

        $fila = mysqli_fetch_assoc($query);

        return $fila;
    }

    /**
     * Trae los datos de la empresa segun el correo del administrador
     *
     * @param  string $correo
     * @return array
     */
    public function consultaEmpresa($correo)
    {
        $sql = "SELECT * FROM tbl_empresa
                INNER JOIN tbl_administrador ON tbl_empresa.doc_administrador = tbl_administrador.doc_administrador
                WHERE correo_administrador = '$correo'";

        $query = mysqli_query($this->db, $sql);

        $fila = mysqli_fetch_assoc($query);

        return $fila;
    }

    /**
     * Verifica si el estado de la factura es 'ANULADA'
     *
     * @param  mixed $num_factura
     * @return void
     */
    public function estadoFactura($num_factura)
    {
        $sql = "SELECT estado FROM tbl_factura WHERE num_factura='$num_factura'";
        $query = mysqli_query($this->db, $sql);
        $resultado = mysqli_fetch_assoc($query);
        return $resultado;
    }
}
