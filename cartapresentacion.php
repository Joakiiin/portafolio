<?php 
include("header.php");
if (isset($_SESSION['alumno']) && $rol == 3)
    {
        $NoControl= $_SESSION['alumno']['nocontrol'];
 ?>          
        
        <br>
        <br>

        <!--Contenido principal-->
        <center>
            <h2 class="text-break"><b>Carta de Presentacion</b></h2>
        </center>
        <div class="card">
  <div class="card-body">
    <h1 class="card-title">¡Importante! Entrega tu carta de presentación</h1>
    <p class="card-text">Queremos recordarte la importancia de entregar tu carta de presentación impresa al Departamento de Gestión Tecnológica y Vinculación. Esta carta debe ser sellada y firmada por el departamento.</p>
    <p class="card-text">Recuerda que los datos contenidos en la carta son obtenidos de la información que has registrado previamente. No modifiques ningún dato, ya que esto puede afectar tu proceso de solicitud. Imprime la carta tal como se genera en nuestro sistema.</p>
    <p class="card-text">Si tienes alguna pregunta o necesitas más orientación sobre el proceso de entrega de la carta, no dudes en contactarnos. Estaremos encantados de ayudarte.</p>
  </div>
</div>
        <br>
        <form action="formatos/tecnm03.php" method="post" target= "_blank" id="formulario">
        <div class="row text-center">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form  action="">
                    <fieldset class="datosPersonales">
                        <div class="form-group">
                        <div class="col form-group">
                                <label for="nocontrol">NoControl:</label>
                                <input type="text" name="nocontrol" class="form-control" id="nocontrol"
                                value= "<?php echo $NoControl ?>" required>
                            </div>
                            <div class="col form-group">
                                <label for="nombres">Nombre:</label>
                                <input type="text" name="nombres" class="form-control" id="nombres" 
                                 required>
                            </div>
                            <div class="col form-group">
                                <label for="app">Apellido Paterno:</label>
                                <input type="text" name="app" class="form-control" id="app"
                                required>
                            </div>
                            <div class="col form-group">
                                <label for="apm">Apellido Materno:</label>
                                <input type="text" name="apm" class="form-control" id="apm"
                                required>
                            </div>
             
                            <div class="col form-group">
                                <label for="carrera">Carrera:</label>
                                <input type="text" name="carrera" class="form-control" id="carrera"
                                required>
                            </div>
                            <div class="col form-group">
                                <label for="Programa">Programa:</label>
                                <input type="text" name="Programa" class="form-control" id="Programa" 
                                required>
                            </div>
                            <div class="col form-group">
                                <label for="dependencia">Dependencia:</label>
                                <input type="text" name="dependencia" class="form-control" id="dependencia" 
                                required>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-md-10">
                                    <label for="destinatario">Destinatario:</label>
                                    <input type="text" class="form-control" name="destinatario" id="destinatario" required>
                                    <br>
                                </div>
                        <div class="col-md-8">
                                    <label for="ciudadTec">Ciudad del Tecnologico:</label>
                                    <input type="text" class="form-control datepicker" name="ciudadTec" id="ciudadTec" readonly>                                
                                </div>
                                <div class="col-md-4">
                                    <label for="diaF">Dia de la firma:</label>
                                    <input type="text" class="form-control datepicker" name="diaF" id="diaF" readonly>
                                    <br>
                                </div>
                                <div class="col-md-4">
                                    <label for="mesF">Mes de la firma:</label>
                                    <input type="text" class="form-control datepicker" name="mesF" id="mesF" readonly>
                                    <br>
                                </div>
                                <div class="col-md-4">
                                    <label for="yearF">Año de la firma:</label>
                                    <input type="text" class="form-control datepicker" name="yearF" id="yearF" readonly>
                                    <br>
                                </div>
                        </div>
                    </fieldset>
                    <center>
                        <button class="btn btn-primary" type="submit" id="submit" style="background-color: #1b396a;">Generar    </button>
                    </center>
                </form>
            </div>
            <div class="col-md-4"></div>
        </div>
                        </form>
        <br>
        
        <?php include("includes/footerSesion.php"); 

        ?>
        <script src= "public/js/inicio/datos.js"></script>
        <script>
            let NoControl = '<?php echo $NoControl; ?>'
            datosPersonales(NoControl);
        </script> 
         <script>
            document.getElementById("ciudadTec").value = "Ciudad de México";
        </script>
        <script>
// Obtener la fecha actual
var fechaActual = new Date();

// Array con los nombres de los meses
var nombresMeses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

// Establecer el valor predeterminado para los campos de fecha
document.getElementById("diaF").value = fechaActual.getDate();
document.getElementById("mesF").value = nombresMeses[fechaActual.getMonth()]; // nombre del mes actual
document.getElementById("yearF").value = fechaActual.getFullYear();

        </script>
<?php
} else {
    header("location:index.php");
}
?>
