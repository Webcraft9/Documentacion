<?php
include_once 'ClientesModel.php';

class ClientesController {
    private $modelo;

    public function __construct() {
        $this->modelo = new ClientesModel();
    }

    public function obtenerTodos() {
        return $this->modelo->obtenerTodos();
    }

    public function crear($persona_id) {
        $this->modelo->crear($persona_id);
    }

    public function eliminar($id) {
        $this->modelo->eliminar($id);
    }

    public function obtenerPorId($id) {
        return $this->modelo->obtenerPorId($id);
    }

    public function actualizar($id, $persona_id) {
        $this->modelo->actualizar($id, $persona_id);
    }
}
include 'clientes.php';
?>
