<?php include("includes/headerSesion.php") ?>

<?php
include_once 'conexion/con_db.php';
?>

        <br>
        <br>

        <!--Contenido principal-->
        
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <form action="registrar.php" method="post" enctype="multipart/form-data">
                    <center>
                        <h2>
                            <b>Crear Usuario</b>
                        </h2>
                    </center>
                    <div class="card-body">
    <h1 class="card-title">¡Bienvenido/a a nuestra plataforma de Servicio Social!</h1>
    <p class="card-text">Estimados usuarios,</p>
    <p class="card-text">Queremos informarles sobre el proceso de registro en nuestra plataforma de servicio social. Les pedimos que sigan las siguientes instrucciones cuidadosamente:</p>
    <ol>
      <li>Llenen todos sus datos de registro de manera precisa y revisen minuciosamente la información antes de enviarla.</li>
      <li>Una vez que hayan registrado sus datos, deberán esperar a que les llegue una notificación por correo electrónico confirmando que su registro ha sido aprobado.</li>
      <li>La revisión y aprobación de su registro puede tomar un tiempo, así que les pedimos que tengan paciencia. Les informaremos por correo electrónico tan pronto como su registro sea aprobado o en caso de que se necesite información adicional.</li>
      <li>Una vez que su registro sea aprobado, podrán acceder a nuestra plataforma y comenzar a explorar las opciones de servicio social disponibles.</li>
    </ol>
    <p class="card-text">Si tienen alguna pregunta o necesitan más orientación durante el proceso de registro, no duden en contactarnos. Estaremos encantados de ayudarles.</p>
    <p class="card-text">¡Gracias por unirse a nuestra plataforma de servicio social!</p>
    <p class="card-text">Atentamente,</p>
    <p class="card-text">Departamento de Gestión Tecnológica y Vinculación</p>
  </div>
