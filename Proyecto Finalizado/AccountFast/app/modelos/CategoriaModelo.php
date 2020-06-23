<?php

/**
 * Clase CategoriaModelo maneja la informacion de las categoria de los productos
 */
class CategoriaModelo
{    
    /**
     * guarda la conexion con la bd
     *
     * @var object
     */
    private $db;
    
    /**
     * ejecuta la conexion
     *
     * @return void
     */
    public function __construct()
    {
        $this->db = Conexion::conectar();
    }
    
    /**
     * Registra una nueva categoria
     *
     * @param  string $categoria
     * @param  string $descripcion
     * @return void
     */
    public function registrarCategoria($categoria, $descripcion)
    {
        $sql = "INSERT INTO tbl_categoria(categoria, descripcion) VALUES ('$categoria', '$descripcion')";
        $query = mysqli_query($this->db, $sql);

        if ($query) {
            echo "<script>alert('Nueva Categoria Registrada')</script>";
            redireccionar("/inventario");
        } else {
            echo "<script>alert('Error al registrar categoria')</script>";
        }
    }
    
    /**
     * Muestra las categoruas que hay en la base de datos
     *
     * @return array
     */
    public function mostrarCategorias()
    {
        $sql = "SELECT * FROM tbl_categoria";
        $query = mysqli_query($this->db, $sql);

        if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_array($query)) {
                $resultado[] = $row;
            }

            return $resultado;
        }else{
            return "";
        }
    }
}
