<?php
include "../../clases/Conexion.php";
$con= new Conexion();
$conexion= $con->conectar();
$sql= "SELECT al.NoControl, al.Nombre, al.ApellidoP, al.ApellidoM, al.Sexo,
  al.Telefono, al.Correo, al.edad, al.estatus, al.idRolFK, ca.clavec, se.Semestre,
  pe.Clave, pa.Year,
  IFNULL(b.estado, 'Evaluaciones en proceso') AS estado
FROM alumno AS al
INNER JOIN carrera AS ca ON al.NoCarrera1 = ca.NoCarrera
INNER JOIN semestre AS se ON al.NoSemestre1 = se.NoSemestre
INNER JOIN periodoasignado AS pa ON al.NoControl = pa.NoControlP
INNER JOIN periodo AS pe ON pe.idPeriodo = pa.idPeriodo1
LEFT JOIN (
  SELECT
    NoControlBim,
    CONCAT('Evaluaciones', GROUP_CONCAT(DISTINCT ' ', idBim ORDER BY idBim SEPARATOR ' y '), ' en linea') AS estado
  FROM reportesbimestrales
  GROUP BY NoControlBim) AS b ON al.NoControl = b.NoControlBim";
$respuesta= mysqli_query($conexion, $sql);
$sql2= "SELECT NoControlFi FROM archivos";
$respuesta2= mysqli_query($conexion, $sql2);
?>
<label for="bimestre">Bimestre:</label>
<select name="bimestre" id="bimestre">
    <option value="1">Primero</option>
    <option value="2">Segundo</option>
    <option value="3">Tercero</option>
    <option value="Final">Final</option>
