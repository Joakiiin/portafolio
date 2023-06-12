<?php
    include "header.php";
    if (isset($_SESSION['alumno']) && $rol == 3) {
      $NoControl= $_SESSION['alumno']['nocontrol'];
?>
<form class="form-horizontal" id="frmSubirDoc" method="POST" enctype="multipart/form-data" onsubmit="return subirDocumentoExp()">
<!-- Contenido de la página -->
<div class="container">
    
    <div class="card border-0 shadow my-5">
        <div class="card-body p-5">
            <h1 class="fw-light">Subir archivos para expediente</h1>
            <br>
            <div class="card">
  <div class="card-body">
    <h1 class="card-title">¡Importante! Subir Archivos para Expediente</h1>
    <p class="card-text">Estimados alumnos,</p>
    <p class="card-text">Les informamos sobre el proceso de subir archivos para su expediente de servicio social. Les pedimos que sigan las siguientes instrucciones cuidadosamente:</p>
    <ol>
      <li>Suban sus archivos según el documento que les vaya solicitando. Esperen a que aparezca la leyenda "Archivos listos para subirse" antes de presionar el botón de "Subir".</li>
      <li>Una vez que hayan subido los archivos requeridos, deberán esperar a recibir un correo electrónico indicando si su expediente ha sido aprobado o no.</li>
      <li>Recuerden que la aprobación de su expediente está sujeta a la revisión de los documentos y el cumplimiento de los requisitos establecidos.</li>
      <li>Si su expediente es aprobado, podrán avanzar al siguiente paso en el proceso de servicio social. En caso contrario, recibirán instrucciones adicionales sobre cómo resolver cualquier problema o enviar documentos faltantes.</li>
    </ol>
    <p class="card-text">Si tienen alguna pregunta o necesitan más orientación sobre el proceso de subir archivos, no duden en contactarnos. Estaremos encantados de ayudarles.</p>
    <p class="card-text">Atentamente,</p>
    <p class="card-text">Departamento de Gestión Tecnológica y Vinculación</p>
  </div>
</div>
            <div class="container">
  <div class="row d-flex align-items-stretch">
  <div class="col-md-4">
                                    <label for="nocontrol">No. de Control:</label>
                                    <input type="text" hidden name="nocontrol" class="form-control" id="nocontrol"  value= "<?php echo $NoControl ?>">
                                </div>
  <div class="col-sm-9">
					<label for="file1">Solicitud de servicio social</label>
					<div class="col-sm-9 mb-3">
						<input type="file" class="form-control" id="file1" name="file1">
					</div>
				</div>
                <div class="col-sm-9">
					<label for="file2">Carta Presentacion</label>
					<div class="col-sm-9 mb-3">
						<input type="file" class="form-control" id="file2" name="file2">
					</div>
				</div>
                <div class="col-sm-9">
					<label for="file3">Carta Compromiso</label>
					<div class="col-sm-9 mb-3">
						<input type="file" class="form-control" id="file3" name="file3">
					</div>
				</div>
                <div class="col-sm-9">
					<label for="file4">Plan de trabajo</label>
					<div class="col-sm-9 mb-3">
						<input type="file" class="form-control" id="file4" name="file4">
					</div>
				</div>
                <div class="col-sm-9">
					<label for="file5">Carta Aceptacion</label>
					<div class="col-sm-9 mb-3">
						<input type="file" class="form-control" id="file5" name="file5">
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