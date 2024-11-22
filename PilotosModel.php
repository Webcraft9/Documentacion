<?php
include_once 'modelo.php';

class PilotosModel {
    public function obtenerTodos() {
        $conn = conectar();
        $resultado = $conn->query("SELECT * FROM Pilotos");
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function crear($persona_id, $username, $password, $clave_unica) {
        $conn = conectar();
        $stmt = $conn->prepare("INSERT INTO Pilotos (persona_id, username, password, clave_unica) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isss", $persona_id, $username, $password, $clave_unica);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }

    public function eliminar($id) {
        $conn = conectar();
        $stmt = $conn->prepare("DELETE FROM Pilotos WHERE piloto_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }

    public function obtenerPorId($id) {
        $conn = conectar();
        $stmt = $conn->prepare("SELECT * FROM Pilotos WHERE piloto_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_assoc();
    }

    public function actualizar($id, $persona_id, $username, $password, $clave_unica) {
        $conn = conectar();
        $stmt = $conn->prepare("UPDATE Pilotos SET persona_id=?, username=?, password=?, clave_unica=? WHERE piloto_id=?");
        $stmt->bind_param("isssi", $persona_id, $username, $password, $clave_unica, $id);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }
}
?>
