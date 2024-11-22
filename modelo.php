<?php
function conectar() {
    $conn = new mysqli('localhost', 'root', '', 'QLOO'); 
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
    return $conn;
}
?>
