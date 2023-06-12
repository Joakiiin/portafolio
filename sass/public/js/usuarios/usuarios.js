$(document).ready(function(){
    $('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php");
});
function agregarNuevoUsuario(){

    $.ajax({
        type: "POST",
        data: $('#frmAgregarUsuario').serialize(),
        url: "../procesos/usuarios/crud/agregarNuevoUsuario.php",
        success:function(respuesta) {
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                $('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php");
                $('#frmAgregarUsuario')[0].reset();
                Swal.fire(":)", "Agregado con exito!", "success");
            } else {
                Swal.fire(":(", "Error al agregar!" + respuesta, "error");
            }
        }
    });

    return false;
}

function obtenerDatosUsuario(idUsuario) {
    $.ajax({
        type: "POST",
        data: "idUsuario=" + idUsuario,
        url: "../procesos/usuarios/crud/obtenerDatosUsuario.php",
        success:function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);
            $('#idUsuario').val(respuesta['idUsuario']);
            $('#paternou').val(respuesta['paterno']);
            $('#maternou').val(respuesta['materno']);
            $('#nombreu').val(respuesta['nombrePersona']);
            $('#edadu').val(respuesta['edad']);
            $('#sexou').val(respuesta['sexo']);
            $('#telefonou').val(respuesta['telefono']);
            $('#correou').val(respuesta['correo']);
            $('#calleu').val(respuesta['calle']);
            $('#nExterioru').val(respuesta['nExterior']);
            $('#nInterioru').val(respuesta['nInterior']);
            $('#coloniau').val(respuesta['colonia']);
            $('#municipiou').val(respuesta['municipio']);
            $('#estadou').val(respuesta['estado']);
            $('#usuariou').val(respuesta['nombreUsuario']);
        }
    });
}

function agregarIdUsuarioReset(idUsuario) {
    $('#idUsuarioReset').val(idUsuario);
}

function resetPassword() {
    $.ajax({
        type: "POST",
        data: $('#frmActualizaPassword').serialize(),
        url: "../procesos/usuarios/extras/resetPassword.php",
        success: function(respuesta) {
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                $('#modalActualizarPassword').modal('hide');
                $('#frmActualizaPassword')[0].reset();
                Swal.fire(":D", "Contraseña modificada!", "success");
            } else {
                Swal.fire(":(", "Error al modificar la contraseña!" + respuesta, "error");
            }
        }
    });

    return false;
}

function cambioEstatusUsuario(idUsuario, estatus) {
    $.ajax({
        type: "POST",
        data: "idUsuario=" + idUsuario + "&estatus=" + estatus,
        url: "../procesos/usuarios/extras/cambioEstatus.php",
        success: function(respuesta) {
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                $('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php");
                Swal.fire(":D", "Cambio de estatus con éxito", "success");
            } else {
                Swal.fire(":(", "Error al intentar cambiar el estatus del usuario!" + respuesta, "error");
            }
        }
    });
}