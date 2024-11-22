<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='icon' href='LOGO.png'>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Q'Locura</title>
  </head>
  <style>
   /* General styling */
body {
    font-family: Arial, Helvetica, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f5f5f5;
}

header {
    background-color: #f60;
    padding: 0.625rem; /* 10px */
    border-radius: 0 0 0.4375rem 0.4375rem; /* 7px */
    text-align: center;
    position: relative;
}

header h1 {
    margin: 0;
    color: white;
}


main {
    padding: 1.25rem; /* 20px */
    display: flex;
    flex-direction: column;
    align-items: center;
}

.product {
    background-color: white;
    border-radius: 0.5rem; /* 8px */
    box-shadow: 0 0 0.625rem rgba(0, 0, 0, 0.1); /* 10px */
    padding: 1.25rem; /* 20px */
    margin: 1.25rem 0; /* 20px */
    width: 90%;
    max-width: 50rem; /* 800px */
}

.product-info {
    margin-top: 1.25rem; /* 20px */
}

.ingredients-box {
    background-color: #fafafa;
    border: 1px solid #ddd;
    border-radius: 0.3125rem; /* 5px */
    padding: 0.625rem; /* 10px */
    margin-bottom: 1.25rem; /* 20px */
}

.ingredients-box h4 {
    margin-top: 0;
}

.product-image {
    width: 100%;
    max-width: 18.75rem; /* 300px */
    height: auto;
    display: block;
    margin: 0 auto;
}

.price-box {
    background-color: #ffefcf;
    border: 1px solid #ddd;
    border-radius: 0.3125rem; /* 5px */
    padding: 0.625rem; /* 10px */
    text-align: center;
    margin-bottom: 1.25rem; /* 20px */
}

.salsa-selection {
    background-color: #fafafa;
    border: 1px solid #ddd;
    border-radius: 0.5rem; /* 8px */
    padding: 0.9375rem; /* 15px */
}

.salsa-card {
    background-color: #ffffff;
    border: 1px solid #ddd;
    border-radius: 0.3125rem; /* 5px */
    padding: 0.625rem; /* 10px */
    margin-bottom: 0.625rem; /* 10px */
    transition: background-color 0.3s ease;
}

.salsa-card:hover {
    background-color: #e0e0e0;
}

.salsa-card label {
    margin-right: 0.625rem; /* 10px */
}

.linea {
    border: 0;
    height: 0.0625rem; /* 1px */
    background: #ddd;
    margin: 1.25rem 0; /* 20px */
}

form {
    margin-top: 0.625rem; /* 10px */
}

input[type="checkbox"] {
    margin-right: 0.3125rem; /* 5px */
}

.boton1 {
    width: 10.25rem; /* 100px */
    height: 2.1875rem; /* 35px */
    border-radius: 0.375rem; /* 6px */
    border: none;
    color: white;
    cursor: pointer;
    margin-right: 0.625rem; /* 10px */
    background-color: #f60;
}

.boton2 {
    position: relative;
    top: 0.5rem; /* 8px */
    left: 34.375rem; /* 550px */
    width: 10.25rem; /* 100px */
    height: 2.1875rem; /* 35px */
    border-radius: 0.3125rem; /* 5px */
    border: none;
    color: white;
    cursor: pointer;
    margin-right: 0.625rem; /* 10px */
    background-color: #f60;
}

.btn-orange{
        background-color: #f60;
    }

button:hover {
    background-color: #c60;
}

nav .Carrito {
    position: absolute;
    right: 0;
    top: 0.625rem; /* 10px */
}

  </style>
  <body>
<!--Inicio barra de navegacion -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
            <li><a class="dropdown-item" href="#nuestros cursos">Puntos fisicos</a></li>
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
<main>
        <section class="product">
            <header>
                <h2>Choriloco</h2>
            </header>
            <img src="Choriloco.png" alt="Choriloco" class="product-image">
            <div class="product-info">
                
                <div class="ingredients-box">
                    <h4>Ingredientes</h4>
                    <ol>
                        <li>Pan artesanal</li>
                        <li>Chorizo de cerdo</li>
                        <li>Carne</li>
                        <li>Pollo</li>
                        <li>Maíz tierno</li>
                        <li>Queso gratinado</li>
                        <li>Doritos Triturados</li>
                    </ol>
                </div>
                <div class="price-box">
                    <h3>Precio: $10.000</h3>
                </div>
                <hr class="linea">
                <div class="salsa-selection">
                    <h3>Selecciona las salsas</h3>
                    <form action="">
                        <div class="salsa-card">
                            <label for="Ajo">Ajo</label>
                            <input type="checkbox" name="Ajo" id="Ajo"><br>
                        </div>
                        <div class="salsa-card">
                            <label for="Cheddar">Cheddar</label>
                            <input type="checkbox" name="Cheddar" id="Cheddar"><br>
                        </div>
                        <div class="salsa-card">
                            <label for="Piña">Piña</label>
                            <input type="checkbox" name="Piña" id="Piña"><br>
                        </div>
                        <div class="salsa-card">
                            <label for="Tomate">Tomate</label>
                            <input type="checkbox" name="Tomate" id="Tomate"><br>
                        </div>
                        <div class="salsa-card">
                            <label for="Rosada">Rosada</label>
                            <input type="checkbox" name="Rosada" id="Rosada"><br>
                        </div>
                        <div class="salsa-card">
                            <label for="Mayonesa">Mayonesa</label>
                            <input type="checkbox" name="Mayonesa" id="Mayonesa"><br>
                        </div>
                        <br>
                        <button class="boton1" onclick="addToCart('Choriloco Grande', 25, 'form-large'>Añadir al carrito</button>
                    </form>
                </div>
            </div>
            <a href="Index.php" class="btn btn-orange position-absolute" style="bottom: -41rem; right: 1rem;">Atrás</a>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>
            function addToCart(nombre, precio, forma) {
                fetch("carrito.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify({
                        nombre: nombre,
                        precio: precio,
                        forma: forma
                    }),
                })
                .then((response) => response.json())
                .then((data) => console.log(data))
                .catch((error) => console.error(error));
            }
        </script>
<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
-->
</body>
<p class="pieDePagina">
              <p style="font-size:0.7rem; background-color:#f60; text-align:center; height:5rem;">Diseño <br> Dillan Andrey Fontecha E-mail: dillan.fontecha@gmail.com/ @2024<br>Adrian David Fomeque E-mail:adrianfomeque964@gmail.com/ @2024<br>Brayan Camilo Galeano E-mail:Camiloklk804@gmail.com/ @2024</p>

</html>
</html>