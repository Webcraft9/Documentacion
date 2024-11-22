<?php
include_once 'PilotosModel.php';

class PilotosController {
    private $modelo;

    public function __construct() {
        $this->modelo = new PilotosModel();
    }

    public function obtenerTodos() {
        return $this->modelo->obtenerTodos();
    }

    public function crear($persona_id, $username, $password, $clave_unica) {
        $this->modelo->crear($persona_id, $username, $password, $clave_unica);
    }

    public function eliminar($id) {
        $this->modelo->eliminar($id);
    }

    public function obtenerPorId($id) {
        return $this->modelo->obtenerPorId($id);
    }

    public function actualizar($id, $persona_id, $username, $password, $clave_unica) {
        $this->modelo->actualizar($id, $persona_id, $username, $password, $clave_unica);
    }
}
include 'pilotos.php';
?>
