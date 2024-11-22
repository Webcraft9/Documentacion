<?php
include_once 'modelo.php';

class PedidosModel {
    public function obtenerTodos() {
        $conn = conectar();
        $resultado = $conn->query("SELECT * FROM Pedidos");
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function crear($usuario_id, $piloto_id) {
        $conn = conectar();
        $stmt = $conn->prepare("INSERT INTO Pedidos (usuario_id, piloto_id) VALUES (?, ?)");
        $stmt->bind_param("ii", $usuario_id, $piloto_id);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }

    public function eliminar($id) {
        $conn = conectar();
        $stmt = $conn->prepare("DELETE FROM Pedidos WHERE pedido_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }

    public function obtenerPorId($id) {
        $conn = conectar();
        $stmt = $conn->prepare("SELECT * FROM Pedidos WHERE pedido_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_assoc();
    }

    public function actualizar($id, $usuario_id, $piloto_id, $estado) {
        $conn = conectar();
        $stmt = $conn->prepare("UPDATE Pedidos SET usuario_id=?, piloto_id=?, estado=? WHERE pedido_id=?");
        $stmt->bind_param("iisi", $usuario_id, $piloto_id, $estado, $id);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }
}
?>
 