<?php
// Iniciar sesión
session_start();

// Establecer conexión con la base de datos
require_once '../Conexion.php';

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recuperar datos del formulario
    $email = $_POST['email'];
    $password = $_POST['password'];
    $clave = $_POST['clave_unica'];

    // Verificar que los campos estén completos
    if (empty($email) || empty($password)) {
        echo "Por favor, complete todos los campos";
    } else {
        // Consulta a la base de datos
        $query = "SELECT * FROM Personas WHERE email = '$email' "; // Cambié 'passwordd' a 'password'
        $result = $conn->query($query);

        $query = "SELECT * FROM Adminstrador WHERE password = '$password'"; // Cambié 'passwordd' a 'password'
        $result = $conn->query($query);

        $query = "SELECT * FROM Adminstrador WHERE clave_unica = '$clave'"; // Cambié 'passwordd' a 'password'
        $result = $conn->query($query);

        // Verificar si la consulta devolvió resultados
        if ($result->num_rows > 0) {
            // Establecer la variable de sesión "email"
            $_SESSION['email'] = $email;
            header('Location: perfilA.php');
            exit();
        } else {
            echo "Usuario, contraseña o clave unica incorrectos";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Q'LOCURA</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" href="LOGO.png">
    <link rel="stylesheet" href="Login.css">
</head>
<style>
    body{
        overflow-y:hidden;
    }
    h1{
        color: #f60;
        position:relative;
        bottom:8rem;
    }
    .shadow{
        position:relative;
        bottom:7rem;
    }
    .btn-orange {
        background-color: #f60;
        color: white;
        text-decoration:none;
    }
    .btn-orange:hover {
        background-color: red; /* Cambiar a rojo al pasar el mouse */
    }
</style>
<body class="bg-light">
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
          <a class="nav-link active" aria-current="page" href="../Iniciar.php">Inicio de sesión</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="RegistrarComoS.php">Registrarse</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Usuario/Carrito.php">Carrito de compras</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Más
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="Usuario/Puntos.php">Puntos fisicos</a></li>
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
<div class="container-fluid position-relative vh-100">
    <img class="Imagen position-absolute" src="Logoo.png" alt="" style="top: 20px; left: 20px; width: 150px;">
    <div class="d-flex flex-column justify-content-center align-items-center" style="height: 100%;">
        
        <div class="card shadow" style="width: 400px;">
            <div class="card-body">  
                <form action="submit_admin.php" method="post">
                <center><h2 class="text-danger mb-4" style="color:#f60; font-size:3rem;">Iniciar Sesión</h2></center>
                    <div class="form-group">
                    <form action="verificar_contrasena.php" method="post">
                      <div class="form-group">
                          <input type="email" id="email" name="email" class="form-control" placeholder="Correo" required>
                      </div>
                      <div class="form-group">
                          <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" required>
                      </div>
                      <a clas="btn btn-orange position-absolute" href="indexA.php"><button type="submit" class="btn btn-orange btn-block">Continuar</button></a>
                </form>
            </div>
        </div>
    </div>
    <a href="../RegistroComo.php" class="btn btn-orange position-absolute" style="bottom: 9rem; right: 1rem;">Atrás</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
<p class="pieDePagina">
    <p style="font-size:0.7rem; background-color:#f60; text-align:center; height:5rem;">Diseño <br> Dillan Andrey Fontecha E-mail: dillan.fontecha@gmail.com/ @2024<br>Adrian David Fomeque E-mail:adrianfomeque964@gmail.com/ @2024<br>Brayan Camilo Galeano E-mail:Camiloklk804@gmail.com/ @2024</p>
</p>
</html>
