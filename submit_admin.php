<?php
session_start();
require_once '../Conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];


    $stmt = $conn->prepare("SELECT u.administrador_id, u.password, p.nombre, p.apellido, p.telefono, p.direccion 
                           FROM Administradores u 
                           JOIN Personas p ON u.persona_id = p.persona_id 
                           WHERE p.email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {
            // Iniciar sesión
            $_SESSION['email'] = $email;
            $_SESSION['administrador_id'] = $row['administrador_id'];
            $_SESSION['nombre'] = $row['nombre'];
            $_SESSION['apellido'] = $row['apellido'];
            $_SESSION['telefono'] = $row['telefono'];
            $_SESSION['direccion'] = $row['direccion'];
            header('Location: indexA.php');
            exit;
        } else {
            if (!password_verify($password, $row['password'])) {
                echo "Contraseña incorrecta";
            
            }
        }
    } else {
        echo "Correo electrónico no encontrado";
    }
}
$conn->close();
?>
