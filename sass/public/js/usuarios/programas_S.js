$(document).ready(function(){
   $('#tablaAsignadosLoad').load("usuarios/tablaProgramas_S.php");
});
function obtenerDatosProgramaS(idPS) {
    $.ajax({
        type: "POST",
        data: "idPS=" + idPS,
        url: "../procesos/usuarios/crud/obtenerDatosPrograma_S.php",
        success:function(respuesta){
            console.log(respuesta);
            respuesta= jQuery.parseJSON(respuesta);
            console.log(respuesta);
            $('#idPSU').val(respuesta['idPS']);
            $('#nocontrolSU').val(respuesta['NoControl1']);
            $('#idproS_U').val(respuesta['idPrograma1']);
        }
    });
}
function actualizarProgramaS(){
    $.ajax({
        type: "POST",
        data: $('#frmActualizarProgramaS').serialize(),
        url: "../procesos/usuarios/crud/actualizarProgramaS.php",
        success:function(respuesta){
            respuesta= respuesta.trim();
            if (respuesta == 1) {
                $('#tablaAsignadosLoad').load("usuarios/tablaProgramas_S.php");
                $('#modalActualizarProgramaS').modal('hide');
                Swal.fire(":D", "Actualizado con exito", "success");
            } else {
                Swal.fire(":(","Error al actualizar" + respuesta,"error");
            }
        }
    });
    return false;
}

function eliminarSeleccion(NoControl1) {
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
                data: "NoControl1=" + NoControl1,
                url: "../procesos/usuarios/crud/eliminarSeleccion.php",
                success:function(respuesta){
                    respuesta= respuesta.trim();
                    if (respuesta==1) {
                        $('#tablaAsignadosLoad').load("usuarios/tablaProgramas_S.php");
                        Swal.fire(":D", "Seleccion eliminada con exito", "Advertencia!");
                    } else {
                        Swal.fire(":(", "Error al eliminar seleccion" + respuesta, "error");
                    }
                }
            });
            
        }
    });
    
}