<?php
    include "header.php";
    if (isset($_SESSION['alumno']) && $rol == 3) {
      $NoControl= $_SESSION['alumno']['nocontrol'];
?>

<!-- Contenido de la página -->
<div class="container">
    
    <div class="card border-0 shadow my-5">
        <div class="card-body p-5">
            <h1 class="fw-light">Generacion de documentos iniciales</h1>
            <br>
            <div class="card">
  <div class="card-body">
    <h1 class="card-title">¡Importante! Generación de Documentos Iniciales</h1>
    <p class="card-text">Queridos alumnos,</p>
    <p class="card-text">Les informamos sobre el proceso de generación de documentos iniciales para su participación en el servicio social. Les pedimos que sigan las siguientes instrucciones cuidadosamente:</p>
    <ol>
      <li>Llenen los tres formularios en orden, de izquierda a derecha. Asegúrense de completar todos los campos requeridos con información precisa y correcta.</li>
      <li>Una vez que hayan llenado un formulario y le den la instrucción de "generado con éxito", regresen a la sección de servicio social antes de pasar al siguiente formulario. No intenten generar nuevamente el documento, ya que esto podría causar problemas con su registro.</li>
      <li>Una vez que hayan generado exitosamente los tres documentos, imprímanlos en papel.</li>
      <li>Luego, presenten los documentos impresos al Departamento de Gestión Tecnológica y Vinculación para que sean sellados y firmados por las personas indicadas en cada formato.</li>
      <li>Finalmente, suban los documentos sellados y firmados a nuestra plataforma.</li>
    </ol>
    <p class="card-text">Recuerden que estos documentos son fundamentales para formalizar su participación en el servicio social. Si tienen alguna pregunta o necesitan más orientación sobre el proceso, no duden en contactarnos. Estaremos encantados de ayudarles.</p>
    <p class="card-text">Atentamente,</p>
    <p class="card-text">Departamento de Gestión Tecnológica y Vinculación</p>
  </div>
</div>
            <div class="container">
  <div class="row d-flex align-items-stretch">
    <?php
    $conexion = mysqli_connect("localhost", "root", "TU_CONTRASEÑA", "TU_BASE_DE_dATOS");
    $resultado = mysqli_query($conexion, "SELECT * FROM fechainiciotermino WHERE NoControlIT = $NoControl");
if (mysqli_num_rows($resultado) > 0) {
  echo "Ya has llenado el formulario.";
} else {
    ?>
    <div class="col-sm-4 mb-4">
      <div class="card h-100">
        <a href="solicitud.php"><img class="card-img-top" src="form.png"></a>
        <div class="card-body">
            <center>
          <h5 class="card-title">Solicitud de servicio social</h5>
    </center>
        </div>
      </div>
    </div>
    <?php
    }
    $resultado2 = mysqli_query($conexion, "SELECT * FROM cartacompromiso WHERE NoControlCartaC = $NoControl");
if (mysqli_num_rows($resultado2) > 0) {
  echo "Ya has llenado el formulario.";
} else {
    ?>
    <div class="col-sm-4 mb-4">
      <div class="card h-100">
        <a href="cartacompromiso.php"><img class="card-img-top" src="form.png"></a>
        <div class="card-body">
            <center>
          <h5 class="card-title">Carta compromiso</h5>
    </center>
        </div>
      </div>
    </div>
    <?php
    }
    $resultado3 = mysqli_query($conexion, "SELECT * FROM plandetrabajo WHERE NoControlPlan = $NoControl");
    if (mysqli_num_rows($resultado3) > 0) {
      echo "Ya has llenado el formulario.";
    } else {
    ?>
    <div class="col-sm-4 mb-4">
      <div class="card h-100">
        <a href="plandetrabajo.php"><img class="card-img-top" src="form.png"></a>
        <div class="card-body">
            <center>
          <h5 class="card-title">Plan de trabajo</h5>
    </center>
        </div>
      </div>
    </div>
    <?php
    }
    mysqli_close($conexion);
    ?>
  </div>
</div>

        </div>
    </div>
</div>
    <?php 
    include "includes/footerSesion.php";
    
    ?>

    <?php
        } else {
            header("location:index.php");
        }
    ?>
