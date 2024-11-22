<?php
// Conecta con la base de datos
$conn = new mysqli("localhost", "root", "", "BD");

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recibe los datos del pedido
$data = json_decode(file_get_contents("php://input"), true);

// Guarda los datos del pedido en la base de datos
$stmt = $conn->prepare("INSERT INTO pedidos (fecha, total, productos) VALUES (?, ?, ?)");
$stmt->bind_param("sds", $fecha, $total, $productos);

$fecha = date("Y-m-d");
$total = $data["total"];
$productos = json_encode($data["productos"]);

$stmt->execute();

// Cierra la conexión
$conn->close();

// Devuelve un mensaje de éxito
echo json_encode(["mensaje" => "Pedido guardado con éxito"]);
?>