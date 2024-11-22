<?php
require_once '../Conexion.php';


// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $identificacion = $_POST['identificacion'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion']; // Agregué esta línea

    // Validación (puedes agregar más validaciones según tus necesidades)

    // Insertar en la tabla Personas
    $stmt = $conn->prepare("INSERT INTO Personas (nombre, apellido, telefono, email, direccion) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nombre, $apellido, $telefono, $email, $direccion);

    if ($stmt->execute()) {
        $persona_id = $stmt->insert_id; 
        $stmt->close();

        // Insertar en la tabla Usuarios
        $stmt_usuario = $conn->prepare("INSERT INTO Usuarios (persona_id, password) VALUES (?, ?)");
        $stmt_usuario->bind_param("is", $persona_id, $password);

        if ($stmt_usuario->execute()) {
            echo "Registro exitoso.";
            header("Location: Login.php");
            exit();
        } else {
            echo "Error al registrar usuario: " . $stmt_usuario->error;
        }
        $stmt_usuario->close();
    } else {
        echo "Error al registrar persona: " . $stmt->error;
    }
}

$conn->close();
?>