$(document).ready(function(){
    $('#tablaProgramasALoad').load("vistas/tablas/tablaProgramasA.php");
});

 function obtenerDatosProgramaE(idPrograma) {
    $.ajax({
        type: "POST",
        data: "idPrograma=" + idPrograma,
        url: "procesos/alumno/crud/obtenerDatosProgramaE.php",
        success:function(respuesta){
            console.log(respuesta);
            respuesta= jQuery.parseJSON(respuesta);
            console.log(respuesta);
            $('#idPrograma').val(respuesta['idPrograma']);
            $('#NombreP').val(respuesta['NombreP']);
            $('#Objetivo').val(respuesta['Objetivo']);
            $('#idDependencia').val(respuesta['idDependencia']);
            $('#idTipoAct').val(respuesta['idTipoAct']);
            $('#idModalidad').val(respuesta['idModalidad']);
        }
    });
}

function elegirPrograma(){
    $.ajax({
        type: "POST",
        data: $('#frmElegirPrograma').serialize(),
        url: "procesos/alumno/crud/elegirPrograma.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if (respuesta == 1) {
                $('#tablaProgramasALoad').load("vistas/tablas/tablaProgramasA.php");
                $('#frmElegirPrograma')[0].reset();
                Swal.fire(":D", "Agregado con éxito", "success")
                .then(function(){
                    console.log(respuesta);
                   location.replace ("cartapresentacion.php");
                });
            } else {
                Swal.fire(":(", "Error al agregar" + respuesta, "error");
            }
        }
    });
    return false;
}
