<?php
$servername = "localhost";
$username = "root"; // Nombre de usuario de la BD
$password = ""; // Contraseña de la BD
$dbname = "QLOO"; // Nombre de tu base de datos

$conn = new mysqli($servername, $username, $password, $dbname, 3306);


if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
