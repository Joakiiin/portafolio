<?php
    session_start();
    // Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "Adm1n15tr4D0r11!", "sassf");

// Verificar si la conexión fue exitosa
if (!$conexion) {
    die("La conexión falló: " . mysqli_connect_error());
}

// Consulta SQL para obtener el valor del campo "Rol" del usuario logueado
$nocontrol = $_SESSION['alumno']['nocontrol'];
$sql = "SELECT idRolFK FROM alumno WHERE NoControl = '$nocontrol'";
$resultado = mysqli_query($conexion, $sql);

// Verificar si la consulta fue exitosa
if (!$resultado) {
    die("La consulta falló: " . mysqli_error($conexion));
}

// Obtener el valor del campo "Rol" correspondiente al usuario logueado
$rol = mysqli_fetch_assoc($resultado)['idRolFK'];

// Cerrar la conexión a la base de datos
mysqli_close($conexion);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITGAM II | SASS</title>
    <!-- CSS Boostrap-->
    
    <link rel="stylesheet" href="sass/public/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="sass/public/bootstrap/fixedHeader.bootstrap.min.css">
    <link rel="stylesheet" href="sass/public/bootstrap/responsive.bootstrap.min.css">
    <!-- CSS Data table-->
    <link rel="stylesheet" href="sass/public/datatable/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="sass/public/datatable/buttons.dataTables.min.css">
    <!-- CSS Font Awesome-->
    <link rel="stylesheet" href="sass/public/fontawesome/css/all.css">
    <link rel="stylesheet" href="css/estilosHeader.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker.min.css" rel="stylesheet">

</head>

<body>
    <div class="container">
        <!--Encabezado de la página-->
        <div class="row clearfix">
            <div class="col-md-12 column" align="center">
                <header>
                    <img src="img/headerTecnm.png" alt="" width="90%">
                    <nav class="navbar nav justify-content-center" style="background-color: #1b396a;">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="principal.php" style="color: white;">SASS</a>
                            <ul class="nav justify-content-end">
                            <?php if($rol == 2) { ?>
                            <li class="nav-item">
                                    <a class="nav-link" href="selecprograms.php" id="link">Elegir Programas</a>
                                </li>
                                <?php } else if ($rol == 3) { ?>
                                    <li class="nav-item">
                                    <a class="nav-link" href="cartapresentacion.php" id="link">Carta de presentacion</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="expediente.php" id="link">Servicio Social</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="subirDocumentos.php" id="link">Subir Documentos</a>
                                </li>
                                <?php } else 
                                if ($rol==4 || $rol == 5) { ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="realizarEvaluacion.php" id="link">Realizar Evaluaciones/Reportes</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="subirEvaluacion.php" id="link">Subir Evaluaciones/Reportes</a>
                                </li>
                                <?php } ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="dependencia.php" id="link">Dependencia</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="files/GuiaUsuarioAlumno.pdf" target="_blank" id="link">Manual</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="contacto.php" id="link">Contacto</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" id="link">Usuario: <?php echo $_SESSION['alumno']['nocontrol'];?></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="procesos/alumno/login/cerrar.php" id="link">Cerrar sesión</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </header>
            </div>
        </div>