</div>
                    <br>

                    <fieldset class="datosInicioSesion">
                        <legend id="importancia">
                            <center>Datos para iniciar sesión:</center>
                        </legend>
                        <br>
                        <p class="text-center" id="informacion" size="16">
                            <b>
                                "¡¡No todo es letras mayúsculas!!"
                                <br>
                                "Favor de seleccionar letras mayúsculas y minúsculas"
                            </b>
                        </p>
                        <br>
                        <div class="form-group">
                            <label for="">No de control:</label>
                            <input type="text" name="nocontrol" class="form-control" id="nocontrol" placeholder="Ej.: 16500000">
                        </div>

                        <div class="form-group">
                            <label for="">Contraseña:</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="********">
                        </div>
                    </fieldset>

                    <fieldset class="datosPersonales">
                        <legend id="importancia">
                            <center>Datos personales</center>
                        </legend>
                        <div class="form-gruop">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="app">Apellido Paterno:</label>
                                    <input type="text" name="app" class="form-control" id="app" placeholder="Ej.: Hernández">
                                </div>
                                <div class="col-md-4">
                                    <label for="apm">Apellido Materno:</label>
                                    <input type="text" name="apm" class="form-control" id="apm" placeholder="Ej.: Oregón">
                                </div>
                                <div class="col-md-4">
                                    <label for="nombres">Nombre(s):</label>
                                    <input type="text" name="nombres" class="form-control" id="nombres" required placeholder="Ej.: Joaquín">
                                    <br>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="edad">Edad:</label>
                            <input type="number" name="edad" class="form-control" id="edad" placeholder="23">
                        </div>

                        <div class="form-group">
                            <label for="tel">Teléfono Móvil:</label>
                            <input type="text" name="tel" class="form-control" id="tel"  placeholder="Ej.: 55-55-55-55-55">
                        </div>

                        <div class="form-group"> 
                            <label for="sexo" class="control-label">Sexo: </label>
                            <select class="form-control" id="sexo" name="sexo" >
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                            </select>
                        </div>

                        <div class="form-group"> 
                            <label for="" class="control-label">Carrera: </label>
                            <select class="form-control" id="carrera" name="carrera">
                                <?php
                                $con=conexion();
                                $sql= "SELECT * FROM carrera";
                                $query= mysqli_query($con,$sql);
                                while ($row=mysqli_fetch_array($query)) {
                                    $nocarrera=$row['NoCarrera'];
                                    $carrera=$row['Carrera'];
                                    ?>
                                    <option value="<?php echo $nocarrera ?>"><?php echo $carrera ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group"> 
                            <label for="" class="control-label">Semestre: </label>
                            <select class="form-control" id="semestre" name="semestre">
                                <?php
                                $con=conexion();
                                $sql= "SELECT * FROM semestre";
                                $query= mysqli_query($con,$sql);
                                while ($row=mysqli_fetch_array($query)) {
                                    $nosemestre=$row['NoSemestre'];
                                    $semestre=$row['Semestre'];
                                    ?>
                                    <option value="<?php echo $nosemestre ?>"><?php echo $semestre ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group"> 
    <label for="periodo" class="control-label">Periodo:</label>
    <select class="form-control" id="periodo" name="periodo" readonly>
        <?php
        $con=conexion();
        $sql= "SELECT * FROM periodo";
        $query= mysqli_query($con,$sql);
        $mes_actual = date('n'); // Obtiene el mes actual (1 al 12)
        $periodo_actual = ($mes_actual >= 1 && $mes_actual <= 6) ? "Enero/Junio" : "Agosto/Diciembre";
        // Verifica si el mes actual está en el rango de Enero a Junio, de lo contrario, se asume que está en el rango de Agosto a Diciembre
        
        while ($row=mysqli_fetch_array($query)) {
            $idPeriodo=$row['idPeriodo'];
            $Periodo=$row['Periodo'];
            $selected = ($Periodo == $periodo_actual) ? "selected" : ""; // Establece la opción como seleccionada si es el periodo actual
            ?>
            <option value="<?php echo $idPeriodo ?>" <?php echo $selected ?>><?php echo $Periodo ?></option>
            <?php
        }
        ?>
    </select>
</div>
<div class="form-group"> 
    <label for="fecha" class="control-label">Año:</label>
    <select id="fecha" name="fecha">
  <?php
    // Definir rango de años
    $start_year = 2023;
    $end_year = date("Y");
    
    // Generar opciones de años
    for ($i = $end_year; $i >= $start_year; $i--) {
      echo "<option value='$i'>$i</option>";
    }
  ?>
</select>
</div>
                        <div class="form-group">
                            <label for="creditos">Créditos Aprobados (<u><font color = "red">solo colocar el número</font></u>):</label>
                            <input type="text" name="creditos" class="form-control" id="creditos" placeholder="Ej.: 246">
                            <span id="error-message" style="color: red;"></span>
                        </div>

                        <div class="form-group">
                            <label for="email">Correo Electrónico Institucional:</label>
                            <input type="text" name="email" class="form-control" id="email" placeholder="Ej.: daniel.bg@tecnm.mx">
                        </div>

                        <div class="form-group">
					<label for="file" class="col-sm-2 control-label">Kardex</label>
					<div class="col-sm-10">
						<input type="file" class="form-control" id="file" name="file">
					</div>
				</div>
                    </fieldset>

                    <center>
                        <button class="btn btn-primary" name="registrar" type="submit" id="registrar" style="background-color: #1b396a;">Registrar</button>
                    </center>
                </form>

            </div>
            <div class="col-md-2"></div>
        </div>

        <br>
        <script>
    var inputCreditos = document.getElementById("creditos");
    var errorMessage = document.getElementById("error-message");

    inputCreditos.addEventListener("input", function() {
        var creditos = parseInt(inputCreditos.value);

        var porcentajeMinimo = 70;
        var maxCreditos = 260;
        var porcentajeMaximo = (maxCreditos * porcentajeMinimo) / 100;

        if (isNaN(creditos) || creditos < porcentajeMaximo) {
            errorMessage.textContent = "El número de créditos debe ser mayor o igual al 70% de los 260 créditos máximos.";
        } else {
            errorMessage.textContent = "";
        }
    });
</script>

        <script>
    // Obtener el campo "select" por su ID
    var periodoSelect = document.getElementById("periodo");

    // Deshabilitar la edición del campo "select"
    periodoSelect.addEventListener("mousedown", function(e){
        e.preventDefault();
        this.blur();
        window.focus();
    });
</script>
<script>
    // Obtener el campo "select" por su ID
    var periodoSelect = document.getElementById("fecha");

    // Deshabilitar la edición del campo "select"
    periodoSelect.addEventListener("mousedown", function(e){
        e.preventDefault();
        this.blur();
        window.focus();
    });
</script>
<?php include("includes/footerSesion.php") ?>