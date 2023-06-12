<?php 
include("header.php");
if (isset($_SESSION['alumno']) && 
 $rol == 4) 
    {
 ?>
<!-- Contenido de la página -->
<div class="container">
    
    <div class="card border-0 shadow my-5">
        <div class="card-body p-5">
            <h1 class="fw-light">Subir Evaluación/Reporte Bimestrales</h1>
            <br>
            <div class="card">
  <div class="card-body">
    <h1 class="card-title">¡Importante! Subir Archivos de Evaluaciones Bimestrales</h1>
    <p class="card-text">Estimados alumnos,</p>
    <p class="card-text">Les informamos sobre el proceso de subir archivos de evaluaciones bimestrales. Les pedimos que sigan las siguientes instrucciones cuidadosamente:</p>
    <ol>
      <li>Pulsen el botón correspondiente al bimestre que corresponda según la evaluación que deseen subir. Asegúrense de seleccionar el bimestre correcto antes de continuar.</li>
      <li>Suban los archivos solicitados para esa evaluación en particular. Los archivos deben estar firmados y sellados por las personas indicadas según lo requiera cada formato.</li>
      <li>Una vez que hayan subido los archivos requeridos, esperen a recibir una confirmación de recepción o cualquier instrucción adicional por correo electrónico.</li>
      <li>Recuerden que la presentación de las evaluaciones bimestrales es fundamental para evaluar su progreso en el servicio social. Asegúrense de cumplir con los plazos establecidos para cada evaluación.</li>
    </ol>
    <p class="card-text">Si tienen alguna pregunta o necesitan más orientación sobre el proceso de subir archivos de evaluaciones bimestrales, no duden en contactarnos. Estaremos encantados de ayudarles.</p>
    <p class="card-text">Atentamente,</p>
    <p class="card-text">Departamento de Gestión Tecnológica y Vinculación</p>
  </div>
</div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="card" style="width: 14rem;">
                        <center>
                        <img src="sass/public/img/carpetaArchivos.png" class="card-img-top cardFile" style="width: 120px">
                        <div class="card-body">
                            <h5 class="card-title">Primera evaluación</h5>
                            <a href="subirDocumentosEv1.php" class="btn btn-primary">Subir</a>
                        </div>
                        </center>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="card" style="width: 14rem;">
                        <center>
                            <img src="sass/public/img/carpetaArchivos.png" class="card-img-top cardFile" style="width: 120px">
                            <div class="card-body">
                                <h5 class="card-title">Segunda evaluación</h5>
                                <a href="subirDocumentosEv2.php" class="btn btn-primary">Subir</a>
                            </div>
                        </center>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="card" style="width: 14rem;">
                        <center>
                            <img src="sass/public/img/carpetaArchivos.png" class="card-img-top cardFile" style="width: 120px">
                            <div class="card-body">
                                <h5 class="card-title">Tercera evaluación</h5>
                                <a href="subirDocumentosEv3.php" class="btn btn-primary">Subir</a>
                            </div>
                        </center>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="card" style="width: 14rem;">
                        <center>
                            <img src="sass/public/img/carpetaArchivos.png" class="card-img-top cardFile" style="width: 120px">
                            <div class="card-body">
                                <h5 class="card-title">Evaluación final</h5>
                                <a href="subirDocumentosEvF.php" class="btn btn-primary">Subir</a>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php include("includes/footerSesion.php"); 
} else {
    header("location:index.php");
}
?>