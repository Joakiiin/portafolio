<?php
    include "header.php";
    if (isset($_SESSION['alumno']) && $rol == 4) {
      $NoControl= $_SESSION['alumno']['nocontrol'];
?>
<form class="form-horizontal" id="frmSubirEvF" method="POST" enctype="multipart/form-data" onsubmit="return subirDocumentoEvF()">
<!-- Contenido de la página -->
<div class="container">
    
    <div class="card border-0 shadow my-5">
        <div class="card-body p-5">
            <h1 class="fw-light">Subir archivos para evaluacion final</h1>
            <br>
            <div class="container">
  <div class="row d-flex align-items-stretch">
  <div class="col-md-4">
                                    <label for="nocontrol">No. de Control:</label>
                                    <input type="text" hidden name="nocontrol" class="form-control" id="nocontrol"  value= "<?php echo $NoControl ?>">
                                </div>
  <div class="col-sm-9">
					<label for="file1">Autoevaluacion</label>
					<div class="col-sm-9 mb-3">
						<input type="file" class="form-control" id="file1" name="file1">
					</div>
				</div>
                <div class="col-sm-9">
					<label for="file2">Evaluacion</label>
					<div class="col-sm-9 mb-3">
						<input type="file" class="form-control" id="file2" name="file2">
					</div>
				</div>
                <div class="col-sm-9">
					<label for="file3">Actividades</label>
					<div class="col-sm-9 mb-3">
						<input type="file" class="form-control" id="file3" name="file3">
					</div>
				</div>
                <div class="col-sm-9">
					<label for="file4">Dependencia</label>
					<div class="col-sm-9 mb-3">
						<input type="file" class="form-control" id="file4" name="file4">
					</div>
				</div>
                <div class="row">
        <div class="col-sm-12">
            <div id="file-status" class="alert alert-info" role="alert">
                Aún no se han cargado archivos.
            </div>
        </div>
    </div>
    <center>
                        <button class="btn btn-primary" name="registrar" type="submit" id="registrar" style="background-color: #1b396a;">Subir</button>
                    </center>
 </div>
</div>
        </div>
    </div>
</div>
    </form>

<script>
    // Obtener los inputs de archivo
    const fileInputs = document.querySelectorAll('input[type="file"]');

    // Agregar un listener de cambio para cada input de archivo
    fileInputs.forEach(input => {
        input.addEventListener('change', () => {
            // Verificar si todos los inputs tienen un archivo seleccionado
            const allFilesSelected = Array.from(fileInputs).every(input => input.files.length > 0);

            // Obtener el elemento que muestra el estado de los archivos
            const fileStatus = document.getElementById('file-status');

            // Cambiar el mensaje según el estado de los archivos
            if (allFilesSelected) {
                fileStatus.innerHTML = 'Archivos listos para subirse.';
                fileStatus.classList.remove('alert-info');
                fileStatus.classList.add('alert-success');
            } else {
                fileStatus.innerHTML = 'Aún no se han cargado archivos.';
                fileStatus.classList.remove('alert-success');
                fileStatus.classList.add('alert-info');
            }
        });
    });
</script>
    <?php 
    include "includes/footerSesion.php";
    
    ?>
<script src= "sass/public/js/usuarios/alumno.js"></script>

    <?php
        } else {
            header("location:index.php");
        }
    ?>