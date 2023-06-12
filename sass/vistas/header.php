<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>SASS | ITGAMII</title>

    <!-- CSS Boostrap-->
    <link rel="stylesheet" href="../public/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../public/bootstrap/fixedHeader.bootstrap.min.css">
    <link rel="stylesheet" href="../public/bootstrap/responsive.bootstrap.min.css">
    <!-- CSS Data table-->
    <link rel="stylesheet" href="../public/datatable/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="../public/datatable/buttons.dataTables.min.css">
   

    <!-- CSS -->
    <link rel="stylesheet" href="../public/css/estilosInicio.css">

    <!-- CSS Font Awesome-->
    <link rel="stylesheet" href="../public/fontawesome/css/all.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
        
        /* Aplicar Montserrat Regular solo a elementos específicos */
        h1, h2, h3, p {
            font-family: 'Montserrat', sans-serif;
            font-weight: 400;
        }
    </style>
</head>

<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light static-top mb-5 shadow">
        <div class="container">
            <a class="navbar-brand" href="inicio.php">
                <img src="../public/img/logoSass.png" id="logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                 <?php if ($_SESSION['usuario']['rol'] == 2) { ?>
                    <li class="nav-item active">
                        <a class="nav-link" href="realzarReporte.php">
                            <span class="fa-solid fa-folder-plus"></span> Realizar reporte
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dependencia.php">
                            <span class="fa-solid fa-building"></span> Dependencia
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="subirReporte.php">
                            <span class="fa-solid fa-file-import"></span> Subir reporte
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span class="fa-solid fa-book"></span> Manual
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contacto.php">
                            <span class="fa-solid fa-address-book"></span> Contacto
                        </a>
                    </li>
                 <?php } else if ($_SESSION['usuario']['rol'] == 1) {?>

                    <!-- Desde este punto comienza la vista de administrador -->
                    <li class="nav-item">
                        <a class="nav-link" href="usuarios.php">
                            <span class="fas fa-users"></span> Usuarios
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="alumnos.php">
                            <span class="fas fa-table-columns"></span> Alumnos
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dep.php">
                            <span class="fas fa-table-columns"></span> Dependencias
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="programas.php">
                            <span class="fas fa-table-columns"></span> Programas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="programas_S.php">
                            <span class="fas fa-table-columns"></span> Programas Asignados
                        </a>
                    </li>
                 <?php } ?>
                    <li class="nav-item dropdown" >
                        <a style="color: blue" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <b><span class="fas fa-user"></span> <?php echo $_SESSION['usuario']['nombre']; ?> </b>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="#">
                                    <span class="fas fa-users-cog"></span> Mis datos
                                </a>
                            </li>
                            <hr class="dropdown-divider">
                            <li>
                                <a class="dropdown-item" href="../procesos/usuarios/login/salir.php">
                                    <span class="fas fa-sign-out-alt"></span> Cerrar sesión
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>
        </div>
    </nav>