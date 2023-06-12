<!-- Modal -->
<form id="frmAgregarUsuario" method="POST" onsubmit="return agregarNuevoUsuario()">
    <div class="modal fade" id="modalAgregarUsuarios" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"><span class="fas fa-user-plus"></span> Agregar
                        un nuevo usuario</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
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
                                            <label for="paterno" class="form-label">Apellido paterno</label>
                                            <input type="text" class="form-control" id="paterno" name="paterno"
                                                placeholder="Paterno" required>
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="materno" class="form-label">Apellido materno</label>
                                            <input type="text" class="form-control" id="materno" name="materno"
                                                placeholder="Materno" required>
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="nombre" class="form-label">Nombres</label>
                                            <input type="text" class="form-control" id="nombre" name="nombre"
                                                placeholder="Nombre" required>
                                        </div>
                                    </div>

                                    <div class="row" style="padding-bottom: 5px;">
                                        <div class="col-sm-4">
                                            <label for="edad" class="form-label">Edad</label>
                                            <input type="text" class="form-control" id="edad" name="edad"
                                                placeholder="Edad" required>
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="sexo" class="form-label">Sexo</label>
                                            <select class="form-control" id="sexo" name="sexo">
                                                <option value=""></option>
                                                <option value="Femenino">Femenino</option>
                                                <option value="Masculino">Masculino</option>
                                            </select>
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="telefono" class="form-label">Teléfono</label>
                                            <input type="text" class="form-control" id="telefono" name="telefono"
                                                placeholder="Teléfono" required>
                                        </div>
                                    </div>

                                    <div class="row" style="padding-bottom: 5px;">
                                        <div class="col-sm-12">
                                            <label for="correo" class="form-label">Correo</label>
                                            <input type="text" class="form-control" id="correo" name="correo"
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
                                            <label for="calle" class="form-label">Calle</label>
                                            <input type="text" class="form-control" id="calle" name="calle"
                                                placeholder="Calle" required>
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="nExterior" class="form-label">Número exterior</label>
                                            <input type="text" class="form-control" id="nExterior" name="nExterior"
                                                placeholder="Número exterior" required>
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="nInterior" class="form-label">Número interior</label>
                                            <input type="text" class="form-control" id="nInterior" name="nInterior"
                                                placeholder="Número interior">
                                        </div>
                                    </div>

                                    <div class="row" style="padding-bottom: 5px;">
                                        <div class="col-sm-4">
                                            <label for="colonia" class="form-label">Colonia</label>
                                            <input type="text" class="form-control" id="colonia" name="colonia"
                                                placeholder="Colonia" required>
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="municipio" class="form-label">Municipio</label>
                                            <input type="text" class="form-control" id="municipio" name="municipio"
                                                placeholder="Municipio" required>
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="estado" class="form-label">Estado</label>
                                            <input type="text" class="form-control" id="estado" name="estado"
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
                                            <label for="usuario" class="form-label">Usuario</label>
                                            <input type="text" class="form-control" id="usuario" name="usuario"
                                                placeholder="Usuario">
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="password" class="form-label">Contraseña</label>
                                            <input type="text" class="form-control" id="password" name="password"
                                                placeholder="Contraseña">
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="idRol" class="form-label">Rol de usuario</label>
                                            <select class="form-control" id="idRol" name="idRol" required>
                                                <option value="1">Administrador</option>
                                                <option value="2">Cliente</option>
                                            </select>
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
                                            <label for="idAlumno" class="form-label">Alumno</label>
                                            <select class="form-control" id="idAlumno" name="idAlumno" required>
                                                <option value="1">Default</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <span class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</span>
                            <button class="btn btn-primary">Agregar</button>
                        </div>

                    </div>
                </div>
</form>