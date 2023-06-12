<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SASS | SESIÓN</title>

    <!-- CSS Boostrap -->
    <link rel="stylesheet" href="sass/public/bootstrap/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
        }
    </style>
    <!-- CSS -->
    <link rel="stylesheet" href="sass/public/css/estilosHeader.css">

</head>

<body>
    <!--Encabezado de la página-->
    <header>
        <a href="index.php">
            <img src="sass/public/img/headerTecnm.png"
                style="width: 100%; height: 140px; box-shadow: 1px 0px 23px 5px rgba(4, 5, 5, 0.34);">
        </a>
    </header>

    <br><br><br>

    <!--Cuerpo de la página-->
    <div class="container">
        <div class="row justify-content-evenly" style="height: 400px;">
            <div class="col-4 align-self-center">
                <div class="card mb-3"
                    style="background-color: #1b396a; color: white; max-width: 18rem; border: none; padding: 20px; box-shadow: 1px 0px 23px 5px rgba(4, 5, 5, 0.34);">

                    <!-- Formulario e inicio de sesión -->
                    <form id="frmLogin" method="POST" onsubmit="return loginAlumno()">
                        <fieldset class="datosInicioSesion">
                            <legend id="importancia">
                                <center>Datos para iniciar sesión:</center>
                            </legend>
                            <br>
                            <div class="form-group">
                                <label for="">No de control:</label>
                                <input type="text" id="login" name="login" class="form-control"
                                    placeholder="Ej.: 16500000" required>
                            </div>

                            <div class="form-group">
                                <label for="">Contraseña:</label>
                                <input type="password" id="password" name="password" class="form-control"
                                    placeholder="********" required>
                            </div><br>

                            <div class="form-group">
                                <center>
                                    <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
                                </center><br>

                                <center>
                                    <a href="" style="color: white;">Descargar el manual de usuario</a>
                                </center>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>

            <!-- Inicio de la tarjeta de información -->
            <div class="col-4 align-self-center">
                <!-- Icono SASS -->
                <div class="card mb-3 text-center" style="border: none;">
                    <center><img src="sass/public/img/logoSass.png" class="card-img-top" style="height: 180px; width: auto;">
                    </center><br>
                    <div class="card-body text-danger">
                        <h5 class="card-title"><b>Nota:</b></h5>
                        <p class="card-text"><b>
                                Sí es la primera vez que estas entrando al sistema tienes que realizar tu registro,
                                para posteriormente iniciar sesión.
                            </b></p>
                        <a href="registroUsuario.php" class="btn btn-primary"
                            style="background-color: #1b396a;">Registrate
                            aquí</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <!-- JS Boostrap -->
    <script src="sass/public/bootstrap/bootstrap.bundle.min.js"></script>

    <!-- Sweet alert 2 -->
    <script src="sass/public/sweetalert2/sweetalert2@11.js"></script>

    <!-- JS -->
    <script src="sass/public/js/usuarios/loginA.js"></script>

</body>

</html>