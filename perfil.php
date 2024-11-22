<?php
session_start();

// Verificar si la sesión está iniciada
if (!isset($_SESSION['email'])) {
    echo "<h2>Debes iniciar sesión para acceder a tu perfil</h2>";
    echo "<a href='Login.php'>Iniciar sesión</a>";
    exit();
}

// Conectar a la base de datos
require_once '../Conexion.php';

// Recuperar datos del usuario
$email = $_SESSION['email'];

// Consulta a la base de datos
$query = "SELECT p.nombre, p.apellido, p.telefono, p.direccion, p.email, u.usuario_id 
          FROM Usuarios u JOIN Personas p ON u.persona_id = p.persona_id 
          WHERE p.email = '$email'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $usuario = $result->fetch_assoc();
    $nombre = $usuario['nombre'] . ' ' . $usuario['apellido'];
    $correo = $email;
    $telefono = $usuario['telefono'];
    $identificacion = $usuario['usuario_id'];
    $direccion = $usuario['direccion'];
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
    <title>Perfil del Usuario</title>
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
    nav a {
        color: white;
        margin: 0 15px;
        text-decoration: none;
    }
    nav a:hover {
        text-decoration: underline;
    }
    .profile-container {
        width: 80%;
        margin: 20px auto;
        background: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .profile-info h2 {
        border-bottom: 2px solid #f60;
        padding-bottom: 10px;
        margin-bottom: 10px;
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
        <h1>Perfil de Usuario</h1>
        <nav>
            <a href="../Index.php">Inicio</a>
        </nav>
    </header>
    <div class="profile-container">
        <section class="profile-info">
            <h2>Información de la Cuenta</h2>
            <p><strong>Identificación:</strong> 
<?php if (isset($identificacion)) echo $identificacion; else echo "No encontrado"; ?></p>
<p><strong>Nombre:</strong> 
<?php if (isset($nombre)) echo $nombre; else echo "No encontrado"; ?></p>
<p><strong>Correo:</strong> 
<?php if (isset($correo)) echo $correo; else echo "No encontrado"; ?></p>
<p><strong>Teléfono:</strong> 
<?php if (isset($telefono)) echo $telefono; else echo "No encontrado"; ?></p>
<p><strong>Dirección:</strong> <?php if (isset($direccion)) echo $direccion; else echo "No encontrado"; ?></p>
            <a style="text-decoration:none" href="cerrar_sesion.php">
                <button id="edit-info-btn">Cerrar Sesión</button>
            </a>
            <a href="edicioninformacion.php">
                <button id="edit-info-btn">Editar Información</button>
            </a>
        </section>
    </div>
    <?php
    // Cerrar conexión
    $conn->close();
    ?>
</body>
</html>
