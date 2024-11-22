<?php
require_once 'ProductosModel.php';
require_once 'CategoriasModel.php';

$productosController = new ProductosController();

$productoEditar = null;

// Manejo de formularios
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['crear'])) {
        $productosController->crear($_POST['nombre'], $_POST['categoria_id'], $_POST['precio'], $_POST['estado']);
    } elseif (isset($_POST['eliminar'])) {
        $productosController->eliminar($_POST['id']);
    } elseif (isset($_POST['editar'])) {
        $productoEditar = $productosController->obtenerPorId($_POST['id']);
    } elseif (isset($_POST['actualizar'])) {
        $productosController->actualizar($_POST['id'], $_POST['nombre'], $_POST['categoria_id'], $_POST['precio'], $_POST['estado']);
    }
}

$productos = $productosController->obtenerTodos();
$categoriasModel = new CategoriasModel();
$categorias = $categoriasModel->obtenerTodos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <title>Gestión de Productos</title>
</head>
<body>
    <div style="background-color:#f60" class="container mt-5">
        <div class="card text-center" style="background: linear-gradient(to right);">
            <div class="card-body">
                <h1 class="text-center">Gestión de Productos</h1>

                <form method="post" class="mb-4">
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" required value="<?php echo $productoEditar['nombre'] ?? ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="categoria_id">Categoría</label>
                        <select name="categoria_id" class="form-control" required>
                            <option value="">Seleccionar Categoría</option>
                            <?php 
                            if (!empty($categorias)) {
                                foreach ($categorias as $categoria): ?>
                                    <option value="<?php echo $categoria['categoria_id']; ?>" <?php echo (isset($productoEditar) && $productoEditar['categoria_id'] == $categoria['categoria_id']) ? 'selected' : ''; ?>>
                                        <?php echo $categoria['nombre']; ?>
                                    </option>
                                <?php endforeach; 
                            } else {
                                echo "<option value=''>No hay categorías disponibles</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div  class="form-group">
                        <label for="precio">Precio</label>
                        <input type="number" name="precio" class="form-control" required step="0.01" value="<?php echo $productoEditar['precio'] ?? ''; ?>">
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <select name="estado" class="form-control" required>
                            <option value="Activo" <?php echo (isset($productoEditar) && $productoEditar['estado'] == 'Activo') ? 'selected' : ''; ?>>Activo</option>
                            <option value="Agotado" <?php echo (isset($productoEditar) && $productoEditar['estado'] == 'Agotado') ? 'selected' : ''; ?>>Agotado</option>
                        </select>
                    </div>
                    <button type="submit" style="background-color:#f60; border:none;" name="<?php echo isset($productoEditar) ? 'actualizar' : 'crear'; ?>" class="btn btn-primary">
                        <?php echo isset($productoEditar) ? 'Actualizar Producto' : 'Crear Producto'; ?>
                    </button>

                    <?php if (isset($productoEditar)): ?>
                        <input type="hidden" name="id" value="<?php echo $productoEditar['producto_id']; ?>">
                    <?php endif; ?>
                </form>

                <h2>Lista de Productos</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Categoría</th>
                            <th>Precio</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($productos as $producto): ?>
                            <tr>
                                <td><?php echo $producto['producto_id']; ?></td>
                                <td><?php echo $producto['nombre']; ?></td>
                                <td><?php 
                                    $categoria = $categoriasModel->obtenerPorId($producto['categoria_id']);
                                    echo $categoria['nombre'] ?? 'Categoría no encontrada';
                                ?></td>
                                <td><?php echo $producto['precio']; ?></td>
                                <td><?php echo $producto['estado']; ?></td>
                                <td>
                                    <form method="post" style="display:inline;">
                                        <input type="hidden" name="id" value="<?php echo $producto['producto_id']; ?>">
                                        <button type="submit" name="editar" class="btn btn-warning">Editar</button>
                                    </form>
                                    <form method="post" style="display:inline;">
                                        <input type="hidden" name="id" value="<?php echo $producto['producto_id']; ?>">
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
