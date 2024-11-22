<?php
// Iniciar sesión
session_start();

// Conectar a la base de datos
require_once '../Conexion.php';

// Recuperar datos del usuario
$email = $_SESSION['email'];

// Consulta a la base de datos
$query = "SELECT p.nombre, p.apellido, p.telefono, u.usuario_id, p.direccion 
          FROM Usuarios u 
          JOIN Personas p ON u.persona_id = p.persona_id 
          WHERE p.email = '$email'";

$result = $conn->query($query);

// Verificar si la consulta devolvió resultados
if ($result->num_rows > 0) {
    $usuario = $result->fetch_assoc();
    $nombre = $usuario['nombre'];
    $apellido = $usuario['apellido'];
    $correo = $email; 
    $telefono = $usuario['telefono'];
    $direccion = $usuario['direccion'];
    $identificacion = $usuario['usuario_id'];
} else {
    // Si no se encontró el usuario, redireccionar a la página de login
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edición de Información</title>
    <link rel="stylesheet" href="yo.css">
</head>

<style>
    /* Estilos */
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    header {
        background-color: #f60;
        color: white;
        padding: 10px;
        text-align: center;
    }

    header h1 {
        margin: 0;
    }

    .profile-container {
        width: 80%;
        margin: 20px auto;
        background: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    input {
        border-radius: 0.3rem;
        border: 0.1rem solid grey;
        width: 15rem;
        height: 2rem;
    }

    button {
        border: none;
        border-radius: 5px;
        height: 32px;
        padding: 5px 10px;
        cursor: pointer;
        background-color: #f60;
        color: white;
        margin-top: 10px;
    }

    button:hover {
        background-color: #c00;
    }

    footer {
        background-color: #f60;
        color: white;
        text-align: center;
        padding: 10px;
        position: absolute;
        bottom: 0;
        width: 100%;
    }
</style>

<body>
    <header>
        <h1>Edición de Información</h1>
    </header>

    <div class="profile-container">
        <form action="actualizar_datos.php" method="post">
            <label for="identificacion">Identificación:</label> 
            <input type="text" id="identificacion" name="identificacion" value="<?php echo $identificacion; ?>"><br><br>
            <label for="nombre">Nombre:</label> 
            <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>"><br><br>
            <label for="apellido">Apellido:</label> 
            <input type="text" id="apellido" name="apellido" value="<?php echo $apellido; ?>"><br><br>
            <label for="correo">Correo:</label> 
            <input type="email" id="correo" name="correo" value="<?php echo $correo; ?>"><br><br>
            <label for="telefono">Teléfono:</label> 
            <input type="text" id="telefono" name="telefono" value="<?php echo $telefono; ?>"><br><br>
            <label for="direccion">Dirección:</label> 
            <input type="text" id="direccion" name="direccion" value="<?php echo $direccion; ?>"><br><br>
            <button type="submit">Guardar cambios</button>
        </form>
    </div>
</body>
</html>