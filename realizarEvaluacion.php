<?php 
include("header.php");
include_once "sass/clases/Conexion.php";
if (isset($_SESSION['alumno']) && $rol == 4 || $rol == 5) 
    {
        $NoControl= $_SESSION['alumno']['nocontrol'];
        $conexion = new Conexion();
        $mysqli = $conexion->conectar();

// Crea la consulta SQL para obtener el periodo
$sql = "SELECT pe.Periodo, pa.Year FROM alumno AS al
INNER JOIN periodoasignado AS pa ON al.NoControl= pa.NoControlP
INNER JOIN periodo AS pe ON pa.idPeriodo1 = pe.idPeriodo
WHERE al.NoControl = $NoControl";
$sql2= "SELECT NoControl, 
CASE idRolFK 
     WHEN 4 THEN 'ACTIVO' 
     WHEN 5 THEN 'FINALIZADO' 
     ELSE 'OTRO' 
END AS idRolFK
FROM alumno WHERE NoControl= $NoControl";
// Ejecuta la consulta
$resultado = mysqli_query($mysqli, $sql);
$resultado2 = $mysqli->query($sql2);

// Obtener los datos de la consulta
if ($resultado2->num_rows > 0) {
    $fila2 = $resultado2->fetch_assoc();
    $estatus = $fila2['idRolFK'];
} else {
    $estatus = 'No se encontraron resultados.';
}
 ?>
        <br>
        <br>

        <!--Contenido principal-->
        <center>
            <h2 class="text-break"><b>Realizar <br>Evaluaciones/Reportes Bimestrales</b></h2>
        </center>
        <br>
        <div class="card">
      <div class="card-body">
        <h1 class="card-title">Importante: Mantén la consistencia en las fechas de tus reportes</h1>
        <p class="card-text">Queremos recordarte la importancia de mantener consistencia en las fechas de tus reportes bimestrales. Para facilitar el proceso, te recomendamos utilizar las mismas fechas en los cuatro reportes correspondientes al bimestre seleccionado.</p>
        <p class="card-text">Recuerda que al registrar tu solicitud colocaste fechas de inicio termino por un rango de 6 meses, cada dos meses deberás generar cuatro reportes, cada uno correspondiente a un bimestre específico. Para mantener la coherencia y facilitar la revisión de tus informes, te sugerimos que utilices las mismas fechas en cada uno de los cuatro reportes del bimestre segun la fecha que corresponda.</p>
        <p class="card-text">Si tienes alguna pregunta o necesitas más orientación sobre el proceso, no dudes en contactarnos. Estaremos encantados de ayudarte.</p>
      </div>
    </div>
<?php
if ($resultado) {
    // Obtiene el valor del campo "Periodo"
    $fila = mysqli_fetch_assoc($resultado);
    $periodo = $fila['Periodo'];
    $Year = $fila['Year'];
    // Muestra el valor del periodo en tu página web
    echo "<center>
            <h2 class='text-break'><b>Periodo: </b></h2><u><font color='red'><b>$periodo $Year</b></font></u>
        </center>";
} else {
    // Si la consulta falla, muestra un mensaje de error
    echo "Error al ejecutar la consulta: " . mysqli_error($conexion);
}
?>
        <br>
        <center>
            <?php
echo '<center><h2 class="text-break"><b>Estatus: </b></h2><u><font color="red"><b>' . $estatus . '</b></font></u></center>';            ?>
        </center>

        <br>

        <div class="container text-center">
            <div class="row">
                <div class="col-md-2"></div>
                
                <div class="col-md-8">
                    <div class="container">
                        <div class="row" style="margin-bottom: 15px;">
                        <div class="col-md-3">
                                <button id="reporte-bimestral-btn" class="btn btn-primary" style="background-color: #1b396a;">
                                    <a href="Reporte.php" style="text-decoration: none; color: white;">1er Reporte Bimestral
                                <br>TecNM-VI-PO-002-04</a>
                                </button>
                            </div>
                        <div class="col-md-3">
                                <button id="evaluacion-servicio-btn" class="btn btn-primary" style="background-color: #1b396a;">
                                    <a href="Evaluacion.php" style="text-decoration: none; color: white;">Realizar 1ra Evaluación Cualitativa del servicio
                                <br>TecNM-VI-PO-002-08</a>
                                </button>
                            </div>
                            <div class="col-md-3">
                                <button id="autoevaluacion-btn" class="btn btn-primary" style="background-color: #1b396a;">
                                    <a href="autoevaluacion.php" style="text-decoration: none; color: white;">Realizar 1ra Autoevaluación
                                <br>TecNM-VI-PO-002-09</a>
                                </button>
                            </div>
                            <div class="col-md-3">
                                <button id="evaluacion-actividades-btn" class="btn btn-primary" style="background-color: #1b396a;">
                                    <a href="Actividades.php" style="text-decoration: none; color: white;">1er Evaluacion de las Actividades
                                <br>TecNM-VI-PO-002-10</a>
                                </button>
                            </div>
                        </div>

                        <div class="row" style="margin-bottom: 15px;">
                        <div class="col-md-3">
                                <button class="btn btn-primary" style="background-color: #1b396a;">
                                    <a href="Reporte.php" style="text-decoration: none; color: white;">2do Reporte Bimestral
                                <br>TecNM-VI-PO-002-04</a>
                                </button>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-primary" style="background-color: #1b396a;">
                                    <a href="Evaluacion.php" style="text-decoration: none; color: white;">Realizar 2da Evaluación Cualitativa del servicio
                                <br>TecNM-VI-PO-002-08</a>
                                </button>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-primary" style="background-color: #1b396a;">
                                    <a href="autoevaluacion.php" style="text-decoration: none; color: white;">Realizar 2da Autoevaluación
                                <br>TecNM-VI-PO-002-09</a>
                                </button>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-primary" style="background-color: #1b396a;">
                                    <a href="Actividades.php" style="text-decoration: none; color: white;">2da Evaluacion de las Actividades
                                <br>TecNM-VI-PO-002-10</a>
                                </button>
                            </div>
                        </div>

                        <div class="row" style="margin-bottom: 15px;">
                        <div class="col-md-3">
                                <button id="reporte-bimestral-btn" class="btn btn-primary" style="background-color: #1b396a;">
                                    <a href="Reporte.php" style="text-decoration: none; color: white;">3er Reporte Bimestral
                                <br>TecNM-VI-PO-002-04</a>
                                </button>
                            </div>
                        <div class="col-md-3">
                                <button class="btn btn-primary" style="background-color: #1b396a;">
                                    <a href="Evaluacion.php" style="text-decoration: none; color: white;">Realizar 3ra Evaluación Cualitativa del servicio
                                <br>TecNM-VI-PO-002-08</a>
                                </button>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-primary" style="background-color: #1b396a;">
                                    <a href="autoevaluacion.php" style="text-decoration: none; color: white;">Realizar 3ra Autoevaluación
                                <br>TecNM-VI-PO-002-09</a>
                                </button>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-primary" style="background-color: #1b396a;">
                                    <a href="Actividades.php" style="text-decoration: none; color: white;">3er Evaluacion de las actividades
                                <br>TecNM-VI-PO-002-10</a>
                                </button>
                            </div>
                        </div>

                        <div class="row" style="margin-bottom: 15px;">
                        <div class="col-md-3">
                                <button id="reporte-bimestral-btn" class="btn btn-primary" style="background-color: #1b396a;">
                                    <a href="Reporte.php" style="text-decoration: none; color: white;">Reporte Bimestral Final
                                <br>TecNM-VI-PO-002-04</a>
                                </button>
                            </div>
                        <div class="col-md-3">
                                <button class="btn btn-primary" style="background-color: #1b396a;">
                                    <a href="Evaluacion.php" style="text-decoration: none; color: white;">Realizar Evaluación Cualitativa Final del Servicio
                                <br>TecNM-VI-PO-002-08</a>
                                </button>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-primary" style="background-color: #1b396a;">
                                    <a href="autoevaluacion.php" style="text-decoration: none; color: white;">Realizar Autoevaluación Final
                                <br>TecNM-VI-PO-002-09</a>
                                </button>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-primary" style="background-color: #1b396a;">
                                    <a href="Actividades.php" style="text-decoration: none; color: white;">Evaluacion de las Actividades Final
                                <br>TecNM-VI-PO-002-10</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-2    "></div>
            </div>
        </div>

        <br>
        <!-- <script>
  // Fecha de inicio para contar 2 meses
  const fechaInicio = new Date("2023-03-23");

  // Función para comprobar si han pasado 2 meses desde la fecha de inicio
  function hanPasado2Meses() {
    const fechaActual = new Date();
    const tiempoTranscurrido = fechaActual - fechaInicio;
    const mesesTranscurridos = tiempoTranscurrido / (1000 * 60 * 60 * 24 * 30.44);

    return mesesTranscurridos >= 2;
  }

  // Habilitar los botones si han pasado 2 meses desde la fecha de inicio
  if (hanPasado2Meses()) {
    document.getElementById("autoevaluacion-btn").disabled = false;
    document.getElementById("evaluacion-servicio-btn").disabled = false;
    document.getElementById("reporte-bimestral-btn").disabled = false;
  }
  </script> -->

        <?php include("includes/footerSesion.php"); 
} else {
    header("location:index.php");
}
?>