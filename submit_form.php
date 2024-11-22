<?php
session_start();

// Conectar a la base de datos
require_once '../Conexion.php';

// Recibir datos del formulario
$email = $_POST['email'];
$password = $_POST['password'];

// Consulta a la base de datos
$query = "SELECT * FROM Usuarios u JOIN Personas p ON u.persona_id = p.persona_id WHERE p.email = '$email'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    // Verificar la contraseña
    if (password_verify($password, $row['password'])) {
        // Iniciar sesión
        $_SESSION['email'] = $email;
        $_SESSION['usuario_id'] = $row['usuario_id'];
        $_SESSION['nombre'] = $row['nombre'];
        $_SESSION['apellido'] = $row['apellido'];
        $_SESSION['telefono'] = $row['telefono'];
        $_SESSION['direccion'] = $row['direccion'];

        header('Location: ../Index.php');
        exit;
    } else {
        echo "Contraseña incorrecta";
    }
} else {
    echo "Correo electrónico no encontrado";
}

$conn->close();
?>