 <form id="frmAgregarDep" method="POST" enctype="multipart/form-data" onsubmit="return agregarNuevoDep()">  
   <div class="modal fade" id="modalAgregarDep" tabindex="-1" aria-labelledby="exampleModalLabel"
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
                  <div class="col-md-4">
                                    <label for="cp">C.P:</label>
                                    <input type="text" name="cp" class="form-control" id="cp" placeholder="Ej.: 07209">
                                </div>
                                <div class="col-md-4">
                                    <label for="estado">Estado:</label>
                                    <input type="text" name="estado" class="form-control" id="estado" placeholder="Ej.: Ciudad de Mèxico">
                                </div>
                                <div class="col-md-4">
                                    <label for="ciudad">Ciudad:</label>
                                    <input type="text" name="ciudad" class="form-control" id="ciudad" placeholder="Ej.: Ciudad de Mèxico">
                                </div>
                                <div class="col-md-4">
                                    <label for="municipio">Municipio/Alcaldia:</label>
                                    <input type="text" name="municipio" class="form-control" id="municipio" required placeholder="Ej.: Gustavo A. Madero"></select>
                                    <br>
                                </div>
                                <div class="col-md-8">
                                    <label for="colonia">Colonia:</label>
                                    <input type="text" name="colonia" class="form-control" id="colonia" placeholder="Ej.: Colonia Tlatelolco">
                                </div>
                                <div class="col-md-4">
                                    <label for="calle">Calle y Numero:</label>
                                    <input type="text" name="calle" class="form-control" id="calle" required placeholder="Ej.: Palmira #13">
                                    <br>
                                </div>
                  <div class="col-sm-4">
                      <label for="idDep">NoControl</label>
                      <input type="text" class="form-control" id="idDep" name="idDep" required>
                    </div>
                    <div class="col-sm-4">
                      <label for="passw">Password</label>
                      <input type="text" class="form-control" id="passw" name="passw" required>
                    </div>
                    <div class="col-sm-4">
                      <label for="nombreD">Nombre Dependencia</label>
                      <input type="text" class="form-control" id="nombreD" name="nombreD" required>
                    </div>
                    <div class="col-sm-4">
                      <label for="titularD">Titular Dependencia</label>
                      <input type="text" class="form-control" id="titularD" name="titularD" required>
                    </div>
                    <div class="col-sm-4">
                      <label for="puesto">Puesto</label>
                      <input type="text" class="form-control" id="puesto" name="puesto" required>
                    </div>
                    <div class="col-sm-4">
                      <label for="correodep">Correo</label>
                      <input type="text" class="form-control" id="correodep" name="correodep" required>
                    </div>
                    <div class="col-sm-4">
                      <label for="contactodep">Contacto</label>
                      <input type="text" class="form-control" id="contactodep" name="contactodep" required>
                    </div>
                    <div class="col-sm-8">
                    <label for="file" class="col-sm-2 control-label">Archivo</label>
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
function obtenerDatos(event) {
  event.preventDefault(); // Evita que el formulario se envíe de forma tradicional
  const d_codigo = document.getElementById("d_codigo").value;
  fetch(`procesos/alumno/crud/datos_estado.php?d_codigo=${d_codigo}`)
    .then(response => response.json())
    .then(data => {
      if (data.error) {
        alert(data.error); // Muestra un mensaje de error si no se encontraron datos para el paciente
      } else {
        console.log(data);
        document.getElementById("estado").value = data[0].d_estado; // Actualiza el campo de estado con los datos del estado
        document.getElementById("cp").value = data[0].d_codigo; // Actualiza el campo de cp con los datos del estado
        document.getElementById("municipio").value = data[0].D_mnpio;
        //Ciudades
        const ciudadSelect = document.getElementById("ciudad");
        ciudadSelect.innerHTML = ""; // Borra todas las opciones previas del menú desplegable
        for (let i = 0; i < data.length; i++) {
          const ciudad = data[i].d_ciudad;
          const option = document.createElement("option");
          option.text = ciudad;
          ciudadSelect.add(option); // Agrega la opción al menú desplegable
        }
        //Colonias
        const coloniaSelect = document.getElementById("colonia");
        coloniaSelect.innerHTML = ""; // Borra todas las opciones previas del menú desplegable
        for (let i = 0; i < data.length; i++) {
          const colonia = data[i].d_asenta;
          const option = document.createElement("option");
          option.text = colonia;
          coloniaSelect.add(option); // Agrega la opción al menú desplegable
        }
      }
    })
    .catch(error => console.error(error));
}
</script>