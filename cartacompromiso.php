<?php
    include "header.php";
    if (isset($_SESSION['alumno']) && $rol == 3) {
        $NoControl= $_SESSION['alumno']['nocontrol'];
?>

<div class="container">
    
    <div class="card border-0 shadow my-5">
        <div class="card-body p-5">
            <h1 class="fw-light">Generacion de Documentos Iniciales de Servicio social</h1>
            <br>
            <div class="container">
            <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <form id="frmCompromiso" action="formatos/tecnm02.php" target="_blank" method="post" onsubmit="return agregarCompromisoAlumno()">
                    <center>
                        <h2>
                            <b>Carta compromiso</b>
                        </h2>
                    </center>
                    <br>
                    <fieldset class="leyenda">
                        <legend id="importancia">
                        <center>Datos para llenar su carta compromiso:</center>
                        </legend>
                    </fieldset>
 <!--Contenido Datos Personales-->
                    <fieldset class="datosPersonales">
                        <legend id="personales">
                            <center>Datos personales</center>
                        </legend>
                        <div class="form-gruop">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="apellidoPS">Apellido Paterno:</label>
                                    <input type="text" name="apellidoPS" class="form-control" id="apellidoPS">
                                </div>
                                <div class="col-md-4">
                                    <label for="apellidoMS">Apellido Materno:</label>
                                    <input type="text" name="apellidoMS" class="form-control" id="apellidoMS">
                                </div>
                                <div class="col-md-4">
                                    <label for="NombreS">Nombre(s):</label>
                                    <input type="text" name="NombreS" class="form-control" id="NombreS">
                                    <br>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cpS">C.P:</label>
                            <input type="text" name="cpS" class="form-control" id="cpS">
                        </div>
                        <div class="form-group">
                            <label for="estadoS">Estado:</label>
                            <input type="text" name="estadoS" class="form-control" id="estadoS">
                        </div>
                        <div class="form-group">
                            <label for="municipioS">Municipio/Alcaldia:</label>
                            <input type="text" name="municipioS" class="form-control" id="municipioS">
                        </div>
                        <div class="form-group">
                            <label for="coloniaS">Colonia:</label>
                            <input type="text" name="coloniaS" class="form-control" id="coloniaS">
                        </div>
                        <div class="form-group">
                            <label for="calleS">Calle y Numero:</label>
                            <input type="text" name="calleS" class="form-control" id="calleS">
                        </div>
                        <div class="form-group">
                            <label for="telefonoS">Teléfono:</label>
                            <input type="text" name="telefonoS" class="form-control" id="telefonoS">
                        </div>
                        </fieldset>
                        <!--Contenido Escolares-->
                    <fieldset class="Escolares">
                        <legend id="escolar">
                            <center>Escolaridad</center>
                        </legend>
                        <div class="form-gruop">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="nocontrolS">No. de Control:</label>
                                    <input type="text" name="nocontrolS" class="form-control" id="nocontrolS"  value= "<?php echo $NoControl ?>">
                                </div>
                                <div class="col-md-8">
                                    <label for="carreraS">Carrera:</label>
                                    <input type="text" name="carreraS" class="form-control" id="carreraS">
                                </div>
                                <div class="col-md-4">
                                    <label for="semestreS">Semestre:</label>
                                    <input type="text" name="semestreS" class="form-control" id="semestreS">
                                    <br>
                                </div>
                            </div>
                        </div>
                        </fieldset>
                        <!--Contenido datos del programa-->
                         <fieldset class ="datosP">
                         <legend id="datosP">
                            <center>Datos del Programa y Domicilio del programa</center>
                        </legend>
                        <div class="form-group">
                            <label for="dependenciaS">Dependencia Oficial:</label>
                            <input type="text" name="dependenciaS" class="form-control" id="dependenciaS">
                        </div>
                        <div class="form-group">
                            <label for="tdependenciaS">Titular de la dependencia:</label>
                            <input type="text" name="tdependenciaS" class="form-control" id="tdependenciaS">
                        </div>
                        <div class="form-group">
                            <label for="cpDep">C.P:</label>
                            <input type="text" name="cpDep" class="form-control" id="cpDep">
                        </div>
                        <div class="form-group">
                            <label for="estadoDep">Estado:</label>
                            <input type="text" name="estadoDep" class="form-control" id="estadoDep">
                        </div>
                        <div class="form-group">
                            <label for="municipioDep">Municipio/Alcaldia:</label>
                            <input type="text" name="municipioDep" class="form-control" id="municipioDep">
                        </div>
                        <div class="form-group">
                            <label for="coloniaDep">Colonia:</label>
                            <input type="text" name="coloniaDep" class="form-control" id="coloniaDep">
                        </div>
                        <div class="form-group">
                            <label for="calleDep">Calle y Numero:</label>
                            <input type="text" name="calleDep" class="form-control" id="calleDep">
                        </div>
                        <div class="row">
                        <legend id="fechasInit">
                            <center>Fechas de inicio y de terminacion</center>
                        </legend>
                                <div class="col-md-4">
                                    <label for="fechaIS">Fecha de inicio:</label>
                                    <input type="text" class="form-control datepicker" name="fechaIS" id="fechaIS">                                </div>
                                <div class="col-md-4">
                                    <label for="fechaTS">Fecha de terminacion:</label>
                                    <input type="text" class="form-control datepicker" name="fechaTS" id="fechaTS">
                                    <br>
                                </div>
                            </div>
                         </fieldset>
                         <fieldset class ="datosFirma">
                         <legend id="datosP">
                            <center>Datos del tecnologico y fecha de la firma</center>
                        </legend>
                        <div class="row">
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
                        <button class="btn btn-primary" name="registrar" type="submit" id="registrar" style="background-color: #1b396a;">Generar</button>
                    </center>
                </form>

            </div>
            <div class="col-md-2"></div>
        </div>
        </div>
    </div>
</div>
<?php 
    include "includes/footerSesion.php";
    
    ?>
        <script src= "public/js/inicio/datosCartaC.js"></script>
        <script>
            let NoControl = '<?php echo $NoControl; ?>'
            datosPersonalesCartaC(NoControl);
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
        <script>
$(document).ready(function() {
    $('.datepicker').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true,
        todayHighlight: true
    });
});
</script>
<script src= "sass/public/js/usuarios/alumno.js"></script>
    <?php
        } else {
            header("location:index.php");
        }
    ?>