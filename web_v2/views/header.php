<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Red de Investigación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/investigaciones.css">
    <link rel="stylesheet" href="css/miembros.css">
    <link rel="stylesheet" href="css/nosotros.css">
    <link rel="stylesheet" href="css/politica.css">
    <link rel="stylesheet" href="css/contacto.css">
    <link rel="stylesheet" href="css/instituciones.css">
</head>
<body>
    <header>
       <div class="container text-center">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-3">
                    <img src="./images/logos/logo.png" alt="" width="200px" height="200px">
                </div>
                <div class="col-5">
                    <h1>Red De Investigación <br>Quantum Nexus</h1>
                </div>
                <div class="col-2"></div>
            </div>    
        </div>    
    </header>

     <nav class="navbar navbar-expand-lg" data-bs-theme=dark>
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Inicio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="item-nav">
                <a class="nav-link active" aria-current="page" href="miembros.php">Miembros</a>
                </li>

                <li class="item-nav">
                <a class="nav-link" href="investigaciones.php">Investigaciones</a>
                </li>

                <li class="item-nav">
                <a class="nav-link" href="contacto.php">Contacto</a>
                </li>

                <li class="item-nav">
                <a class="nav-link" href="instituciones.php">Instituciones</a>
                </li>

                <li class="item-nav">
                <a class="nav-link" href="acercade.php">Acerca De</a>
                </li>
                
            </ul>
            </div>
        </div>
    </nav>

    <section class="carrusel">
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="./images/algabanner.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="./images/alzheimer-banner.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="./images/panelesbanner.png" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>