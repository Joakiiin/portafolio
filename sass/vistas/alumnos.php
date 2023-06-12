<?php
    include "header.php";
    if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 1) {
?>
<?php
include_once '../../conexion/con_db.php';
?>
<!-- Contenido de la página -->
<div class="container-fluid">
    <div class="card border-0 shadow my-5">
        <div class="card-body p-5">
            <h1 class="fw-light">Administrar Alumnos</h1>
            <p class="lead">
                <button class="btn btn-primary btn-l" data-bs-toggle="modal" data-bs-target="#modalAgregarAlumno">
                    Agregar nuevo usuario
                </button>
                <button class="btn btn-primary" onclick="downloadCSV()">Descargar CSV</button>
                <hr>
                <div id="tablaAlumnosLoad"></div>

            </p>
            <div class="row">
            <div class="col-md-2">
            <button class="btn btn-primary btn-l" id="btnDescargarKardex"  onclick="window.open('../procesos/usuarios/crud/descargarTodosKardex.php', '_blank')">
    Todos los Kardex
</button>
    </div>
            <div class="col-md-2">
            <button class="btn btn-primary btn-l" id="btnDescargarExpediente"  onclick="window.open('../procesos/usuarios/crud/descargar2.php', '_blank')">
    Todos los Expedientes
</button>
    </div>
    <div class="col-md-2">
    <form action="../procesos/usuarios/crud/descargar3.php" method="post" target="_blank">
  <button class="btn btn-primary btn-l" type="submit">
      Expedientes por fecha
    </button>
    <hr>
    <label for="periodo1">Periodo:</label>
    <select name="periodo1" id="periodo1">
    <?php
        $con=conexion();
        $sql= "SELECT * FROM periodo";
           $query= mysqli_query($con,$sql);
        $mes_actual = date('n'); // Obtiene el mes actual (1 al 12)
        $periodo_actual = ($mes_actual >= 1 && $mes_actual <= 6) ? "Enero/Junio" : "Agosto/Diciembre";
        // Verifica si el mes actual está en el rango de Enero a Junio, de lo contrario, se asume que está en el rango de Agosto a Diciembre
        
        while ($row=mysqli_fetch_array($query)) {
            $Clave=$row['Clave'];
            $Periodo=$row['Periodo'];
            $selected = ($Periodo == $periodo_actual) ? "selected" : ""; // Establece la opción como seleccionada si es el periodo actual
            ?>
            <option value="<?php echo $Clave ?>" <?php echo $selected ?>><?php echo $Periodo ?></option>
            <?php
        }
        ?>
    </select>
    <hr>
    <label for="year">Año:</label>
    <select name="year" id="year">
    <?php
    // Definir rango de años
    $start_year = 2023;
    $end_year = date("Y");
    
    // Generar opciones de años
    for ($i = $end_year; $i >= $start_year; $i--) {
      echo "<option value='$i'>$i</option>";
    }
  ?>
    </select>
  </form>
</div>
<div class ="col-md-2 mx-3">
    <form action="../procesos/usuarios/crud/descargarBim.php" method="post" target="_blank">
<button class="btn btn-primary btn-l" id="btnDescargarExpediente" type="submit">
    Evaluaciones por Bimestre
</button>
<hr>
<label for="bimestre" class="control-label">Bimestre: </label>
                            <select id="bimestre" name="bimestre" >
                                <option value="1">Primero</option>
                                <option value="2">Segundo</option>
                                <option value="3">Tercero</option>
                                <option value="Final">Final</option>
                            </select>
                            <label for="periodo2">Periodo:</label>
    <select name="periodo2" id="periodo2">
    <?php
        $query1= mysqli_query($con,$sql);
        $mes_actual1 = date('n'); // Obtiene el mes actual (1 al 12)
        $periodo_actual1 = ($mes_actual1 >= 1 && $mes_actual1 <= 6) ? "Enero/Junio" : "Agosto/Diciembre";
        // Verifica si el mes actual está en el rango de Enero a Junio, de lo contrario, se asume que está en el rango de Agosto a Diciembre
        
        while ($row1=mysqli_fetch_array($query1)) {
            $Clave1=$row1['Clave'];
            $Periodo1=$row1['Periodo'];
            $selected1 = ($Periodo1 == $periodo_actual1) ? "selected" : ""; // Establece la opción como seleccionada si es el periodo actual
            ?>
            <option value="<?php echo $Clave1 ?>" <?php echo $selected1 ?>><?php echo $Periodo1 ?></option>
            <?php
        }
        ?>
    </select>
    <label for="year">Año:</label>
    <select name="year" id="year">
    <?php
    // Definir rango de años
    $start_year = 2023;
    $end_year = date("Y");
    
    // Generar opciones de años
    for ($i = $end_year; $i >= $start_year; $i--) {
      echo "<option value='$i'>$i</option>";
    }
  ?>
    </select>
            </form>
</div>
<div class ="col-md-2">
  <form action="../procesos/usuarios/crud/descargarBimestres.php" method="post" target="_blank" id="formulario">
    <button class="btn btn-primary btn-l" id="btnDescargarExpediente" type="submit">
      Todos los bimestres
    </button>
  </form>
</div>
    </div>
        </div>
    </div>
</div>
<?php

        include "usuarios/modalAgregarAlumno.php";
        include "usuarios/modalActualizarAlumno.php";
        include "usuarios/modalResetPassword.php";
        include "footer.php";
    ?>

<script src="../public/js/usuarios/alumno.js"></script>
<script>
  function downloadCSV(periodo, year) {
    var periodo = document.getElementById('periodo2').value;
    var year = document.getElementById('year').value;
    console.log(periodo);
    var url = "../procesos/usuarios/crud/download.php?periodo2=" + periodo + "&year=" + year;
    window.location.href = url;
  }
</script>
<?php
        } else {
            header("location:../index.php");
        }
    ?>