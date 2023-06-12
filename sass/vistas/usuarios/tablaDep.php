<?php
include "../../clases/Conexion.php";
$con= new Conexion();
$conexion= $con->conectar();
$sql= "SELECT dep.idDependencia, dep.NombreDep, dep.TitularDep, dep.puesto, dep.estatus, 
ddep.codigoPDEP, ddep.estadoDep, ddep.ciudadDep, ddep.municipioDep, ddep.coloniaDep,
ddep.calleNoDep
FROM dependencia AS dep INNER JOIN domiciliosdep AS ddep 
ON ddep.NoControlDomDep = dep.idDependencia";
$respuesta= mysqli_query($conexion, $sql);
?>


<table class="table table-striped table-sm dt-responsive nowrap" style="width:100%" id="tablaDepDataTable">
    <thead>
        <th>NoControl</th> 
        <th>Dependencia</th>
        <th>Titular</th>
        <th>Puesto</th>
        <th>C.P</th>
        <th>Estado</th>
        <th>Ciudad</th>
        <th>Municipio</th>
        <th>Colonia</th>
        <th>Calle</th>
        <th>Password</th>
        <th>Activar</th>
        <th>Editar</th>
        <th>Eliminar</th>
    </thead>
    <tbody>
  <?php
  while ($mostrar= mysqli_fetch_array($respuesta)) {
    
     ?>
        <tr>
        <td><?php echo $mostrar['idDependencia']; ?></td>
        <td><?php echo $mostrar['NombreDep']; ?></td>
        <td><?php echo $mostrar['TitularDep']; ?></td>
        <td><?php echo $mostrar['puesto']; ?></td>
        <td><?php echo $mostrar['codigoPDEP']; ?></td>
        <td><?php echo $mostrar['estadoDep']; ?></td>
        <td><?php echo $mostrar['ciudadDep']; ?></td>
        <td><?php echo $mostrar['municipioDep']; ?></td>
        <td><?php echo $mostrar['coloniaDep']; ?></td>
        <td><?php echo $mostrar['calleNoDep']; ?></td>
        <td>
            <button class="btn btn-info btn-sm" 
            data-bs-toggle="modal" 
            data-bs-target="#modalCambiarPassword"
            onclick="agregarIdDepReset(<?php echo $mostrar['idDependencia'] ?>)">
                <span class="fas fa-exchange-alt"></span>
            </button>
        </td>
        <td>
            <?php if($mostrar['estatus'] == 1){ ?>
                <button class="btn btn-success btn-sm" 
                onclick="cambioDependencia(<?php echo $mostrar['idDependencia'] ?>, <?php echo $mostrar['estatus'] ?>)">
                <span class= "fas fa-power-off"></span>On
            </button>
                
            
            <?php
            } else if ($mostrar['estatus'] == 0) {
                ?>
                <button class="btn btn-secondar btn-sm" 
                onclick= "cambioDependencia(<?php echo $mostrar['idDependencia'] ?>, <?php echo $mostrar['estatus'] ?>)">
                <span class= "fas fa-power-off"></span>Off
            </button>
                <?php
            }
            ?>
        </td>
        <td>
            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" 
            data-bs-target="#modalActualizarDep"
            onclick="obtenerDatosDependencia(<?php echo $mostrar['idDependencia'] ?>)">
                Editar
            </button>
        </td>
        <td>
            <button class="btn btn-danger btn-sm" onclick="eliminarDependencia(<?php echo $mostrar['idDependencia'] ?>)">
                Eliminar
            </button>
        </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#tablaDepDataTable').DataTable({
            language: {
                url: "../public/datatable/es-ES.json"
            }
    });
    });
</script>
