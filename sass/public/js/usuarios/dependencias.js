$(document).ready(function(){
   $('#tablaDependenciasLoad').load("usuarios/tablaDep.php");
});

function agregarNuevoDep(){
    var formData = new FormData();
    formData.append("file", $("#frmAgregarDep input[name='file']")[0].files[0]);

    // Agregar todos los demás campos del formulario
    $("#frmAgregarDep").serializeArray().forEach(function(field) {
      formData.append(field.name, field.value);
    });

    $.ajax({
        processData: false,
        contentType: false,
        type: "POST",
        data: formData,
        url: "../procesos/usuarios/crud/agregarNuevoDep.php",
        success:function(respuesta){
            respuesta= respuesta.trim();
            if (respuesta == 1) {
                console.log(respuesta);
                $('#tablaDependenciasLoad').load("usuarios/tablaDep.php");
                $('#frmAgregarDep')[0].reset();
                Swal.fire(":D", "Agregado con exito", "success");
            } else {
                Swal.fire(":(","Error al agregar" + respuesta,"error");
            }
        }
    });
    return false;
}

function obtenerDatosDependencia(idDependencia) {
    $.ajax({
        type: "POST",
        data: "idDependencia=" + idDependencia,
        url: "../procesos/usuarios/crud/obtenerDatosDep.php",
        success:function(respuesta){
            console.log(respuesta);
            respuesta= jQuery.parseJSON(respuesta);
            console.log(respuesta);
            $('#cpU').val(respuesta['cp']);
            $('#estadoU').val(respuesta['estado']);
            $('#ciudadU').val(respuesta['ciudad']);
            $('#municipioU').val(respuesta['municipio']);
            $('#coloniaU').val(respuesta['colonia']);
            $('#calleU').val(respuesta['calle']);
            $('#idDepU').val(respuesta['idDependencia']);
            $('#nombreDU').val(respuesta['NombreDep']);
            $('#titularDU').val(respuesta['TitularDep']);
            $('#puestoU').val(respuesta['puesto']);
        }
    });
}
function actualizarDep(){
    $.ajax({
        type: "POST",
        data: $('#frmActualizarDep').serialize(),
        url: "../procesos/usuarios/crud/actualizarDep.php",
        success:function(respuesta){
            respuesta= respuesta.trim();
            if (respuesta == 1) {
                $('#tablaDependenciasLoad').load("usuarios/tablaDep.php");
                $('#modalActualizarDep').modal('hide');
                Swal.fire(":D", "Actualizado con exito", "success");
            } else {
                Swal.fire(":(","Error al actualizar" + respuesta,"error");
            }
        }
    });
    return false;
}
function agregarIdDepReset(idDependencia){
    $('#idDepReset').val(idDependencia);
}

function cambiarPassword() {
    $.ajax({
        type: "POST",
        data:$('#frmCambiarPassword').serialize(),
        url: "../procesos/usuarios/extras/cambiarPassword.php",
        success:function(respuesta){
            respuesta= respuesta.trim();
            if (respuesta == 1) {
                $('#modalCambiarPassword').modal('hide');
                Swal.fire(":D", "Password cambiado con exito", "success");
            } else {
                Swal.fire(":(","Error al actualizar password" + respuesta,"error");
            }
        }
    });
    return false;
}
function cambioDependencia(idDependencia, estatus) {
    $.ajax({
        type: "POST",
        data: "idDependencia=" + idDependencia + "&estatus=" + estatus,
        url: "../procesos/usuarios/extras/cambioDependencia.php",
        success:function(respuesta){
            respuesta= respuesta.trim();
            if (respuesta == 1) {
                $('#tablaDependenciasLoad').load("usuarios/tablaDep.php");
                Swal.fire(":D", "Estatus cambiado con exito", "success");
            } else {
                Swal.fire(":(","Error al cambiar estatus" + respuesta,"error");
            }
        }
    });
}
function eliminarDependencia(idDependencia) {
    Swal.fire({
        title: 'Estas seguro de que deseas eliminar este registro?',
        text: "Una vez eliminado no podras recuperarlo",
        icon: 'Advertencia',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, eliminar'
    }). then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                data: "idDependencia=" + idDependencia,
                url: "../procesos/usuarios/crud/eliminarDependencia.php",
                success:function(respuesta){
                    respuesta= respuesta.trim();
                    if (respuesta==1) {
                        $('#tablaDependenciasLoad').load("usuarios/tablaDep.php");
                        Swal.fire(":D", "Dependencia eliminada con exito", "Advertencia!");
                    } else {
                        Swal.fire(":(", "Error al eliminar dependencia" + respuesta, "error");
                    }
                }
            });
            
        }
    });
    
}