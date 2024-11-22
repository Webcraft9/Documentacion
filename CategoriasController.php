<?php
include_once 'CategoriasModel.php'; // Asegúrate de que este archivo exista en la ruta especificada

class Categorias {
    private $modelo; // Cambié el nombre de la variable a $modelo para que coincida

    public function __construct() {
        $this->modelo = new CategoriasModel(); // Instanciamos correctamente el modelo
    }

    public function obtenerTodos() {
        return $this->modelo->obtenerTodos();
    }

    public function crear($nombre, $descripcion) {
        return $this->modelo->crear($nombre, $descripcion); // Cambié a $this->modelo
    }

    public function eliminar($id) {
        return $this->modelo->eliminar($id); // Cambié a $this->modelo
    }

    public function obtenerPorId($id) {
        return $this->modelo->obtenerPorId($id); // Cambié a $this->modelo
    }

    public function actualizar($id, $nombre, $descripcion) {
        return $this->modelo->actualizar($id, $nombre, $descripcion); // Cambié a $this->modelo
    }
}

require_once 'categorias.php';
?>
