<?php
include_once "../clases/Conexion.php";
$conexion = new Conexion();
$query1 = "SELECT NoControl, Nombre, ApellidoP, ApellidoM FROM alumno WHERE NoControl NOT IN (SELECT NoControl1 FROM programaseleccionado)";
$query2 = "SELECT idPrograma, NombreP FROM programa";
$resultado1 = mysqli_query($conexion->conectar(), $query1);
$resultado2 = mysqli_query($conexion->conectar(), $query2);
?>
 <form id="frmAsignarPrograma" method="POST" enctype="multipart/form-data" onsubmit="return asignarPrograma()">  
   <div class="modal fade" id="modalAsignarPrograma" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"><span class="fas fa-user-plus"></span> Agregar
                        un nuevo programa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row">
                  <div class="col-sm-6">
                      <label for="idproS">Programa</label>
                      <select class="form-control" id="idproS" name="idproS" >
                      <?php while ($fila = mysqli_fetch_array($resultado2)) { ?>
                      <option value="<?php echo $fila['idPrograma']; ?>"><?php echo $fila['NombreP']; ?></option>
    
                      <?php } ?>
                                </select>                                  
                              </div>  
                    <div class="col-sm-6">
                      <label for="nocontrolS">Alumno</label>
                      <select class="form-control" id="nocontrolS" name="nocontrolS" >
                      <?php while ($fila = mysqli_fetch_array($resultado1)) { ?>
                      <option value="<?php echo $fila['NoControl']; ?>"><?php echo $fila['NoControl'].'-'.
                      $fila['Nombre'].' '.$fila['ApellidoP'].' '.$fila['ApellidoM']; ?></option>
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