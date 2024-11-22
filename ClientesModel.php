<?php
include_once 'modelo.php';

class ClientesModel {
    public function obtenerTodos() {
        $conn = conectar();
        $resultado = $conn->query("SELECT * FROM Clientes");
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function crear($persona_id) {
        $conn = conectar();
        $stmt = $conn->prepare("INSERT INTO Clientes (persona_id) VALUES (?)");
        $stmt->bind_param("i", $persona_id);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }

    public function eliminar($id) {
        $conn = conectar();
        $stmt = $conn->prepare("DELETE FROM Clientes WHERE cliente_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }

    public function obtenerPorId($id) {
        $conn = conectar();
        $stmt = $conn->prepare("SELECT * FROM Clientes WHERE cliente_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_assoc();
    }

    public function actualizar($id, $persona_id) {
        $conn = conectar();
        $stmt = $conn->prepare("UPDATE Clientes SET persona_id=? WHERE cliente_id=?");
        $stmt->bind_param("ii", $persona_id, $id);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }
}
?>
