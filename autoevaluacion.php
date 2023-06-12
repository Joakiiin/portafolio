<?php
    include "header.php";
    if (isset($_SESSION['alumno']) && $rol == 4) {
        $NoControl= $_SESSION['alumno']['nocontrol'];
?>
<form id="frmAutoEv" action="formatos/tecnm09.php" method="post" target="_blank" method ="post" onsubmit="return registrasFechasITB()">
<div class="container">
    
    <div class="card border-0 shadow my-5">
        <div class="card-body p-5">
            <h1 class="fw-light">FORMATO DE AUTOEVALUACION CUALITATIVA DEL PRESTADOR DE SERVICIO SOCIAL</h1>
            <br>
            <div class="container">
            <div class="row">
            <center>
                        <h4>
                            <b>Datos del prestante</b>
                        </h4>
                    </center>
                    <br>
            <div class="col-md-4">
                <label for="apellidoPA">Apellido Paterno:</label>
                <input type="text" name="apellidoPA" class="form-control" id="apellidoPA">
            </div>
            <div class="col-md-4">
                <label for="apellidoMA">Apellido Materno:</label>
                <input type="text" name="apellidoMA" class="form-control" id="apellidoMA">
            </div>
            <div class="col-md-4">
                <label for="NombreA">Nombre(s):</label>
                <input type="text" name="NombreA" class="form-control" id="NombreA">
                <br>
            </div>
            <div class="col-md-4">
                <label for="nocontrolA">No. de Control:</label>
                <input type="text" name="nocontrolA" class="form-control" id="nocontrolA"  value= "<?php echo $NoControl ?>">
            </div>
            <div class="col-md-4">
                <label for="PeriodoA">Periodo:</label>
                <input type="text" name="PeriodoA" class="form-control" id="PeriodoA">
                <br>
            </div>
            <div class="col-md-10">
                <label for="ProgramaA">Programa:</label>
                <input type="text" name="ProgramaA" class="form-control" id="ProgramaA">
                <br>
            </div>
            <center>
                <h4>
                    <b>Fechas de evaluacion</b>
                </h4>
            </center>
            <center>
                <h5>
                    <b>Para poder llenar estos campos su fecha de inicio del bimestre haz
                        de sumarle dos meses como se muestra en el ejemplo de abajo,
                        si es la primera vez que realizas este proceso en la fecha de inicio
                        deberias escribir la fecha de inicio que registraste en tu solicitud
                        y en la fecha de termino sumarle dos meses a la fecha de inicio.
                    </b>
                </h5>
            </center>
            <br>
            <div class="col-md-6">
                <label for="fechaIA">Fecha de inicio de bimestre:</label>
                <input type="text" class="form-control datepicker" name="fechaIA" id="fechaIA" placeholder="Ej: 08-03-2023" required>                               
            </div>
            <div class="col-md-6">
                <label for="fechaTA">Fecha de terminacion de bimestre:</label>
                <input type="text" class="form-control datepicker" name="fechaTA" id="fechaTA" placeholder="Ej: 08-05-2023" required>
                <br>
            </div>
            <center>
                <h5>
                    <b>Para poder llenar estos campos dependera de la evaluacion que este realizando
                    En caso de estar evaluando Primer, Segundo o Tercer Bimestre seleccione la opcion
                    requerida en el campo bimestre e ignore totalmente el campo final, encaso de ser
                    su evaluacion final deje el campo bimestre en blanco y seleccione el campo final.
                    </b>
                </h5>
            </center>
            <div class="col-md-4"> 
            <label for="bimestre" class="control-label">Bimestre: </label>
            <select class="form-control" id="bimestre" name="bimestre" >
                <option value="1">Primero</option>
                <option value="2">Segundo</option>
                <option value="3">Tercero</option>
            </select>
            </div>
            <div class="col-md-4">
                <label for="final">Final:</label>
                <input type="checkbox" class="form-check-input" name="final" id="final" value="X">
                <br>
            </div>
            <center>
                <h4>
                    <b>Criterios a Evaluar</b>
                </h4>
            </center>
            <br>
            <table class="table">
  <thead>
    <tr>
      <th>Criterios a evaluar</th>
      <th>Insuficiente</th>
      <th>Suficiente</th>
      <th>Bueno</th>
      <th>Notable</th>
      <th>Excelente</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Cumplí en tiempo y forma con las
          actividades encomendadas alcanzando
          los objetivos.</td>
      <td><input id= "pregunta1" type="radio" name="pregunta1" value="1" required></td>
      <td><input id= "pregunta1" type="radio" name="pregunta1" value="2" required></td>
      <td><input id= "pregunta1" type="radio" name="pregunta1" value="3" required></td>
      <td><input id= "pregunta1" type="radio" name="pregunta1" value="4" required></td>
      <td><input id= "pregunta1" type="radio" name="pregunta1" value="5" required></td>
    </tr>
    <tr>
      <td>Trabajé en equipo y me adapté a
          nuevas situaciones.</td>
      <td><input id="pregunta2" type="radio" name="pregunta2" value="1" required></td>
      <td><input id="pregunta2" type="radio" name="pregunta2" value="2" required></td>
      <td><input id="pregunta2" type="radio" name="pregunta2" value="3" required></td>
      <td><input id="pregunta2" type="radio" name="pregunta2" value="4" required></td>
      <td><input id="pregunta2" type="radio" name="pregunta2" value="5" required></td>
    </tr>
    <tr>
      <td>Mostré liderazgo en las actividades
          encomendadas.</td>
      <td><input type="radio" name="pregunta3" value="1" required></td>
      <td><input type="radio" name="pregunta3" value="2" required></td>
      <td><input type="radio" name="pregunta3" value="3" required></td>
      <td><input type="radio" name="pregunta3" value="4" required></td>
      <td><input type="radio" name="pregunta3" value="5" required></td>
    </tr>
    <tr>
      <td>Organicé mi tiempo y trabajé de
          manera proactiva.</td>
      <td><input type="radio" name="pregunta4" value="1" required></td>
      <td><input type="radio" name="pregunta4" value="2" required></td>
      <td><input type="radio" name="pregunta4" value="3" required></td>
      <td><input type="radio" name="pregunta4" value="4" required></td>
      <td><input type="radio" name="pregunta4" value="5" required></td>
    </tr>
    <tr>
      <td>Interpreté la realidad y me sensibilicé
          aportando soluciones a la problemática
          con la actividad complementaria.</td>
      <td><input type="radio" name="pregunta5" value="1" required></td>
      <td><input type="radio" name="pregunta5" value="2" required></td>
      <td><input type="radio" name="pregunta5" value="3" required></td>
      <td><input type="radio" name="pregunta5" value="4" required></td>
      <td><input type="radio" name="pregunta5" value="5" required></td>
    </tr>
    <tr>
      <td>Realicé sugerencias innovadoras para 
          beneficio o mejora en el programa en 
          el que participa.</td>
      <td><input type="radio" name="pregunta6" value="1" required></td>
      <td><input type="radio" name="pregunta6" value="2" required></td>
      <td><input type="radio" name="pregunta6" value="3" required></td>
      <td><input type="radio" name="pregunta6" value="4" required></td>
      <td><input type="radio" name="pregunta6" value="5" required></td>
    </tr>
    <tr>
      <td>Tuve iniciativa para ayudar en las 
          actividades y muestré espíritu de 
          servicio.</td>
      <td><input type="radio" name="pregunta7" value="1" required></td>
      <td><input type="radio" name="pregunta7" value="2" required></td>
      <td><input type="radio" name="pregunta7" value="3" required></td>
      <td><input type="radio" name="pregunta7" value="4" required></td>
      <td><input type="radio" name="pregunta7" value="5" required></td>
    </tr>
    </tbody>
    </table>
    <input type="submit" value="Generar PDF">
            </div>
        </div>
        </div>
    </div>
</div>
    </form>
<?php 
    include "includes/footerSesion.php";
    
    ?>
        <script src= "public/js/inicio/datosAutoEv.js"></script>
        <script>
            let NoControl = '<?php echo $NoControl; ?>'
            datosAutoEvaluacion(NoControl);
        </script> 
                <script>
$(document).ready(function() {
    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true,
        todayHighlight: true
    });
});
</script>
<script src= "sass/public/js/usuarios/alumno.js"></script>
    <?php
        } else {
            header("location:index.php");
        }
    ?>