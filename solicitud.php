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
                
                    <center>
                        <h2>
                            <b>Solicitud de servicio social</b>
                        </h2>
                    </center>
                    <br>
                    <fieldset class="leyenda">
                        <legend id="importancia">
                            <center>Datos para llenar su solicitud de servicio social:</center>
                        </legend>
                        <p class="text-center" id="informacion" size="16">
                            <b>
                                "¡¡No todo es letras mayúsculas!!"
                                <br>
                                "Favor de seleccionar letras mayúsculas y minúsculas"
                                <br>
                                "Tome en cuenta que la mayoria de datos se llenan en automatico"
                                <br>
                                "Para la direccion solo basta con presionar ingresar su codigo postal
                                y presionar el boton de validar"
                                <br>
                                "Si la direccion que devuelve es erronea es libre de corregirla manualmente"
                            </b>
                        </p>
                    </fieldset>
                    <br>
                    
                     <!--Contenido Domicilio-->
                    <fieldset class="direcciones">
                        <legend id="direcciones">
                            <center>Domicilio</center>
                        </legend>
                        <p class="text-center" id="direccion" size="16">
                            <b>
                                "¡¡Para su direccion favor de llenar con su codigo postal!!"
                                <br>
                                "En caso de estar mal los datos del autorellenado puede correjirla manualmente"
                                <br>
                                "Algunos campos poseen desplegable, si no esta algun dato de tu direccion puede buscarlo"
                                <br>
                            </b>
                        </p>
                        <form method="get" action="procesos/alumno/crud/datos_estado.php" onsubmit="obtenerDatos(event)">
                        <label for="d_codigo">CP:</label>
                        <input type="text" id="d_codigo" name="d_codigo" value="<?php echo isset($_GET['d_codigo']) ? $_GET['d_codigo'] : ''; ?>">
                        <button type="submit">Enviar</button>
                        </form>
                        <br>
                        <form id="frmSolicitud" action="formatos/tecnm01.php" target="_blank" method="post" onsubmit="return agregarFechasAlumno()"  enctype="multipart/form-data">
                        <div class="form-gruop">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="cp">C.P:</label>
                                    <input type="text" name="cp" class="form-control" id="cp" placeholder="Ej.: 07209">
                                </div>
                                <div class="col-md-4">
                                    <label for="estado">Estado:</label>
                                    <input type="text" name="estado" class="form-control" id="estado" placeholder="Ej.: Ciudad de Mèxico">
                                </div>
                                <div class="col-md-4">
                                    <label for="ciudad">Ciudad:</label>
                                    <select name="ciudad" class="form-control" id="ciudad"></select>
                                    <br>
                                </div>
                                <div class="col-md-4">
                                    <label for="municipio">Municipio/Alcaldia:</label>
                                    <input type="text" name="municipio" class="form-control" id="municipio" required placeholder="Ej.: Gustavo A. Madero"></select>
                                    <br>
                                </div>
                                <div class="col-md-8">
                                    <label for="colonia">Colonia:</label>
                                    <select name="colonia" class="form-control" id="colonia" required placeholder="Ej.: Guadalipe Victoria"></select>
                                    <br>
                                </div>
                                <div class="col-md-4">
                                    <label for="calle">Calle y Numero:</label>
                                    <input type="text" name="calle" class="form-control" id="calle" required placeholder="Ej.: Palmira #13">
                                    <br>
                                </div>
                            </div>
                        </div>
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
                        <div class="form-group"> 
                            <label for="sexoS" class="control-label">Sexo: </label>
                            <select class="form-control" id="sexoS" name="sexoS" >
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                            </select>
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
                                    <label for="periodoS">Periodo:</label>
                                    <input type="text" name="periodoS" class="form-control" id="periodoS">
                                    <br>
                                </div>
                                <div class="col-md-4">
                                    <label for="yearS">Año:</label>
                                    <input type="text" name="yearS" class="form-control" id="yearS">
                                    <br>
                                </div>
                                <div class="col-md-4">
                                    <label for="semestreS">Semestre:</label>
                                    <input type="text" name="semestreS" class="form-control" id="semestreS">
                                    <br>
                                </div>
                                <div class="col-md-8">
                                    <label for="foto">Foto (Alto: 147px, Ancho: 153px):</label>
                                    <input type="file" name="foto" id="foto">
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
                            <label for="puestoS">Puesto:</label>
                            <input type="text" name="puestoS" class="form-control" id="puestoS">
                        </div>
                        <div class="form-group">
                            <label for="nombrePS">Nombre del programa:</label>
                            <input type="text" name="nombrePS" class="form-control" id="nombrePS">
                        </div>
                        <div class="row">
                                <div class="col-md-4">
                                    <label for="modalidadS">Modalidad:</label>
                                    <input type="text" name="modalidadS" class="form-control" id="modalidadS">
                                </div>
                                <div class="col-md-4">
                                    <label for="fechaIS">Fecha de inicio:</label>
                                    <input type="text" class="form-control datepicker" name="fechaIS" id="fechaIS" placeholder="Ej: 08-03-2023" required>                                
                                </div>
                                <div class="col-md-4">
                                    <label for="fechaTS">Fecha de terminacion:</label>
                                    <input type="text" class="form-control datepicker" name="fechaTS" id="fechaTS" placeholder="Ej: 08-12-2023" required>
                                    <br>
                                </div>
                                <div class="col-md-10">
                                    <label for="ActividadesRep">Actividades(Espacio limitado, sea lo mas breve posible):</label>
                                    <textarea class="form-control" id="ActividadesRep" name="ActividadesRep" rows="3" cols="70" maxlength="360"></textarea>
                                    <div id="counter"></div>                                    
                                    <br>
                                </div>
                            </div>
                         </fieldset>
                        <!--Contenido tipo de programa-->
                        <fieldset class="tipoP">
                        <legend id="tipoP">
                            <center>Tipo de Programa</center>
                        </legend>
                        <div class="form-group">
                        <label for="tipoPS">Tipo de programa</label>
                        <select class="form-control" id="tipoPS" name="tipoPS" >
                                    <option value="1">Educación para adultos</option>
                                    <option value="2">Actividades deportivas</option>
                                    <option value="3">Actividades cívicas</option>
                                    <option value="4">Apoyo a la salud</option>
                                    <option value="5">Desarrollo de comunidad</option>
                                    <option value="6">Actividades culturales</option>
                                    <option value="7">Desarrollo Sustentable</option>
                                    <option value="8">Medio ambiente</option>
                                    <option value="9">Otros</option>
                                </select>
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
        <script src= "public/js/inicio/datosSolicitud.js"></script>
        
        <script>
            let NoControl = '<?php echo $NoControl; ?>'
            datosPersonalesSolicitud(NoControl);
        </script> 
        <script>
