<?php
include "../../clases/Conexion.php";
$con= new Conexion();
$conexion= $con->conectar();
$sql= "SELECT ps.idPS, ps.NoControl1, al.Nombre, ps.idPrograma1, p.NombreP
FROM programaseleccionado AS ps INNER JOIN alumno AS al ON ps.NoControl1 = al.NoControl
INNER JOIN programa AS p ON p.idPrograma = ps.idPrograma1";
$respuesta= mysqli_query($conexion, $sql);
?>


<table class="table table-striped table-sm dt-responsive nowrap" style="width:100%" id="tablaProgramasASDataTable">
    <thead>
        <th>Registro</th> 
        <th>No. de control</th>
        <th>Alumno</th>
        <th>Id programa</th>
        <th>Programa</th>
        <th>Editar</th>
        <th>Eliminar</th>
    </thead>
    <tbody>
  <?php
  while ($mostrar= mysqli_fetch_array($respuesta)) {
    
     ?>
        <tr>
        <td><?php echo $mostrar['idPS']; ?></td>
        <td><?php echo $mostrar['NoControl1']; ?></td>
        <td><?php echo $mostrar['Nombre']; ?></td>
        <td><?php echo $mostrar['idPrograma1']; ?></td>
        <td><?php echo $mostrar['NombreP']; ?></td>
        <td>
            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" 
            data-bs-target="#modalActualizarProgramaS"
            onclick="obtenerDatosProgramaS(<?php echo $mostrar['idPS'] ?>)">
                Editar
            </button>
        </td>
        <td>
            <button class="btn btn-danger btn-sm" onclick="eliminarSeleccion(<?php echo $mostrar['NoControl1'] ?>)">
                Eliminar
            </button>
        </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#tablaProgramasASDataTable').DataTable({
            language: {
                url: "../public/datatable/es-ES.json"
            }
    });
    });
</script>