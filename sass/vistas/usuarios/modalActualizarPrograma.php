<?php
include_once "../clases/Conexion.php";
$conexion = new Conexion();
$query1 = "SELECT idModalidad, Modalidad FROM modalidad";
$query2 = "SELECT idTipoAct, Actividad FROM tipoactividad";
$query3 = "SELECT idDependencia, NombreDep FROM dependencia";
$resultado1 = mysqli_query($conexion->conectar(), $query1);
$resultado2 = mysqli_query($conexion->conectar(), $query2);
$resultado3 = mysqli_query($conexion->conectar(), $query3);

?>
<form id="frmActualizarPrograma" method="POST" enctype="multipart/form-data" onsubmit="return actualizarPrograma()">  
   <div class="modal fade" id="modalActualizarPrograma" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"><span class="fas fa-user-plus"></span> Actualizar programa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row">
                  <div class="col-sm-4">
                      <label for="idproU">Id Programa</label>
                      <input type="text" class="form-control" id="idproU" name="idproU" required>
                                  </div>  
                    <div class="col-sm-4">
                      <label for="namepU">Nombre</label>
                      <input type="text" class="form-control" id="namepU" name="namepU" required>
                    </div>
                    <div class="col-sm-4">
                      <label for="objU">Objetivo</label>
                      <input type="text" class="form-control" id="objU" name="objU" required>
                    </div>
                    <div class="col-sm-4">
                      <label for="tipU">Tipo Actividad</label>
                      <select class="form-control" id="tipU" name="tipU" >
                      <?php while ($fila = mysqli_fetch_array($resultado2)) { ?>
                      <option value="<?php echo $fila['idTipoAct']; ?>"><?php echo $fila['Actividad']; ?></option>
    
                      <?php } ?>
                                </select>
                    </div>
                    
                    <div class="col-sm-3">
                      <label for="modU">Modalidad</label>
                      <select class="form-control" id="modU" name="modU" >
                      <?php while ($fila = mysqli_fetch_array($resultado1)) { ?>
                      <option value="<?php echo $fila['idModalidad']; ?>"><?php echo $fila['Modalidad']; ?></option>
    
                      <?php } ?>
                                </select>
                    </div>
                    <div class="col-sm-4">
                      <label for="depU">Dependencia</label>
                      <select class="form-control" id="depU" name="depU" >
                      <?php while ($fila = mysqli_fetch_array($resultado3)) { ?>
                      <option value="<?php echo $fila['idDependencia']; ?>"><?php echo $fila['NombreDep']; ?></option>
    
                      <?php } ?>
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