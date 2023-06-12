<form id="frmActualizarDep" method="POST" enctype="multipart/form-data" onsubmit="return actualizarDep()">  
   <div class="modal fade" id="modalActualizarDep" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"><span class="fas fa-user-plus"></span> Actualizar Dependencias</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row">
                  <div class="col-md-4">
                                    <label for="cpU">C.P:</label>
                                    <input type="text" name="cpU" class="form-control" id="cpU" placeholder="Ej.: 07209">
                                </div>
                                <div class="col-md-4">
                                    <label for="estadoU">Estado:</label>
                                    <input type="text" name="estadoU" class="form-control" id="estadoU" placeholder="Ej.: Ciudad de Mèxico">
                                </div>
                                <div class="col-md-4">
                                    <label for="ciudadU">Ciudad:</label>
                                    <input type="text" name="ciudadU" class="form-control" id="ciudadU" placeholder="Ej.: Ciudad de Mèxico">
                                </div>
                                <div class="col-md-4">
                                    <label for="municipioU">Municipio/Alcaldia:</label>
                                    <input type="text" name="municipioU" class="form-control" id="municipioU" required placeholder="Ej.: Gustavo A. Madero"></select>
                                    <br>
                                </div>
                                <div class="col-md-8">
                                    <label for="coloniaU">Colonia:</label>
                                    <input type="text" name="coloniaU" class="form-control" id="coloniaU" placeholder="Ej.: Colonia Tlatelolco">
                                </div>
                                <div class="col-md-4">
                                    <label for="calleU">Calle y Numero:</label>
                                    <input type="text" name="calleU" class="form-control" id="calleU" required placeholder="Ej.: Palmira #13">
                                    <br>
                                </div>
                  <div class="col-sm-4">
                      <label for="idDepU">NoControl</label>
                      <input type="text" class="form-control" id="idDepU" name="idDepU" required>
                    </div>
                    <div class="col-sm-4">
                      <label for="nombreDU">Nombre Dependencia</label>
                      <input type="text" class="form-control" id="nombreDU" name="nombreDU" required>
                    </div>
                    <div class="col-sm-4">
                      <label for="titularDU">Titular Dependencia</label>
                      <input type="text" class="form-control" id="titularDU" name="titularDU" required>
                    </div>
                    <div class="col-sm-4">
                      <label for="puestoU">Puesto</label>
                      <input type="text" class="form-control" id="puestoU" name="puestoU" required>
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