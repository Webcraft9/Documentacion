<?php
include_once 'CategoriasController.php';

$controller = new Categorias(); // Cambié a 'Categorias'

if (isset($_POST['crear'])) {
    $controller->crear($_POST['nombre'], $_POST['descripcion']);
}

if (isset($_POST['eliminar'])) {
    $controller->eliminar($_POST['id']);
}

if (isset($_POST['actualizar'])) {
    $controller->actualizar($_POST['id'], $_POST['nombre'], $_POST['descripcion']);
}

// Para editar, necesitas lógica para cargar los datos
$categoria_a_editar = null;
if (isset($_POST['editar'])) {
    $categoria_a_editar = $controller->obtenerPorId($_POST['id']);
}

$categorias = $controller->obtenerTodos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css"> <!-- Enlace a tu archivo CSS -->
    <title>Gestión de Categorías</title>
</head>
<body>
    <div class="container mt-5">
        <div class="card text-center" style="background: linear-gradient(to right );">
            <div  class="card-body">
                <h1 class="text-center">Gestión de Categorías</h1>
                <form method="post" class="mb-4">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" required 
                        value="<?php echo $categoria_a_editar ? $categoria_a_editar['nombre'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea name="descripcion" class="form-control" required><?php echo $categoria_a_editar ? $categoria_a_editar['descripcion'] : ''; ?></textarea>
                    </div>
                    <?php if ($categoria_a_editar): ?>
                        <input type="hidden" name="id" value="<?php echo $categoria_a_editar['categoria_id']; ?>">
                        <button type="submit" name="actualizar" class="btn btn-success">Actualizar Categoría</button>
                    <?php else: ?>
                        <button type="submit" name="crear" style="background-color:#f60; border:none;" class="btn btn-primary">Crear Categoría</button>
                    <?php endif; ?>
                </form>

                <h2>Lista de Categorías</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($categorias as $categoria): ?>
                            <tr>
                                <td><?php echo $categoria['categoria_id']; ?></td>
                                <td><?php echo $categoria['nombre']; ?></td>
                                <td><?php echo $categoria['descripcion']; ?></td>
                                <td>
                                    <form method="post" style="display:inline;">
                                        <input type="hidden" name="id" value="<?php echo $categoria['categoria_id']; ?>">
                                        <button type="submit" name="editar" class="btn btn-warning">Editar</button>
                                    </form>
                                    <form method="post" style="display:inline;">
                                        <input type="hidden" name="id" value="<?php echo $categoria['categoria_id']; ?>">
                                        <button type="submit" name="eliminar" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <a href="indexA.php" style="background-color:#f60; border:none;" class="btn btn-secondary">Volver</a>
            </div>
        </div>
    </div>
</body>
</html>
