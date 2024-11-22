<?php
require_once 'ProductosModel.php';
require_once 'CategoriasModel.php';

class ProductosController {
    private $modelo;

    public function __construct() {
        $this->modelo = new ProductosModel();
    }

    public function obtenerTodos() {
        return $this->modelo->obtenerTodos();
    }

    public function crear($nombre, $categoria_id, $precio, $estado) {
        try {
            $this->modelo->crear($nombre, $categoria_id, $precio, $estado);
        } catch (Exception $e) {
            echo "Error al crear el producto: " . $e->getMessage();
        }
    }

    public function eliminar($id) {
        try {
            $this->modelo->eliminar($id);
        } catch (Exception $e) {
            echo "Error al eliminar el producto: " . $e->getMessage();
        }
    }

    public function obtenerPorId($id) {
        return $this->modelo->obtenerPorId($id);
    }

    public function actualizar($id, $nombre, $categoria_id, $precio, $estado) {
        try {
            $this->modelo->actualizar($id, $nombre, $categoria_id, $precio, $estado);
        } catch (Exception $e) {
            echo "Error al actualizar el producto: " . $e->getMessage();
        }
    }
}

require_once 'productos.php'
?>
