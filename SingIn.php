<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Q'LOCURA</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" href="LOGO.png">
</head>
<style>
    body {
        
    }
    h1 {
        color: #f60;
        position: relative;
        bottom: 6rem;
    }
    .shadow {
        position: relative;
        bottom: 7rem;
    }
    .btn-orange {
        background-color: #f60;
        text-decoration: none;
    }
</style>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <img style="width:4rem" src="LOGO.png" alt="Logo">
        <a class="navbar-brand" href="Index.php">Q'Locura</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../Iniciar.php">Inicio de sesión</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../RegistroComo.php">Registrarse</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Usuario/Carrito.php">Carrito de compras</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Más</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="Usuario/Puntos.php">Puntos físicos</a></li>
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

<div style="bottom:-6rem"class="container-fluid position-relative vh-100">
    <div class="d-flex flex-column justify-content-center align-items-center" style="height: 100%;">
        <div class="card shadow" style="width: 400px;">
            <div class="card-body">
                <form action="procesar_registro.php" method="post">
                <h2 style="text-align:center" class="text-danger mb-4">Crea tu cuenta</h2>
                    <div class="form-group">
                        <input type="text" id="identificacion" name="identificacion" class="form-control" placeholder="Número de identificación" required>
                    </div>
                    <div class="form-group">
                        <input type="email" id="email" name="email" class="form-control" placeholder="Correo" required>
                    </div>
                    <div class="form-group">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" required>
                    </div>
                    <div class="form-group">
                        <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre" required>
                    </div>
                    <div class="form-group">
                        <input type="text" id="apellido" name="apellido" class="form-control" placeholder="Apellido" required>
                    </div>
                    <div class="form-group">
                        <input type="tel" id="telefono" name="telefono" class="form-control" placeholder="+57" pattern="[0-9]{10}" required>
                    </div>
                    <div class="form-group">
                        <input type="text" id="direccion" name="direccion" class="form-control" placeholder="Dirección" required>
                    </div>
                    <button type="submit" class="btn btn-orange btn-block">Continuar</button>
                </form>
            </div>
        </div>
    </div>
    <a href="../Index.php" class="btn btn-orange position-absolute" style="bottom: 5.5rem; right: 1rem;">Atrás</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<p class="pieDePagina">
    <p style="font-size:0.7rem; background-color:#f60; text-align:center; height:5rem;">
        Diseño <br> Dillan Andrey Fontecha E-mail: dillan.fontecha@gmail.com/ @2024<br>
        Adrian David Fomeque E-mail: adrianfomeque964@gmail.com/ @2024<br>
        Brayan Camilo Galeano E-mail: Camiloklk804@gmail.com/ @2024
    </p>
</p>
</body>
</html>
