<?php
include './crud_conn_bd/crud_sysexp.php';
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>USPG - Sistemas Expertos</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">
    <link href="./assets/heroes.css" rel="stylesheet">


    <!-- Bootstrap core CSS -->
    <link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        input[type=checkbox] {
            transform: scale(1.5);
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="./assets/dashboard.css" rel="stylesheet">
</head>

<body>

    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="./Index2.php">Sistemas Expertos</a>
        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="./Index2.php">Sign out</a>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./Index2.php">
                                <span data-feather="home"></span>
                                HOME
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <span data-feather="users"></span>
                                Customers
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="./diagnosticar.php">
                                <span data-feather="layers"></span>
                                Selección de Sintomas
                            </a>
                        </li>
                    </ul>

                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Base de Conocimiento</span>
                        <a class="link-secondary" href="#" aria-label="Add a new report">
                            <span data-feather="plus-circle"></span>
                        </a>
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="./grabar.php">
                                <span data-feather="file-text"></span>
                                Almacenar Fallas y Sintomas
                            </a>
                        </li>

                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Posiblemente tengas esta falla</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <button type="button" onclick="location.href='./diagnosticar.php'" class="btn btn-sm btn-outline-primary">
                            Regresar
                        </button>
                    </div>
                </div>

                <div class="container col-xxl-8 px-4 py-5 ">
                    <?php
                    foreach ($datos as $value) {
                        echo '
                        <div class="row justify-content-center p-3 enfermedad mt-3 mb-3">
                    
                          <div class="">
                            <h2 class="text-center text-indigo mt-4">
                              ' . $value['nombre'] . '
                            </h2>
                          </div>
                          <div class="w-100"></div>
                          <div class=" lead">
                            <p>
                              ' . $value['descripccion'] . '
                            </p>
                          </div>
                    
                          <div class="w-100"></div> 
                    
                          <div class="">
                            <h2 class="text-center text-indigo mt-4">
                              Causas
                            </h2>
                          </div>  
                          <div class="w-100"></div>
                          <div class=" lead">         
                            <p>
                              ' . $value['causas'] . '
                            </p>
                          </div>
                    
                          <div class="w-100"></div>
                    
                          <div class="">   
                            <h2 class="text-center text-indigo mt-4">
                              Recomendaciones
                            </h2>
                          </div>
                          <div class="w-100"></div>
                          <div class=" lead">            
                            <p>
                              ' . $value['recomendaciones'] . '
                            </p>
                          </div>
                    
                        </div>
                        ';
                    }
                    ?>
            </main>
        </div>
    </div>


    <script src="./assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="./assets/dashboard.js"></script>
</body>

</html>