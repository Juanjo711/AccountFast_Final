<?php

/**
 * Clase Inicio hereda de la clase Controlador
 */
class Inicio extends Controlador{    
    /**
     * guarda la sesion
     *
     * @var string
     */
    public $sesion;
    
    /**
     * Valida que la sesion exista para poder mostrar el contenido
     *
     * @return void
     */
    public function __construct(){
        $this->sesion = new Session();
        $this->sesion->iniciar();
        if($this->sesion->get('email') == null ){
            redireccionar("/login");
        }
    }
    
    /**
     * Muestra la vista (Inicio) y los datos que se usaran en ella
     *
     * @return void
     */
    public function index(){
        // Consulta el total de ventas
        $ventas = $this->modelo('FacturaModelo')->totalVentas();
        // Consulta el total de gastos
        $gastos = $this->modelo('GastoModelo')->totalGastos();

        $datos = [
            "ventas" => $ventas['total'],
            "gastos" => $gastos['total']
        ];

        $this->vista("paginas/inicio", $datos);
    }
    
    /**
     * Recibe datos de los modelo y se mandan al js donde esta la grafica
     *
     * @return void
     */
    public function datosGrafica(){
        $año = $_POST['año'];
        
        // Se recibe el primer arreglo con los datos de las ventas
        $ventas = $this->modelo('FacturaModelo')->totalMes($año);
        // Se recibe el segundo arreglo con los datos de los gastos
        $gastos = $this->modelo('GastoModelo')->totalMes($año);

        // La funcion array_merge permite juntar los dos arreglos previamente recibidos
        $data =  array_merge($ventas,$gastos);
        // Se codifica en tipo json
        $respuesta = json_encode($data);
        // Se envia ese json a javascript
        echo $respuesta;
    }
}
