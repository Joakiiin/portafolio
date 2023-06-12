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
                <form id="frmPlandetrabajo" action="formatos/plandetrabajo.php" target="_blank" method="post" onsubmit="return agregarPlanAlumno()">
                    <center>
                        <h2>
                            <b>Plan de trabajo</b>
                        </h2>
                    </center>
                    <br>
                    <fieldset class="leyenda">
                        <legend id="importancia">
                        <center>Datos para llenar su plan de trabajo:</center>
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
                                <div class="col-md-4">
                                    <label for="periodoS">Periodo:</label>
                                    <input type="text" name="periodoS" class="form-control" id="periodoS">
                                    <br>
                                </div>
                                <div class="col-md-4">
                                    <label for="yearS">Año:</label>
                                    <input type="text" name="yearS" class="form-control" id="yearS">
                                    <br>
                                </div>
                            </div>
                        </div>
                        </fieldset>
                        <!--Contenido datos del programa-->
                         <fieldset class ="datosP">
                         <legend id="datosP">
                            <center>Datos del Programa</center>
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
                            <label for="nombrePS">Nombre del programa:</label>
                            <input type="text" name="nombrePS" class="form-control" id="nombrePS">
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
                         </fieldset>
                         <fieldset class="preguntas">
                         <legend id="datosPreguntas">
                            <center>Preguntas</center>
                        </legend>
                        <div class="form-group">
                        <label for="pregunta1">a) Objetivo del programa en el que participará el alumno.</label>
                        <textarea name="pregunta1" id="pregunta1" rows="4" cols="70" maxlength="500"></textarea>
                        <div id="counter1"></div>
                        </div>
                        <div class="form-group">
                        <label for="pregunta2">b) Descripción del programa en el que participará el alumno.</label>
                        <textarea name="pregunta2" id="pregunta2" rows="4" cols="70" maxlength="500"></textarea>
                        <div id="counter2"></div>
                        </div>
                        <div class="form-group">
                        <label for="pregunta3">c) Justificación de la participación del alumno.</label>
                        <textarea name="pregunta3" id="pregunta3" rows="4" cols="70" maxlength="500"></textarea>
                        <div id="counter3"></div>
                        </div>
                        <div class="form-group">
                        <label for="pregunta4">d) Sector de la Población al que impactará tu servicio social.</label>
                        <textarea name="pregunta4" id="pregunta4" rows="4" cols="70" maxlength="500"></textarea>
                        <div id="counter4"></div>
                        </div>
                        <div class="form-group">
                        <label for="pregunta5">e) Cantidad de personas beneficiadas con tu Servicio Social.</label>
                        <textarea name="pregunta5" id="pregunta5" rows="4" cols="70" maxlength="500"></textarea>
                        <div id="counter5"></div>
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
        <script src= "public/js/inicio/datosPlan.js"></script>

        <script src="public/js/inicio/caracteres3.js"></script>
        <script>
            let NoControl = '<?php echo $NoControl; ?>'
            datosPersonalesPlan(NoControl);
        </script> 
        <script>
</script>
<script src= "sass/public/js/usuarios/alumno.js"></script>
    <?php
        } else {
            header("location:index.php");
        }
    ?>