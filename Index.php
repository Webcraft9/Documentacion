<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='icon' href='LOGO.png'>
    <link rel='stylesheet' href='Index.css'>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Q'Locura</title>
</head>
<style>
    body {
        margin: 0;
        padding: 0;
        overflow-x: hidden;
    }

    .card-header {
        background-color: #f60;
        color: white;
    }

    hr {
        margin: 1rem;
        padding: 0;
    }

    .container-fluid {
        height: 5rem;
    }

    img {
        margin: 1rem;
    }

    h2 {
        margin: 2rem;
    }

    .card {
        margin: 1rem;
    }

    .btn-primary {
        background-color: #f60;
        border: none;
        color: white;
    }

    .btn-primary:hover {
        background-color: red;
        border: none;
    }

    .btn-outline-success {
        border: none;
        background-color: #f60;
        color: black;
    }

    #searchResults {
        display: none;
        position: absolute;
        background-color: white;
        border: 1px solid #ddd;
        max-height: 200px;
        overflow-y: auto;
        width: 100%;
    }

    .search-item {
        padding: 10px;
        cursor: pointer;
    }

    .search-item:hover {
        background-color: #f1f1f1;
    }
</style>
<body>
    <!--Inicio barra de navegacion -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <img style="width:4rem" src="LOGO.png" alt="Logo">
            <a class="navbar-brand" href="#">Q'Locura</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="Iniciar.php">Inicio de sesión</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="RegistroComo.php">Registrarse</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Carrito.php">Carrito de compras</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Más
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="Puntos.php">Puntos físicos</a></li>
                            <li><a class="dropdown-item" href="SeguimientoPedidos.php">Seguir mi pedido</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="Usuario/perfil.php">Mi perfil</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">¡Compra ya!</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search" id="searchInput">
                    <button class="btn btn-outline-success" type="submit">Buscar</button>
                </form>
            </div>
        </div>
    </nav>
    <center><img style="width: 20rem" class="Logo" src="LOGO.png" alt="Imagen descriptiva"></center>
    <h2>Menu</h2><hr style="color: #f60">
    <div class="row">
    <div class="col-md-6 col-lg-3">
        <div class="card" style="width: 18rem;">
        <img src="Doriloco.png" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Dorilocos</h5>
            <p class="card-text">Una deliciosa mezcla que contiene carne, pollo, muchos más ingredientes y en diferentes presentaciones...</p>
            <a href="Usuario/Doriloco.php" class="btn btn-primary">Compra</a>
        </div>
        </div>
        </div>

        <div class="col-md-6 col-lg-3">
        <div class="card" style="width: 18rem;">

        <img src="Doriloco.png" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Salchilocura</h5>
            <p class="card-text">La magia de los doritos, en conjunto con la deliciosa salchipapa...</p>
            <a href="#" class="btn btn-primary">Compra</a>
        </div>
        </div>
        </div>

        <div class="col-md-6 col-lg-3">
        <div class="card" style="width: 18rem;">
        <img src="Choriloco.png" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Choriloco</h5>
            <p class="card-text">Pan artesanal, chorizo de cerdo y mucho más, ¡pruébalo ya!...</p>
            <a href="Usuario/Choriloco.php" class="btn btn-primary">Compra</a>
        </div>
        </div>
        </div>

        <div class="col-md-6 col-lg-3">
        <div class="card" style="width: 18rem;">
        <img src="Choriloco.png" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">Alitas BBQ/Bufalo</h5>
            <p class="card-text">Deliciosas alitas con salsa BBQ o si prefieres, con la deliciosa salsa bufalo de la casa...</p>
            <a href="#" class="btn btn-primary">Compra</a>
        </div>
        </div>
        </div> 

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script>
        // Array of searchable items
        const searchableItems = [
            "Dorilocos", "Salchilocura", "Choriloco", "Alitas BBQ", "Alitas Bufalo",
            "De la casa", "Salchipapa", "Perro caliente", "Especiales",
            "Inicio de sesión", "Registrarse", "Carrito de compras",
            "Puntos físicos", "Seguir mi pedido", "Mi perfil"
        ];

        const searchInput = document.getElementById('searchInput');
        const searchResults = document.getElementById('searchResults');

        searchInput.addEventListener('input', function() {
            const input = this.value.toLowerCase();
            const filteredItems = searchableItems.filter(item => 
                item.toLowerCase().includes(input)
            );

            displayResults(filteredItems);
        });

        function displayResults(results) {
            searchResults.innerHTML = '';
            if (results.length > 0 && searchInput.value !== '') {
                results.forEach(item => {
                    const div = document.createElement('div');
                    div.textContent = item;
                    div.className = 'search-item';
                    div.addEventListener('click', function() {
                        searchInput.value = item;
                        searchResults.innerHTML = '';
                    });
                    searchResults.appendChild(div);
                });
            }
        }

        // Close search results when clicking outside
        document.addEventListener('click', function(e) {
            if (e.target !== searchInput && e.target !== searchResults) {
                searchResults.innerHTML = '';
            }
        });
    </script>

    <p class="pieDePagina">
        <p style="font-size:0.7rem; background-color:#f60; text-align:center; height:5rem;">
            Diseño <br> Dillan Andrey Fontecha E-mail: dillan.fontecha@gmail.com/ @2024<br>
            Adrian David Fomeque E-mail: adrianfomeque964@gmail.com/ @2024<br>
            Brayan Camilo Galeano E-mail: Camiloklk804@gmail.com/ @2024
        </p>
    </p>
</body>
</html>
