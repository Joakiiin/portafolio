$(document).ready(function(){
   $('#tablaProgramasLoad').load("usuarios/tablaProgramas.php");
});

function agregarNuevoPrograma(){
    $.ajax({
        type: "POST",
        data: $('#frmAgregarPrograma').serialize(),
        url: "../procesos/usuarios/crud/agregarNuevoPrograma.php",
        success:function(respuesta){
            console.log(respuesta);
            respuesta= respuesta.trim();
            if (respuesta == 1) {
                $('#tablaProgramasLoad').load("usuarios/tablaProgramas.php");
                $('#frmAgregarPrograma')[0].reset();
                $('#midiv').load("programas.php");
                Swal.fire(":D", "Agregado con exito", "success");
            } else {
                Swal.fire(":(","Error al agregar" + respuesta,"error")
            }
        }
    });
    return false;
}
function asignarPrograma(){
    $.ajax({
        type: "POST",
        data: $('#frmAsignarPrograma').serialize(),
        url: "../procesos/usuarios/crud/asignarPrograma.php",
        success:function(respuesta){
            console.log(respuesta);
            respuesta= respuesta.trim();
            if (respuesta == 1) {
                $('#tablaProgramasLoad').load("usuarios/tablaProgramas.php");
                $('#frmAsignarPrograma')[0].reset();
                Swal.fire(":D", "Agregado con exito", "success");
            } else {
                Swal.fire(":(","Error al agregar" + respuesta,"error")
            }
        }
    });
    return false;
}
function obtenerDatosPrograma(idPrograma) {
    $.ajax({
        type: "POST",
        data: "idPrograma=" + idPrograma,
        url: "../procesos/usuarios/crud/obtenerDatosPrograma.php",
        success:function(respuesta){
            console.log(respuesta);
            respuesta= jQuery.parseJSON(respuesta);
            console.log(respuesta);
            $('#idproU').val(respuesta['idPrograma']);
            $('#namepU').val(respuesta['NombreP']);
            $('#objU').val(respuesta['Objetivo']);
            $('#tipU').val(respuesta['idTipoAct']);
            $('#modU').val(respuesta['idModalidad']);
            $('#depU').val(respuesta['idDependencia']);
        }
    });
}
function actualizarPrograma(){
    $.ajax({
        type: "POST",
        data: $('#frmActualizarPrograma').serialize(),
        url: "../procesos/usuarios/crud/actualizarPrograma.php",
        success:function(respuesta){
            respuesta= respuesta.trim();
            if (respuesta == 1) {
                $('#tablaProgramasLoad').load("usuarios/tablaProgramas.php");
                $('#modalActualizarPrograma').modal('hide');
                Swal.fire(":D", "Actualizado con exito", "success");
            } else {
                Swal.fire(":(","Error al actualizar" + respuesta,"error");
            }
        }
    });
    return false;
}

function eliminarPrograma(idPrograma) {
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
                data: "idPrograma=" + idPrograma,
                url: "../procesos/usuarios/crud/eliminarPrograma.php",
                success:function(respuesta){
                    respuesta= respuesta.trim();
                    if (respuesta==1) {
                        $('#tablaProgramasLoad').load("usuarios/tablaProgramas.php");
                        Swal.fire(":D", "Programa eliminada con exito", "Advertencia!");
                    } else {
                        Swal.fire(":(", "Error al eliminar programa" + respuesta, "error");
                    }
                }
            });
            
        }
    });
    
}