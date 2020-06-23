<?php

/**
 * Clase Inventario hereda de la Clase Controlador
 */
class Inventario extends Controlador{    
    /**
     * guarda la sesion
     *
     * @var string
     */
    public $sesion;    
    /**
     * guarda el modelo principal
     *
     * @var string
     */
    protected $modelo;
    
    /**
     * Verifica que la sesion este iniciada para mostrar el contenido
     *
     * @return void
     */
    public function __construct(){
        $this->modelo = $this->modelo("ProductoModelo");
        $this->sesion = new Session();
        $this->sesion->iniciar();
        if ($this->sesion->get('email') == null) {
            redireccionar("/login");
        }
    }
    
    /**
     * Muestra la vista (Inventario) y los datos que se usaran en esta
     *
     * @return void
     */
    public function index(){
        // Consulta las categorias
        $categorias = $this->modelo("CategoriaModelo")->mostrarCategorias();
        // Consulta los proveedores
        $proveedor = $this->modelo("ProveedorModelo")->proveedorProducto();

        $datos = [
            "categorias" => $categorias,
            "proveedores" => $proveedor
        ];

        $this->vista("paginas/inventario", $datos);
    }
    
    /**
     * Muestra la lista de productos
     *
     * @return void
     */
    public function mostrarProductos(){
        echo $this->modelo->mostrarProductos();
    }
    
    /**
     * Muestra un unico producto que es el que recibe de la vista por el metodo POST
     *
     * @return void
     */
    public function mostrarProducto(){
        $id = $_POST['id'];

        echo $this->modelo->mostrarProducto($id);
    }
    
    /**
     * Recibe los datos de la vista los guarda en un arreglo y los manda al modelo
     *
     * @return void
     */
    public function registrarProducto(){
        $producto = [
            "id"        => $_POST['id'],
            "nombre"    => $_POST['nombre'],
            "precio"    => $_POST['precio'],
            "cantidad"  => $_POST['cantidad'],
            "imagen"    => $_POST['imagen'],
            "proveedor" => $_POST['proveedor'],
            "categoria" => $_POST['categoria']
        ];

        echo $this->modelo->registrarProducto($producto);
    }
    
    /**
     * Recibe los datos del producto que se va editar y se mandan al modelo
     *
     * @return void
     */
    public function editarProducto(){
        $producto = [
            "id"        => $_POST['id'],
            "nombre"    => $_POST['nombre'],
            "precio"    => $_POST['precio'],
            "cantidad"  => $_POST['cantidad'],
            "imagen"    => $_POST['imagen'],
            "proveedor" => $_POST['proveedor'],
            "categoria" => $_POST['categoria']
        ];

        $this->modelo->editarProducto($producto);
    }
    
    /**
     * Recibe un id por el metodo POST y lo envia al modelo para luego elimianar dicho registro
     *
     * @return void
     */
    public function eliminarProducto(){
        $id = $_POST['id'];

        $this->modelo->eliminarProducto($id);
    }
    
    /**
     * Recibe un producto para mostrar su precio
     *
     * @return void
     */
    public function mostrarPrecio(){
        $id_producto = $_POST['produ'];

        echo $this->modelo->mostrarPrecio($id_producto);
    }
    
    /**
     * Recibe los datos de la categoria y los envia el modelo Categoria
     *
     * @return void
     */
    public function registrarCategoria(){
        $categoria = $_POST['categoria'];
        $descripcion = $_POST['descripcion'];

        $this->modelo("CategoriaModelo")->registrarCategoria($categoria, $descripcion);
    }
}