$(document).ready(function() {
    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true,
        todayHighlight: true
    });
});
</script>
<script>
function obtenerDatos(event) {
  event.preventDefault(); // Evita que el formulario se envíe de forma tradicional
  const d_codigo = document.getElementById("d_codigo").value;
  fetch(`procesos/alumno/crud/datos_estado.php?d_codigo=${d_codigo}`)
    .then(response => response.json())
    .then(data => {
      if (data.error) {
        alert(data.error); // Muestra un mensaje de error si no se encontraron datos para el paciente
      } else {
        console.log(data);
        document.getElementById("estado").value = data[0].d_estado; // Actualiza el campo de estado con los datos del estado
        document.getElementById("cp").value = data[0].d_codigo; // Actualiza el campo de cp con los datos del estado
        document.getElementById("municipio").value = data[0].D_mnpio;
        //Ciudades
        const ciudadSelect = document.getElementById("ciudad");
        ciudadSelect.innerHTML = ""; // Borra todas las opciones previas del menú desplegable
        for (let i = 0; i < data.length; i++) {
          const ciudad = data[i].d_ciudad;
          const option = document.createElement("option");
          option.text = ciudad;
          ciudadSelect.add(option); // Agrega la opción al menú desplegable
        }
        //Colonias
        const coloniaSelect = document.getElementById("colonia");
        coloniaSelect.innerHTML = ""; // Borra todas las opciones previas del menú desplegable
        for (let i = 0; i < data.length; i++) {
          const colonia = data[i].d_asenta;
          const option = document.createElement("option");
          option.text = colonia;
          coloniaSelect.add(option); // Agrega la opción al menú desplegable
        }
      }
    })
    .catch(error => console.error(error));
}
</script>
<script src= "sass/public/js/usuarios/alumno.js"></script>
<script src="public/js/inicio/caracteres.js"></script>
        <script src="public/js/inicio/caracteres2.js"></script>
    <?php
        } else {
            header("location:index.php");
        }
    ?>