</select>
<hr>
<table class="table table-striped table-sm dt-responsive nowrap" style="width:100%" id="tablaAlumnosDataTable">
    <thead>
        <th>NoControl</th> 
        <th>Nombre</th>
        <th>Apellido Paterno</th>
        <th>Apellido Materno</th>
        <th>Correo</th>
        <th>Carrera</th>
        <th>Semestre</th>
        <th>Periodo</th>
        <th>Año</th>
        <th>Password</th>
        <th>Activar Alumno</th>
        <th>Rechazar Alumno</th>
        <th>Editar</th>
        <th>Eliminar</th>
        <th>Descargar Kardex</th>
        <th>Descargar Expediente</th>
        <th>Autorizar Expediente</th>
        <th>Rechazar Expediente</th>
        <th>Descargar evaluacion por bimestre</th>
        <th>Descargar todas las evaluciones</th>
        <th>Aprobar evaluacion</th>
        <th>Rechazar evaluacion</th>
        <th>Liberar Servicio</th>
        <th>Estado</th>
    </thead>
    <tbody>
  <?php
  while ($mostrar= mysqli_fetch_array($respuesta)) {
     ?>
        <tr>
        <td <?php if ($mostrar['estatus'] == 0) echo 'style="color: red; font-weight: bold;"'; 
        elseif ($mostrar['idRolFK'] == 3) echo 'style="color: green; font-weight: bold;"'; 
        elseif ($mostrar['idRolFK'] == 4) echo 'style="color: #8E44AD; font-weight: bold;"'; 
        elseif ($mostrar['idRolFK'] == 5) echo 'style="text-decoration: underline; font-weight: bold;"'; ?>>
        <?php echo $mostrar['NoControl']; ?></td>
        <td><?php echo $mostrar['Nombre']; ?></td>
        <td><?php echo $mostrar['ApellidoP']; ?></td>
        <td><?php echo $mostrar['ApellidoM']; ?></td>
        <td><?php echo $mostrar['Correo']; ?></td>
        <td><?php echo $mostrar['clavec']; ?></td>
        <td><?php echo $mostrar['Semestre']; ?></td>
        <td><?php echo $mostrar['Clave']; ?></td>
        <td><?php echo $mostrar['Year']; ?></td>
        <td>
            <button class="btn btn-info btn-sm" 
            data-bs-toggle="modal" 
            data-bs-target="#modalResetPassword"
            onclick="agregarIdAlumnoReset(<?php echo $mostrar['NoControl'] ?>)">
                <span class="fas fa-exchange-alt"></span>
            </button>
        </td>
        <td>
            <?php if($mostrar['estatus'] == 1){ ?>
                <button class="btn btn-success btn-sm" 
                onclick="cambioAlumno(<?php echo $mostrar['NoControl'] ?>, <?php echo $mostrar['estatus'] ?>)">
                <span class= "fas fa-power-off"></span>On
            </button>
                
            
            <?php
            } else if ($mostrar['estatus'] == 0) {
                ?>
                <button class="btn btn-secondar btn-sm" 
                onclick= "cambioAlumno(<?php echo $mostrar['NoControl'] ?>, <?php echo $mostrar['estatus'] ?>); autorizarKardexAlumno('<?php echo $mostrar['NoControl'] ?>', '<?php echo $mostrar['Correo'] ?>')">
                <span class= "fas fa-power-off"></span>Off
            </button>
                <?php
            }
            ?>
        </td>
        <td>
        <button class="btn btn-dark btn-sm" onclick="rechazarKardexAlumno('<?php echo $mostrar['NoControl'] ?>', '<?php echo $mostrar['Correo'] ?>')">
    <span class="fas fa-envelope"></span>
</button>
        </td>
        <td>
            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" 
            data-bs-target="#modalActualizarAlumno"
            onclick="obtenerDatosAlumno(<?php echo $mostrar['NoControl'] ?>)">
                Editar
            </button>
        </td>
        <td>
            <button class="btn btn-danger btn-sm" onclick="eliminarAlumno(<?php echo $mostrar['NoControl'] ?>)">
                Eliminar
            </button>
        </td>
        <td>
        <button class="btn btn-dark btn-sm" onclick="window.open('../procesos/usuarios/crud/descargarKardex.php?NoControl=<?php echo $mostrar['NoControl'] ?>', '_blank')">
    <span class="fas fa-download"></span>
</button>
        </td>
        <td>
        <button class="btn btn-dark btn-sm" onclick="window.open('../procesos/usuarios/crud/descargar.php?NoControl=<?php echo $mostrar['NoControl'] ?>', '_blank')">
    <span class="fas fa-download"></span>
</button>
        </td>
        <td>
            <?php if($mostrar['idRolFK'] == 4){ ?>
                <button class="btn btn-success btn-sm" 
                onclick="autorizarExpediente(<?php echo $mostrar['NoControl'] ?>, <?php echo $mostrar['idRolFK'] ?>)">
                <span class= "fas fa-power-off"></span>On
            </button>
                
            
            <?php
            } else if ($mostrar['idRolFK'] == 3) {
                ?>
                <button class="btn btn-secondar btn-sm" 
                onclick= "autorizarExpediente(<?php echo $mostrar['NoControl'] ?>, <?php echo $mostrar['idRolFK'] ?>); autorizarExpedienteCorreo('<?php echo $mostrar['NoControl'] ?>', '<?php echo $mostrar['Correo'] ?>')">
                <span class= "fas fa-power-off"></span>Off
            </button>
                <?php
            }
            ?>
        </td>
        <td>
        <button class="btn btn-dark btn-sm" onclick="rechazarExpedienteAlumno('<?php echo $mostrar['NoControl'] ?>', '<?php echo $mostrar['Correo'] ?>')">
    <span class="fas fa-envelope"></span>
</button>
        </td>
        <td>
        <button class="btn btn-dark btn-sm" onclick="descargar('<?php echo $mostrar['NoControl']; ?>')">
                        <span class="fas fa-download"></span>
                    </button>
        </td>
        <td>
        <button class="btn btn-dark btn-sm" onclick="window.open('../procesos/usuarios/crud/descargarEvAs.php?NoControl=<?php echo $mostrar['NoControl'] ?>', '_blank')">
    <span class="fas fa-download"></span>
</button>
        </td>
        <td>
        <button class="btn btn-dark btn-sm" onclick="aprobarEvaluacionesBimestrales('<?php echo $mostrar['NoControl'] ?>', '<?php echo $mostrar['Correo'] ?>')">
    <span class="fas fa-envelope"></span>
</button>
        </td>
        <td>
        <button class="btn btn-dark btn-sm" onclick="rechazarEvaluacionesBimestrales('<?php echo $mostrar['NoControl'] ?>', '<?php echo $mostrar['Correo'] ?>')">
    <span class="fas fa-envelope"></span>
</button>
        </td>
        <td>
            <?php if($mostrar['idRolFK'] == 5){ ?>
                <button class="btn btn-success btn-sm" 
                onclick="liberarServicio(<?php echo $mostrar['NoControl'] ?>, <?php echo $mostrar['idRolFK'] ?>)">
                <span class= "fas fa-power-off"></span>On
            </button>
                
            
            <?php
            } else if ($mostrar['idRolFK'] == 4) {
                ?>
                <button class="btn btn-secondar btn-sm" 
                onclick= "liberarServicio(<?php echo $mostrar['NoControl'] ?>, <?php echo $mostrar['idRolFK'] ?>)">
                <span class= "fas fa-power-off"></span>Off
            </button>
                <?php
            }
            ?>
        </td>
        <td><?php echo $mostrar['estado']; ?></label></td>
        </tr>
        <?php 
    } 
    ?>
    </tbody>
