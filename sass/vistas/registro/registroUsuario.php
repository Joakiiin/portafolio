<?php include("headerSesion.php") ?>

<br>
        <br>

        <!--Contenido principal-->
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <form action="" method="post">
                    <center>
                        <h2>
                            <b>Crear Usuario</b>
                        </h2>
                    </center>

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
                            <input type="text" name="" class="form-control" id="" placeholder="Ej.: 16500000">
                        </div>

                        <div class="form-group">
                            <label for="">Contraseña:</label>
                            <input type="password" name="" class="form-control" id="" placeholder="********">
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
                                    <input type="text" name="app" class="form-control" id="app" required placeholder="Ej.: Hernández" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="apm">Apellido Materno:</label>
                                    <input type="text" name="apm" class="form-control" id="apm" required placeholder="Ej.: Oregón" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="nombres">Nombre(s):</label>
                                    <input type="text" name="nombres" class="form-control" id="nombres" required placeholder="Ej.: Joaquín" required>
                                    <br>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="edad">Edad:</label>
                            <input type="number" name="edad" class="form-control" id="edad" placeholder="23" required>
                        </div>

                        <div class="form-group">
                            <label for="dom1">Domicilio (Calle, número, colonia):</label>
                            <input type="text" name="dom1" class="form-control" id="dom1" required placeholder="Ej.: Avenida del centro poniente No. 64, Colonia Ampliación la Quebrada" required>
                        </div>

                        <div class="form-group">
                            <label for="dom2">Municipio/Alcaldía (Municipio, estado, C.P.):</label>
                            <input type="text" name="dom2" class="form-control" id="dom2" required placeholder="Ej.: Cuautitlán Izcalli, Estado de México, C. P. 54769" required>
                        </div>

                        <div class="form-group">
                            <label for="tel">Teléfono Móvil:</label>
                            <input type="text" name="tel" class="form-control" id="tel" required placeholder="Ej.: 55-55-55-55-55" required>
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
                            <select class="form-control" id="" name="" >
                                <option value="IGE">Ing. en Gestión Empresarial</option>
                                <option value="II">Ing. Industrial</option>
                                <option value="AR">Arquitectura</option>
                                <option value="ITIC">Ing. En Tecnol. de la Info. y Comunic</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="semestre">Semestre (<u><font color = "red">con letra</font></u>):</label>
                            <input type="text" name="semestre" class="form-control" id="semestre" required placeholder="Ej.: Noveno" required>
                        </div>

                        <div class="form-group">
                            <label for="creditos">Créditos Aprobados (<u><font color = "red">solo colocar el número</font></u>):</label>
                            <input type="text" name="creditos" class="form-control" id="creditos" required placeholder="Ej.: 246" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Correo Electrónico Institucional:</label>
                            <input type="text" name="email" class="form-control" id="email" required placeholder="Ej.: daniel.bg@tecnm.mx" required>
                        </div>
                    </fieldset>

                    <center>
                        <button class="btn btn-primary" type="submit" id="" style="background-color: #1b396a;">Registrar</button>
                    </center>
                </form>
            </div>
            <div class="col-md-2"></div>
        </div>

        <br>

<?php include("footerSession.php") ?>