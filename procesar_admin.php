<?php
require_once '../Conexion.php';

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $identificacion = $_POST['identificacion'];
    $email = $_POST['email'];
    $username = $_POST['email']; // Utilizar el correo como username
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];

    // Insertar en la tabla Personas
    $stmt = $conn->prepare("INSERT INTO Personas (nombre, apellido, telefono, email, direccion) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nombre, $apellido, $telefono, $email, $direccion);
    $stmt->execute();
    $persona_id = $stmt->insert_id;
    $stmt->close();

    // Insertar en la tabla Administradores
    $stmt_admin = $conn->prepare("INSERT INTO Administradores (persona_id, username, password) VALUES (?, ?, ?)");
    $stmt_admin->bind_param("iss", $persona_id, $username, $password, );
    $stmt_admin->execute();
    $stmt_admin->close();

    // Redireccionar a indexA.php
    header("Location: LoginA.php");
    exit();
}

$conn->close();
?>