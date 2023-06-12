
 <?php
include_once '../../conexion/con_db.php';
?>
 <form id="frmAgregarAlumno" method="POST" enctype="multipart/form-data" onsubmit="return agregarNuevoAlumno()">  
   <div class="modal fade" id="modalAgregarAlumno" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"><span class="fas fa-user-plus"></span> Agregar
                        un nuevo usuario</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row">
                  <div class="col-sm-4">
                      <label for="nocontrol">NoControl</label>
                      <input type="text" class="form-control" id="nocontrol" name="nocontrol" required>
                    </div>
                    <div class="col-sm-4">
                      <label for="pass">Password</label>
                      <input type="text" class="form-control" id="pass" name="pass" required>
                    </div>
                    <div class="col-sm-4">
                      <label for="paterno">Apellido Paterno</label>
                      <input type="text" class="form-control" id="paterno" name="paterno" required>
                    </div>
                    <div class="col-sm-4">
                      <label for="materno">Apellido Materno</label>
                      <input type="text" class="form-control" id="materno" name="materno" required>
                    </div>
                    <div class="col-sm-4">
                      <label for="nombre">Nombre</label>
                      <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="col-sm-4">
                      <label for="sexo">Sexo</label>
                      <select class="form-control" id="sexo" name="sexo" required>
                      <option value=""></option>
                        <option value="Femenino">Femenino</option>
                        <option value="Masculino">Masculino</option>
                      </select>
                    </div>
                    <div class="col-sm-4">
                      <label for="telefono">Telefono</label>
                      <input type="text" class="form-control" id="telefono" name="telefono">
                    </div>
                    <div class="col-sm-4">
                      <label for="correo">Correo</label>
                      <input type="text" class="form-control" id="correo" name="correo">
                    </div>
                    <div class="col-sm-4">
                      <label for="creditos">Creditos</label>
                      <input type="text" class="form-control" id="creditos" name="creditos">
                    </div>
                    <div class="col-sm-4">
                      <label for="carrera">Carrera</label>
                      <select class="form-control" id="carrera" name="carrera" >
                                    <option value="1">IGE</option>
                                    <option value="2">ARQ</option>
                                    <option value="3">IND</option>
                                    <option value="4">ITICs</option>
                                </select>                    </div>
                    <div class="col-sm-4">
                      <label for="semestre">Semestre</label>
                      <select class="form-control" id="semestre" name="semestre" >
                                    <option value="1">PRIMERO</option>
                                    <option value="2">SEGUNDO</option>
                                    <option value="3">TERCERO</option>
                                    <option value="4">CUARTO</option>
                                    <option value="5">QUINTO</option>
                                    <option value="6">SEXTO</option>
                                    <option value="7">SEPTIMO</option>
                                    <option value="8">OCTAVO</option>
                                    <option value="9">NOVENO</option>
                                    <option value="10">DECIMO</option>
                                    <option value="11">ONCEAVO</option>
                                    <option value="12">DOCEAVO</option>
                                </select>
                    </div>
                    <div class="col-sm-4">
                      <label for="edad">Edad</label>
                      <input type="text" class="form-control" id="edad" name="edad">
                    </div>
                    <div class="col-sm-4">
                    <label for="periodo" class="control-label">Periodo:</label>
    <select class="form-control" id="periodo" name="periodo">
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
                    <div class="col-sm-8">
                    <label for="file" class="col-sm-2 control-label">Kardex</label>
						<input type="file" class="form-control" id="file" name="file">
                    </div>
                  </div>
                </div>

                        <div class="modal-footer">
                            <span class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</span>
                            <button class="btn btn-primary">Agregar</button>
                        </div>

                    </div>
            </div>
   </div>
 </form>
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