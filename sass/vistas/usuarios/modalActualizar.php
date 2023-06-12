<!-- Modal -->
<form id="frmActualizarUsuario" method="POST" onsubmit="return actualizarUsuario()">
    <div class="modal fade" id="modalActualizarUsuarios" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar datos de usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" id="idUsuario" name="idUsuario" hidden>
                    <div class="accordion" id="accordionPanelsStayOpenExample">
                        
                        <!-- Datos personales -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                    aria-controls="panelsStayOpen-collapseOne">
                                    <b>Datos personales</b>
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                aria-labelledby="panelsStayOpen-headingOne">
                                <div class="accordion-body">
                                    <div class="row" style="padding-bottom: 5px;">
                                        <div class="col-sm-4">
                                            <label for="paternou" class="form-label">Apellido paterno</label>
                                            <input type="text" class="form-control" id="paternou" name="paternou"
                                                placeholder="Paterno" required>
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="maternou" class="form-label">Apellido materno</label>
                                            <input type="text" class="form-control" id="maternou" name="maternou"
                                                placeholder="Materno" required>
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="nombreu" class="form-label">Nombres</label>
                                            <input type="text" class="form-control" id="nombreu" name="nombreu"
                                                placeholder="Nombre" required>
                                        </div>
                                    </div>

                                    <div class="row" style="padding-bottom: 5px;">
                                        <div class="col-sm-4">
                                            <label for="edadu" class="form-label">Edad</label>
                                            <input type="text" class="form-control" id="edadu" name="edadu"
                                                placeholder="Edad" required>
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="sexou" class="form-label">Sexo</label>
                                            <select class="form-control" id="sexou" name="sexou">
                                                <option value=""></option>
                                                <option value="Femenino">Femenino</option>
                                                <option value="Masculino">Masculino</option>
                                            </select>
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="telefonou" class="form-label">Teléfono</label>
                                            <input type="text" class="form-control" id="telefonou" name="telefonou"
                                                placeholder="Teléfono" required>
                                        </div>
                                    </div>

                                    <div class="row" style="padding-bottom: 5px;">
                                        <div class="col-sm-12">
                                            <label for="correou" class="form-label">Correo</label>
                                            <input type="text" class="form-control" id="correou" name="correou"
                                                placeholder="Correo">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Datos de domicilio -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                                    aria-controls="panelsStayOpen-collapseTwo">
                                    <b>Domicilio</b>
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                                aria-labelledby="panelsStayOpen-headingTwo">
                                <div class="accordion-body">
                                    <div class="row" style="padding-bottom: 5px;">
                                        <div class="col-sm-4">
                                            <label for="calleu" class="form-label">Calle</label>
                                            <input type="text" class="form-control" id="calleu" name="calleu"
                                                placeholder="Calle" required>
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="nExterioru" class="form-label">Número exterior</label>
                                            <input type="text" class="form-control" id="nExterioru" name="nExterioru"
                                                placeholder="Número exterior" required>
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="nInterioru" class="form-label">Número interior</label>
                                            <input type="text" class="form-control" id="nInterioru" name="nInterioru"
                                                placeholder="Número interior">
                                        </div>
                                    </div>

                                    <div class="row" style="padding-bottom: 5px;">
                                        <div class="col-sm-4">
                                            <label for="coloniau" class="form-label">Colonia</label>
                                            <input type="text" class="form-control" id="coloniau" name="coloniau"
                                                placeholder="Colonia" required>
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="municipiou" class="form-label">Municipio</label>
                                            <input type="text" class="form-control" id="municipiou" name="municipiou"
                                                placeholder="Municipio" required>
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="estadou" class="form-label">Estado</label>
                                            <input type="text" class="form-control" id="estadou" name="estadou"
                                                placeholder="Estado" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Datos de usuario -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                                    aria-controls="panelsStayOpen-collapseThree">
                                    <b>Datos de usuario</b>
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse"
                                aria-labelledby="panelsStayOpen-headingThree">
                                <div class="accordion-body">
                                    <div class="row" style="padding-bottom: 5px;">
                                        <div class="col-sm-4">
                                            <label for="usuariou" class="form-label">Usuario</label>
                                            <input type="text" class="form-control" id="usuariou" name="usuariou"
                                                placeholder="Usuario">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Datos de alumno -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="panelsStayOpen-headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false"
                                    aria-controls="panelsStayOpen-collapseFour">
                                    <b>Datos de alumno</b>
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse"
                                aria-labelledby="panelsStayOpen-headingFour">
                                <div class="accordion-body">
                                    <div class="row" style="padding-bottom: 5px;">
                                        <div class="col-sm-4">
                                            <label for="idAlumnou" class="form-label">Alumno</label>
                                            <select class="form-control" id="idAlumnou" name="idAlumnou" required>
                                                <option value="1">Default</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-warning">Actualizar</button>
                </div>
            </div>
        </div>
    </div>
</form>