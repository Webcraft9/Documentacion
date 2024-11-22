<?php
// Conectar a la base de datos
require_once '../Conexion.php';

// Recuperar datos del formulario
$identificacion = $_POST['identificacion'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];

// Recuperar persona_id desde Usuarios
$stmt = $conn->prepare("SELECT persona_id FROM Usuarios WHERE usuario_id = ?");
$stmt->bind_param("i", $identificacion);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();

if ($result->num_rows > 0) {
    $usuario = $result->fetch_assoc();
    $persona_id = $usuario['persona_id'];

    // Actualizar datos en la tabla Personas
    $stmt = $conn->prepare("UPDATE Personas SET nombre = ?, apellido = ?, telefono = ?, email = ?, direccion = ? WHERE persona_id = ?");
    $stmt->bind_param("sssssi", $nombre, $apellido, $telefono, $correo, $direccion, $persona_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Actualización exitosa.";
    } else {
        echo "Error al actualizar: " . $conn->error;
    }
    $stmt->close();
} else {
    echo "No se encontró el usuario.";
}

// Redireccionar a la página de perfil
header('Location: perfil.php');
exit;
?>