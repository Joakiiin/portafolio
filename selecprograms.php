<?php 
include("header.php");
if (isset($_SESSION['alumno']) && $rol == 2 ) 
    {
 ?>
        <div class="container-fluid" id="midiv">
    <div class="card border-0 shadow my-5">
        <div class="card-body p-5">
            <h1 class="fw-light">Programas</h1>
            <div class="card">
  <div class="card-body">
    <h1 class="card-title">¡Importante! Elige con cuidado tu programa</h1>
    <p class="card-text">Queremos recordarte que la elección de tu programa es crucial. Una vez seleccionado, no podrás cambiarlo. Por favor, tómate el tiempo necesario para investigar y elegir sabiamente. Tu programa determinará tu experiencia de servicio social. ¡Elige con cuidado y haz una diferencia!
    Departamento de Gestión Tecnologica y Vinculación
    </p>
  </div>
</div>
            <p class="lead">
                <hr>
                <div id="tablaProgramasALoad"></div>
            </p>
        </div>
    </div>
</div>
<?php
 include("includes/footerSesion.php");
 include("vistas/modalElegirPrograma.php");
?>
<script src="public/js/programas.js"></script>
        <br>
        
        <?php  
} else {
    header("location:index.php");
}
?>
