<?php
include_once 'PilotosController.php';

$controller = new PilotosController();

if (isset($_POST['crear'])) {
    $controller->crear($_POST['persona_id'], $_POST['username'], $_POST['password'], $_POST['clave_unica']);
}

if (isset($_POST['eliminar'])) {
    $controller->eliminar($_POST['id']);
}

if (isset($_POST['actualizar'])) {
    $controller->actualizar($_POST['id'], $_POST['persona_id'], $_POST['username'], $_POST['password'], $_POST['clave_unica']);
}

$pilotos = $controller->obtenerTodos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <title>Gestión de Pilotos</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Gestión de Pilotos</h1>
      <div class="cuadro-degradado">
        <form method="post" class="mb-4">
            <div class="form-group">
                <label for="persona_id">ID Persona</label>
                <input type="number" name="persona_id" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="clave_unica">Clave Única</label>
                <input type="text" name="clave_unica" class="form-control" required>
            </div>
            <button type="submit" name="crear" class="btn btn-primary">Crear Piloto</button>
        </form>
      </div>

        <h2>Lista de Pilotos</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Persona</th>
                    <th>Username</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($pilotos as $piloto): ?>
                    <tr>
                        <td><?php echo $piloto['piloto_id']; ?></td>
                        <td><?php echo $piloto['persona_id']; ?></td>
                        <td><?php echo $piloto['username']; ?></td>
                        <td>
                            <form method="post" style="display:inline;">
                                <input type="hidden" name="id" value="<?php echo $piloto['piloto_id']; ?>">
                                <input type="number" name="persona_id" value="<?php echo $piloto['persona_id']; ?>" required>
                                <input type="text" name="username" value="<?php echo $piloto['username']; ?>" required>
                                <input type="password" name="password" value="<?php echo $piloto['password']; ?>" required>
                                <input type="text" name="clave_unica" value="<?php echo $piloto['clave_unica']; ?>" required>
                                <button type="submit" name="actualizar" class="btn btn-warning">Actualizar</button>
                            </form>
                            <form method="post" style="display:inline;">
                                <input type="hidden" name="id" value="<?php echo $piloto['piloto_id']; ?>">
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
