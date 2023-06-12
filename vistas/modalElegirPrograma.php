<form id="frmElegirPrograma" method="POST" enctype="multipart/form-data" onsubmit="return elegirPrograma()">  
   <div class="modal fade" id="modalElegirPrograma" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"><span class="fas fa-user-plus"></span> Elegir programa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row">
                  <div class="col-sm-4"><input type="text" hidden name="rol" id="rol" value= "<?php echo $_SESSION['alumno']['rol'];?>">
                  <input type="text" hidden name="NoControl" id="NoControl" value= "<?php echo $_SESSION['alumno']['nocontrol'];?>">
                      <label for="idPrograma">Id</label>
                      <input type="text" class="form-control" id="idPrograma" name="idPrograma" required>                                  
                              </div>  
                    <div class="col-sm-4">
                      <label for="NombreP">Nombre</label>
                      <input type="text" class="form-control" id="NombreP" name="NombreP" required>      
                              </div>
                              <div class="col-sm-4">
                      <label for="Objetivo">Objetivo</label>
                      <input type="text" class="form-control" id="Objetivo" name="Objetivo" required>      
                              </div>
                              <div class="col-sm-4">
                      <label for="idDependencia">id Dependencia</label>
                      <input type="text" class="form-control" id="idDependencia" name="idDependencia" required>      
                              </div>
                              <div class="col-sm-4">
                      <label for="idTipoAct">Tipo Actividad</label>
                      <input type="text" class="form-control" id="idTipoAct" name="idTipoAct" required>      
                              </div>
                              <div class="col-sm-4">
                      <label for="idModalidad">Modalidad</label>
                      <input type="text" class="form-control" id="idModalidad" name="idModalidad" required>      
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