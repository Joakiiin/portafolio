<?php
include_once "../clases/Conexion.php";
$conexion = new Conexion();
$query2 = "SELECT idPrograma, NombreP FROM programa";
$resultado2 = mysqli_query($conexion->conectar(), $query2);
?>
 <form id="frmActualizarProgramaS" method="POST" enctype="multipart/form-data" onsubmit="return actualizarProgramaS()">  
   <div class="modal fade" id="modalActualizarProgramaS" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"><span class="fas fa-user-plus"></span> asignar
                        un nuevo programa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row">
                  <div class="col-sm-4">
                      <label for="idPSU">Registro</label>
                      <input type="text" class="form-control" id="idPSU" name="idPSU" required>
                                  </div>
                  <div class="col-sm-4">
                      <label for="nocontrolSU">NoControl</label>
                      <input type="text" class="form-control" id="nocontrolSU" name="nocontrolSU" required>
                                  </div> 
                  <div class="col-sm-6">
                      <label for="idproS_U">Programa</label>
                      <select class="form-control" id="idproS_U" name="idproS_U" >
                      <?php while ($fila = mysqli_fetch_array($resultado2)) { ?>
                      <option value="<?php echo $fila['idPrograma']; ?>"><?php echo $fila['NombreP']; ?></option>
    
                      <?php } ?>
                                </select>                                  
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