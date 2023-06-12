<?php 
    include "../../clases/Conexion.php";

    $con = new Conexion();
    $conexion = $con->conectar();

    $sql = "SELECT 
                usuarios.id_usuario as idUsuario,
                usuarios.usuario as usuario,
                roles.rol as rol,
                usuarios.id_rol as idRol,
                usuarios.estatus as estatus,
                usuarios.id_persona as idPersona,
                persona.nombre as nombre,
                persona.paterno as paterno,
                persona.materno as materno,
                persona.edad as edad,
                persona.sexo as sexo,
                persona.correo as correo,
                persona.telefono as telefono
            FROM
                tab_usuario AS usuarios
                    INNER JOIN
                tab_rol AS roles ON usuarios.id_rol = roles.id_rol
                    INNER JOIN
                tab_persona AS persona ON usuarios.id_persona = persona.id_persona;";
    $respuesta = mysqli_query($conexion, $sql);

?>

<table class="table table-striped table-sm dt-responsive nowrap" style="width:100%" id="tablaUsuariosDataTable">
    <thead>
        <th> <center> Apellido Paterno </center> </th>
        <th> <center> Apellido Materno </center> </th>
        <th> <center> Nombres </center> </th>
        <th> <center> Edad </center> </th>
        <th> <center> Sexo </center> </th>
        <th> <center> Telefono </center> </th>
        <th> <center> Correo </center> </th>
        <th> <center> Usuario </center> </th>
        <th>Modificar contraseña</th>
        <th>Estatus</th>
        <th>Editar</th>
    </thead>

    <tbody>
        <?php while ($mostrar = mysqli_fetch_array($respuesta)) { ?>
        <tr>
            <td> <?php echo $mostrar['paterno']; ?> </td>
            <td> <?php echo $mostrar['materno']; ?> </td>
            <td> <?php echo $mostrar['nombre']; ?> </td>
            <td> <?php echo $mostrar['edad']; ?> </td>
            <td> <?php echo $mostrar['sexo']; ?> </td>
            <td> <?php echo $mostrar['telefono']; ?> </td>            
            <td> <?php echo $mostrar['correo']; ?> </td>
            <td> <?php echo $mostrar['usuario']; ?> </td>
            <td>
                <button class="btn btn-info btn-sm" 
                        data-bs-toggle="modal" 
                        data-bs-target="#modalActualizarPassword" 
                        onclick="agregarIdUsuarioReset( <?php echo $mostrar['idUsuario']?> )">
                    <span class="fas fa-undo"></span>
                </button>
            </td>

            <td>
                <?php
                    if($mostrar['estatus'] == 1) {
                ?>
                    <button class="btn btn-success btn-sm" onclick="cambioEstatusUsuario(<?php echo $mostrar['idUsuario'] ?>, <?php echo $mostrar['estatus'] ?>)">
                        <span class="fas fa-toggle-on"></span> ON
                    </button>
                <?php
                    } else if ($mostrar['estatus'] == 0) {
                ?>
                    <button class="btn btn-secondar btn-sm" onclick="cambioEstatusUsuario(<?php echo $mostrar['idUsuario'] ?>, <?php echo $mostrar['estatus'] ?>)">
                        <span class="fas fa-toggle-off"></span> OFF
                    </button>
                <?php } ?>
            </td>

            <td>
                <button class="btn btn-warning btn-sm" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalActualizarUsuarios"
                                                        onclick="obtenerDatosUsuario( <?php echo $mostrar['idUsuario'] ?> )">
                    <span class="fas fa-edit"></span>
                </button>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {
        $('#tablaUsuariosDataTable').DataTable({
            language: {
                url: "../public/datatable/es-ES.json"
            }
        });
    });
</script>