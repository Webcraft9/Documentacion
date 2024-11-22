<?php

include 'modelo.php';

class ProductosModel {
    private $conn;

    public function __construct() {
        $this->conn = conectar();
    }

    public function obtenerTodos() {
        $resultado = $this->conn->query("SELECT * FROM Productos");
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

    public function crear($nombre, $categoria_id, $precio, $estado) {
        $stmt = $this->conn->prepare("INSERT INTO Productos (nombre, categoria_id, precio, estado) VALUES (?, ?, ?, ?)");
        if ($stmt) {
            $stmt->bind_param("sidi", $nombre, $categoria_id, $precio, $estado);
            $stmt->execute();
            $stmt->close();
        } else {
            throw new Exception("Error al preparar la consulta: " . $this->conn->error);
        }
    }

    public function eliminar($id) {
        $stmt = $this->conn->prepare("DELETE FROM Productos WHERE producto_id = ?");
        if ($stmt) {
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $stmt->close();
        } else {
            throw new Exception("Error al preparar la consulta: " . $this->conn->error);
        }
    }

    public function obtenerPorId($id) {
        $stmt = $this->conn->prepare("SELECT * FROM Productos WHERE producto_id = ?");
        if ($stmt) {
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $resultado = $stmt->get_result();
            $producto = $resultado->fetch_assoc();
            $stmt->close();
            return $producto;
        } else {
            throw new Exception("Error al preparar la consulta: " . $this->conn->error);
        }
    }

    public function actualizar($id, $nombre, $categoria_id, $precio, $estado) {
        $stmt = $this->conn->prepare("UPDATE Productos SET nombre=?, categoria_id=?, precio=?, estado=? WHERE producto_id=?");
        if ($stmt) {
            $stmt->bind_param("sdisi", $nombre, $categoria_id, $precio, $estado, $id);
            $stmt->execute();
            $stmt->close();
        } else {
            throw new Exception("Error al preparar la consulta: " . $this->conn->error);
        }
    }

    public function __destruct() {
        $this->conn->close(); // Cierra la conexión al destruir la clase
    }
}

?>
