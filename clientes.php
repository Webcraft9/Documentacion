<?php
include_once 'ClientesController.php';

$controller = new ClientesController();

if (isset($_POST['crear'])) {
    $controller->crear($_POST['persona_id']);
}

if (isset($_POST['eliminar'])) {
    $controller->eliminar($_POST['id']);
}

if (isset($_POST['actualizar'])) {
    $controller->actualizar($_POST['id'], $_POST['persona_id']);
}

$clientes = $controller->obtenerTodos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <title>Gestión de Clientes</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Gestión de Clientes</h1>
      <div class="cuadro-degradado">
        <form method="post" class="mb-4">
            <div class="form-group">
                <label for="persona_id">ID Persona</label>
                <input type="number" name="persona_id" class="form-control" required>
            </div>
            <button type="submit" name="crear" style="background-color:#f60; border:none;" class="btn btn-primary">Crear Cliente</button>
        </form>
      </div>
        <h2>Lista de Clientes</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Persona</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php foreach ($clientes as $cliente): ?>
                    <tr>
                        <td><?php echo $cliente['cliente_id']; ?></td>
                        <td><?php echo $cliente['persona_id']; ?></td>
                        <td>
                            <form method="post" style="display:inline;">
                                <input type="hidden" name="id" value="<?php echo $cliente['cliente_id']; ?>">
                                <input type="varchar" name="persona_id" value="<?php echo $cliente['persona_id']; ?>" required>
                                <button type="submit" name="actualizar" class="btn btn-warning">Actualizar</button>
                            </form>
                            <form method="post" style="display:inline;">
                                <input type="hidden" name="id" value="<?php echo $cliente['cliente_id']; ?>">
                                <button type="submit" name="eliminar" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <a href="indexA.php" style="background-color:#f60; border:none;" class="btn btn-secondary">Volver</a>
    </div>
</body>
<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>
