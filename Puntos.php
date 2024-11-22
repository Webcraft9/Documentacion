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
body {
    font-family: Arial, sans-serif;
    background-color: white;
    color: #333;
    margin: 0;
    padding: 0;
}

.container {
    width: 90%;
    max-width: 93.75rem; /* 1500px / 16 */
    margin: 0 auto;
    padding: 1.25rem; /* 20px / 16 */
    border: 0.0625rem solid #ddd; /* 1px / 16 */
    border-radius: 0.5rem; /* 8px / 16 */
    box-shadow: 0 0 0.625rem rgba(0, 0, 0, 0.1); /* 10px / 16 */
    background-color: #fff;
    position: relative;
    bottom: -18.75rem; /* 300px / 16 */
    top: 6.25rem; /* 100px / 16 */
}



iframe {
    left: 12.5rem; /* 200px / 16 */
    position: relative;
    width: 47rem; /* 1000px / 16 */
    top: -0.625rem; /* -10px / 16 */
    margin: 1rem; /* -10px / 16 */
    border-radius:1rem;
}

h1 {
    color: #ff6600;
    text-align: center;
}

.pedido-info {
    margin: 1.25rem 0; /* 20px / 16 */
    font-size: 1.125rem; /* 18px / 16 */
}

.pedido-info p {
    margin: 0.625rem 0; /* 10px / 16 */
}

button {
    display: block;
    width: 100%;
    padding: 0.625rem; /* 10px / 16 */
    border: none;
    border-radius: 0.3125rem; /* 5px / 16 */
    background-color: #ff6600;
    color: white;
    font-size: 1rem; /* 16px / 16 */
    cursor: pointer;
}

button:hover {
    background-color: #e65c00;
}

</style>
<body class="bg-light">
<nav style="background-color:#F7F7F7" class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
  <img style="width:4rem" src="LOGO.png" alt="Logo">
    <a class="navbar-brand" href="Index.php">Q'Locura</a>
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
</nav>
<div class="container">
        <h1>NUESTROS PUNTOS FISICOS</h1>
        <!-- Insertar el iframe de Google Maps -->
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d994.389041506536!2d-74.11612373016355!3d4.493200000000008!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3fa3db80a97797%3A0xff6229486fc87394!2sCL%20106B%20Sur%20-%20KR%205B!5e0!3m2!1ses-419!2sco!4v1722968925442!5m2!1ses-419!2sco"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <button id="mi-boton">Ir al punto fisico</button>
    </div>
    <script>

document.getElementById('mi-boton').addEventListener('click', function() {
    window.open('https://maps.app.goo.gl/CKAGTUMLAxUwoNyD8', '_blank');
  });

    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>

