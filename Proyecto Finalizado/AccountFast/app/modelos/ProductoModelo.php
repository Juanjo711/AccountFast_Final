<?php

/**
 * Clase ProductoModelo
 */
class ProductoModelo
{
    /**
     * Guarda la conexion a la bd
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
     * Registra un producto
     *
     * @param  array $producto
     * @return void
     */
    public function registrarProducto($producto)
    {
        $validar = "SELECT id_producto FROM tbl_producto WHERE id_producto = '" . $producto['id'] . "'";
        $consulta = mysqli_query($this->db, $validar);

        if (mysqli_num_rows($consulta) > 0) {
            echo "El ID de producto ya existe.";
        } else {
            $sql = "INSERT INTO tbl_producto(id_producto, nomb_producto, precio_producto, cantidad_producto, imagen, id_proveedor, id_categoria) VALUES
            ('" . $producto['id'] . "','" . $producto['nombre'] . "','" . $producto['precio'] . "','" . $producto['cantidad'] . "','" . $producto['imagen'] . "','" . $producto['proveedor'] . "','" . $producto['categoria'] . "')";
            $query = mysqli_query($this->db, $sql);

            if ($query) {
                echo "Producto Registrado";
            } else {
                echo "Error al registrar producto";
            }
        }
    }

    /**
     * Muestra todos los datos relacionados con los productos
     *
     * @return json
     */
    public function mostrarProductos()
    {
        $sql = "SELECT * FROM tbl_producto
                INNER JOIN tbl_categoria ON tbl_producto.id_categoria = tbl_categoria.id_categoria
                INNER JOIN tbl_proveedor ON tbl_producto.id_proveedor = tbl_proveedor.id_proveedor";

        $query = mysqli_query($this->db, $sql);


        $resultado = array();
        while ($row = mysqli_fetch_array($query)) {
            if ($row['imagen'] == '') {
                $resultado[] = array(
                    "id" => $row['id_producto'],
                    "imagen" => "",
                    "nombre" => $row['nomb_producto'],
                    "precio" => $row['precio_producto'],
                    "cantidad" => $row['cantidad_producto'],
                    "categoria" => $row['categoria'],
                    "proveedor" => $row['nomb_proveedor'],
                    "editar" => "<button class='edit-producto btn btn-link' idprodu='" . $row['id_producto'] . "'><i class='fas fa-pen-square text-success' style='font-size:25px'></i></button>",
                    "eliminar" => "<button class='delete-producto btn btn-link' idprodu='" . $row['id_producto'] . "'><i class='fas fa-trash-alt text-danger' style='font-size:25px'></i></button>"
                );
            } else {
                $resultado[] = array(
                    "id" => $row['id_producto'],
                    "imagen" => "<img src=" . RUTA_URL . "/public/img/productos/" . $row['imagen'] . " width='100px' height='70px' >",
                    "nombre" => $row['nomb_producto'],
                    "precio" => $row['precio_producto'],
                    "cantidad" => $row['cantidad_producto'],
                    "categoria" => $row['categoria'],
                    "proveedor" => $row['nomb_proveedor'],
                    "editar" => "<button class='edit-producto btn btn-link' idprodu='" . $row['id_producto'] . "'><i class='fas fa-pen-square text-success' style='font-size:25px'></i></button>",
                    "eliminar" => "<button class='delete-producto btn btn-link' idprodu='" . $row['id_producto'] . "'><i class='fas fa-trash-alt text-danger' style='font-size:25px'></i></button>"
                );
            }
        }

        $json = json_encode($resultado);
        return $json;
    }

    /**
     * Muestra un producto segun su id
     *
     * @param  int $id
     * @return json
     */
    public function mostrarProducto($id)
    {
        $sql = "SELECT * FROM tbl_producto  WHERE id_producto='$id'";
        $query = mysqli_query($this->db, $sql);

        $resultado = array();
        while ($row = mysqli_fetch_array($query)) {
            $resultado[] = array(
                "id" => $row['id_producto'],
                "imagen" => $row['imagen'],
                "nombre" => $row['nomb_producto'],
                "precio" => $row['precio_producto'],
                "cantidad" => $row['cantidad_producto'],
                "proveedor" => $row['id_proveedor'],
                "categoria" => $row['id_categoria']
            );
        }

        $json = json_encode($resultado[0]);
        return $json;
    }

    /**
     * Actualiza los datos de un producto
     *
     * @param  array $producto
     * @return void
     */
    public function editarProducto($producto)
    {
        if ($producto['imagen'] == '') {

            $sql = "UPDATE tbl_producto SET nomb_producto='" . $producto['nombre'] . "', precio_producto='" . $producto['precio'] . "', cantidad_producto='" . $producto['cantidad'] . "', id_proveedor = '" . $producto['proveedor'] . "', id_categoria='" . $producto['categoria'] . "' WHERE id_producto='" . $producto['id'] . "'";
            $query = mysqli_query($this->db, $sql) or die($this->db);

            if ($query) {
                echo "producto actualizado";
            } else {
                echo "error Sin imagen";
            }
        } else {

            $sql = "UPDATE tbl_producto SET nomb_producto='" . $producto['nombre'] . "', precio_producto='" . $producto['precio'] . "', cantidad_producto='" . $producto['cantidad'] . "', imagen='" . $producto['imagen'] . "', id_proveedor = '" . $producto['proveedor'] . "', id_categoria='" . $producto['categoria'] . "' WHERE id_producto='" . $producto['id'] . "'";
            $query = mysqli_query($this->db, $sql);

            if ($query) {
                echo "producto actualizado";
            } else {
                echo "error";
            }
        }
    }

    /**
     * Elimina un producto segun su id
     *
     * @param  int $id
     * @return void
     */
    public function eliminarProducto($id)
    {
        $sql = "DELETE FROM tbl_producto WHERE id_producto='$id'";
        $query = mysqli_query($this->db, $sql);

        if ($query) {
            echo "Producto eliminado";
        } else {
            echo "AVISO: No se puede eliminar el producto debido a que está asociado a una factura.";
        }
    }

    /**
     * Muestra el nombre y el id de los productos
     *
     * @return array
     */
    public function nombreProductos()
    {
        $sql = "SELECT nomb_producto,id_producto FROM tbl_producto";
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
     * Muestra el precio y la cantidad de un producto segun su id
     *
     * @param  int $id_producto
     * @return json
     */
    public function mostrarPrecio($id_producto)
    {
        $sql = "SELECT precio_producto,cantidad_producto FROM tbl_producto WHERE id_producto='$id_producto'";
        $query = mysqli_query($this->db, $sql);

        if (mysqli_num_rows($query) > 0) {
            $resultado = array();
            while ($row = mysqli_fetch_array($query)) {
                $resultado[] = array(
                    "cantidad" => $row['cantidad_producto'],
                    "precio" => $row['precio_producto']
                );
            }

            $json = json_encode($resultado[0]);
            return $json;
        } else {
            return 0;
        }
    }
}
