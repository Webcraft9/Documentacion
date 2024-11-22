<?php
include_once 'PedidosModel.php';

class PedidosController {
    private $modelo;

    public function __construct() {
        $this->modelo = new PedidosModel();
    }

    public function obtenerTodos() {
        return $this->modelo->obtenerTodos();
    }

    public function crear($usuario_id, $piloto_id) {
        $this->modelo->crear($usuario_id, $piloto_id);
    }

    public function eliminar($id) {
        $this->modelo->eliminar($id);
    }

    public function obtenerPorId($id) {
        return $this->modelo->obtenerPorId($id);
    }

    public function actualizar($id, $usuario_id, $piloto_id, $estado) {
        $this->modelo->actualizar($id, $usuario_id, $piloto_id, $estado);
    }
}
include 'pedidos.php';
?>
