<?php
session_start();

// Manejo de la lógica del carrito
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del producto enviado desde el front-end
    $data = json_decode(file_get_contents("php://input"), true);

    if (isset($data['nombre']) && isset($data['precio'])) {
        $nombre = $data['nombre'];
        $precio = $data['precio'];

        // Verificar si el producto ya está en el carrito
        $found = false;
        foreach ($_SESSION['carrito'] as &$item) {
            if ($item['nombre'] === $nombre) {
                $item['cantidad']++;
                $found = true;
                break;
            }
        }

        // Si no se encontró, agregar el nuevo producto
        if (!$found) {
            $_SESSION['carrito'][] = [
                'nombre' => $nombre,
                'precio' => $precio,
                'cantidad' => 1,
            ];
        }

        // Enviar la respuesta al front-end
        echo json_encode($_SESSION['carrito']);
        exit;
    }
}

// Lógica para mostrar el carrito
$total = 0;
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='icon' href='LOGO.png'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Carrito de Compras</title>
</head>
<body>
<nav style="background-color:#F7F7F7" class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <img style="width:4rem" src="LOGO.png" alt="Logo">
    <a class="navbar-brand" href="../Index.php">Q'Locura</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="Login.php">Inicio de sesión</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="SingIn.php">Registrarse</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Carrito.php">Carrito de compras</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Más
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="Puntos.php">Puntos fisicos</a></li>
            <li><a class="dropdown-item" href="#cursos cortos">Seguir mi pedido</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#historia">Mi perfil</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">¡Compra ya!</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <div class="container">
        <h1>Carrito de Compras</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($_SESSION['carrito'])): ?>
                    <?php foreach ($_SESSION['carrito'] as $item): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($item['nombre']); ?></td>
                            <td><?php echo number_format($item['precio'], 2); ?> COP</td>
                            <td><?php echo $item['cantidad']; ?></td>
                            <td>
                                <?php
                                $subtotal = $item['precio'] * $item['cantidad'];
                                $total += $subtotal;
                                echo number_format($subtotal, 2);
                                ?> COP
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">El carrito está vacío.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <h3>Total: <?php echo number_format($total, 2); ?>COP</h3>
        <button class="btn btn-success" onclick="window.location.href='pagar.php'">Realizar Pago</button>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