</table>
<script>
    $(document).ready(function() {
        $('#tablaAlumnosDataTable').DataTable({
            language: {
                url: "../public/datatable/es-ES.json"
            }
    });
    });
</script>
<script>
    function descargar(noControl) {
        var select = document.getElementById("bimestre");
        var value = select.options[select.selectedIndex].value;
        var url = "../procesos/usuarios/crud/descargarEvA.php?NoControl=" + noControl + "&bimestre=" + value;
        window.open(url, '_blank');
    }
</script>
<script>
    function aprobarEvaluacionesBimestrales(noControl, correo) {
        var select = document.getElementById("bimestre");
        var value = select.options[select.selectedIndex].value;
        var url = "../procesos/usuarios/crud/correos/aprobarEvaluacionesBimestrales.php?NoControl=" + noControl + "&Correo=" + correo + "&bimestre=" + value;
        window.open(url, '_blank');
    }
</script>
<script>
    function rechazarEvaluacionesBimestrales(noControl, correo) {
        var select = document.getElementById("bimestre");
        var value = select.options[select.selectedIndex].value;
        var url = "../procesos/usuarios/crud/correos/rechazarEvaluacionesBimestrales.php?NoControl=" + noControl + "&Correo=" + correo + "&bimestre=" + value;
        window.open(url, '_blank');
    }
</script>
<script>
    function rechazarKardexAlumno(noControl, correo) {
        var url = "../procesos/usuarios/crud/correos/rechazarKardexAlumno.php?NoControl=" + noControl + "&Correo=" + correo;
        window.open(url, '_blank');
    }
</script>
<script>
    function autorizarKardexAlumno(noControl, correo) {
        var url = "../procesos/usuarios/crud/correos/autorizarKardexAlumno.php?NoControl=" + noControl + "&Correo=" + correo;
        window.open(url, '_blank');
    }
</script>
<script>
    function rechazarExpedienteAlumno(noControl, correo) {
        var url = "../procesos/usuarios/crud/correos/rechazarExpedienteAlumno.php?NoControl=" + noControl + "&Correo=" + correo;
        window.open(url, '_blank');
    }
</script>
<script>
    function autorizarExpedienteCorreo(noControl, correo) {
        var url = "../procesos/usuarios/crud/correos/autorizarExpedienteCorreo.php?NoControl=" + noControl + "&Correo=" + correo;
        window.open(url, '_blank');
    }
</script>
