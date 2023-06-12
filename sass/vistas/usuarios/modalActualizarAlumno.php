<?php
include_once '../../conexion/con_db.php';
?>
<form id="frmActualizarAlumno" method="POST" enctype="multipart/form-data" onsubmit="return actualizarAlumno()">  
   <div class="modal fade" id="modalActualizarAlumno" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"><span class="fas fa-user-plus"></span> Actualizar alumno</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row">
                  <div class="col-sm-4">
                      <label for="nocontrolU">NoControl</label>
                      <input type="text" class="form-control" id="nocontrolU" name="nocontrolU" required>
                    </div>
                    <div class="col-sm-4">
                      <label for="paternoU">Apellido Paterno</label>
                      <input type="text" class="form-control" id="paternoU" name="paternoU" required>
                    </div>
                    <div class="col-sm-4">
                      <label for="maternoU">Apellido Materno</label>
                      <input type="text" class="form-control" id="maternoU" name="maternoU" required>
                    </div>
                    <div class="col-sm-4">
                      <label for="nombreU">Nombre</label>
                      <input type="text" class="form-control" id="nombreU" name="nombreU" required>
                    </div>
                    <div class="col-sm-4">
                      <label for="sexoU">Sexo</label>
                      <select class="form-control" id="sexoU" name="sexoU" required>
                      <option value=""></option>
                        <option value="Femenino">Femenino</option>
                        <option value="Masculino">Masculino</option>
                      </select>
                    </div>
                    <div class="col-sm-4">
                      <label for="telefonoU">Telefono</label>
                      <input type="text" class="form-control" id="telefonoU" name="telefonoU">
                    </div>
                    <div class="col-sm-4">
                      <label for="correoU">Correo</label>
                      <input type="text" class="form-control" id="correoU" name="correoU">
                    </div>
                    <div class="col-sm-2">
                      <label for="carreraU">Act. Carrera</label>
                      <select class="form-control" id="carreraU" name="carreraU" >
                                    <option value="1">IGE</option>
                                    <option value="2">ARQ</option>
                                    <option value="3">IND</option>
                                    <option value="4">ITICs</option>
                                </select>
                    </div>
                   
                    <div class="col-sm-3">
                      <label for="semestreU">Act. Semestre</label>
                      <select class="form-control" id="semestreU" name="semestreU" >
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
                      <label for="edadU">Edad</label>
                      <input type="text" class="form-control" id="edadU" name="edadU">
                    </div>
                    <div class="col-sm-4">
                      <label for="creditosU">Creditos</label>
                      <input type="text" class="form-control" id="creditosU" name="creditosU">
                    </div>
                    <div class="col-sm-4">
                    <label for="periodoU" class="control-label">Periodo:</label>
    <select class="form-control" id="periodoU" name="periodoU">
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
                      <label for="fechaU" class="control-label">Año:</label>
                            <select id="fechaU" name="fechaU">
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
                  </div>
                </div>

                        <div class="modal-footer">
                            <span class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</span>
                            <button class="btn btn-primary">Actualizar</button>
                        </div>

                    </div>
            </div>
   </div>
 </form>