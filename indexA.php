<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .card {
            width: 400px;
            padding: 20px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            background-color: #fff;
            position: relative; /* Para posicionar el botón "Volver" */
        }
        .btn-custom {
            background-color: #ff6600;
            color: white;
        }
        .btn-custom:hover {
            background-color: #e55b00;
        }
        .btn-orange {
            background-color: #ff6600;
            color: white;
            position: relative;
            right: -100px; /* Ajusta la posición horizontal */
            top: 600px; /* Ajusta la posición vertical */
        }
        .btn-orange:hover {
            background-color: #e55b00;
        }
    </style>
    <title>Panel de Administración</title>
</head>
<body>
<nav style="background-color:#F7F7F7" class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <img style="width:4rem" src="LOGO.png" alt="Logo">
    <a class="navbar-brand" href="../Index.php">Inicio</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    </div>
  </div>
</nav>
    <div class="container">
        <div class="card text-center">
            <h2 class="mb-4">Gestión de Comidas Rápidas</h2>
            <a href="ClientesController.php" class="btn btn-custom btn-block mb-3">Clientes</a>
            <a href="CategoriasController.php" class="btn btn-custom btn-block mb-3">Categorias</a>
            <a href="ProductosController.php" class="btn btn-custom btn-block mb-3">Productos</a>
            <a href="PedidosController.php" class="btn btn-custom btn-block mb-3">Pedidos</a>
            <a href="PilotosController.php" class="btn btn-custom btn-block">Pilotos</a>
            </div>

            <a href="perfilA.php" class="btn btn-orange" style="bottom: 0rem; right: 14rem; top:16rem;">Perfil</a>

        
    </div>
    
</body>

</html>
