<?php
include_once 'PedidosController.php';

$controller = new PedidosController();

if (isset($_POST['crear'])) {
    $controller->crear($_POST['usuario_id'], $_POST['piloto_id']);
}

if (isset($_POST['eliminar'])) {
    $controller->eliminar($_POST['id']);
}

if (isset($_POST['actualizar'])) {
    $controller->actualizar($_POST['id'], $_POST['usuario_id'], $_POST['piloto_id'], $_POST['estado']);
}

$pedidos = $controller->obtenerTodos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <title>Gestión de Pedidos</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Gestión de Pedidos</h1>
      <div class="cuadro-degradado">
        <form method="post" class="mb-4">
            <div class="form-group">
                <label for="usuario_id">ID Usuario</label>
                <input type="number" name="usuario_id" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="piloto_id">ID Piloto</label>
                <input type="number" name="piloto_id" class="form-control" required>
            </div>
            <button type="submit" name="crear" class="btn btn-primary">Crear Pedido</button>
        </form>
      </div>

        <h2>Lista de Pedidos</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Usuario</th>
                    <th>ID Piloto</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pedidos as $pedido): ?>
                    <tr>
                        <td><?php echo $pedido['pedido_id']; ?></td>
                        <td><?php echo $pedido['usuario_id']; ?></td>
                        <td><?php echo $pedido['piloto_id']; ?></td>
                        <td><?php echo $pedido['estado']; ?></td>
                        <td>
                            <form method="post" style="display:inline;">
                                <input type="hidden" name="id" value="<?php echo $pedido['pedido_id']; ?>">
                                <input type="number" name="usuario_id" value="<?php echo $pedido['usuario_id']; ?>" required>
                                <input type="number" name="piloto_id" value="<?php echo $pedido['piloto_id']; ?>" required>
                                <input type="text" name="estado" value="<?php echo $pedido['estado']; ?>" required>
                                <button type="submit" name="actualizar" class="btn btn-warning">Actualizar</button>
                            </form>
                            <form method="post" style="display:inline;">
                                <input type="hidden" name="id" value="<?php echo $pedido['pedido_id']; ?>">
                                <button type="submit" name="eliminar" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <a href="indexA.php" class="btn btn-secondary">Volver</a>
    </div>
</body>
<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>
