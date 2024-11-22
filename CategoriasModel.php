<?php
include_once 'modelo.php';

class CategoriasModel {
    public function obtenerTodos() {
        $conn = conectar();
        $resultado = $conn->query("SELECT * FROM Categorias");
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function crear($nombre, $descripcion) {
        $conn = conectar();
        $stmt = $conn->prepare("INSERT INTO Categorias (nombre, descripcion) VALUES (?, ?)");
        $stmt->bind_param("ss", $nombre, $descripcion);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }

    public function eliminar($id) {
        $conn = conectar();
        $stmt = $conn->prepare("DELETE FROM Categorias WHERE categoria_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }

    public function obtenerPorId($id) {
        $conn = conectar();
        $stmt = $conn->prepare("SELECT * FROM Categorias WHERE categoria_id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $resultado = $stmt->get_result();
        return $resultado->fetch_assoc();
    }

    public function actualizar($id, $nombre, $descripcion) {
        $conn = conectar();
        $stmt = $conn->prepare("UPDATE Categorias SET nombre=?, descripcion=? WHERE categoria_id=?");
        $stmt->bind_param("ssi", $nombre, $descripcion, $id);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }
}
?>
