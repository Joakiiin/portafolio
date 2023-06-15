<?php
include "../../clases/Conexion.php";
$con= new Conexion();
$conexion= $con->conectar();
$sql= "SELECT p.idPrograma, p.NombreP, p.Objetivo, d.NombreDep, t.Actividad, m.Modalidad 
FROM programa AS p INNER JOIN dependencia AS d ON p.idDependencia1 = d.idDependencia
INNER JOIN tipoactividad AS t ON p.idTipoAct1 = t.idTipoAct
INNER JOIN modalidad AS m ON p.idModalidad1= m.idModalidad";
$respuesta= mysqli_query($conexion, $sql);
?>


<table class="table table-striped table-sm dt-responsive nowrap" style="width:100%" id="tablaProgramasDataTable">
    <thead>
        <th>Id</th> 
        <th>Nombre</th>
        <th>Objetivo</th>
        <th>Nombre Dependencia</th>
        <th>Tipo Actividad</th>
        <th>Modalidad</th>
        <th>Editar</th>
        <th>Eliminar</th>
    </thead>
    <tbody>
  <?php
  while ($mostrar= mysqli_fetch_array($respuesta)) {
    
     ?>
        <tr>
        <td><?php echo $mostrar['idPrograma']; ?></td>
        <td><?php echo $mostrar['NombreP']; ?></td>
        <td><?php echo $mostrar['Objetivo']; ?></td>
        <td><?php echo $mostrar['NombreDep']; ?></td>
        <td><?php echo $mostrar['Actividad']; ?></td>
        <td><?php echo $mostrar['Modalidad']; ?></td>
        <td>
            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" 
            data-bs-target="#modalActualizarPrograma"
            onclick="obtenerDatosPrograma(<?php echo $mostrar['idPrograma'] ?>)">
                Editar
            </button>
        </td>
        <td>
            <button class="btn btn-danger btn-sm" onclick="eliminarPrograma(<?php echo $mostrar['idPrograma'] ?>)">
                Eliminar
            </button>
        </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#tablaProgramasDataTable').DataTable({
            language: {
                url: "../public/datatable/es-ES.json"
            }
    });
    });
</script>