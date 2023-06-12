function datosPersonales(NoControl) {
    $.ajax({
        type: "POST",
        data: "NoControl=" + NoControl,
        url: "procesos/alumno/crud/obtenerDatosAlumno.php",
        success: function(respuesta) {
            respuesta = jQuery.parseJSON(respuesta);
            $('#nombres').val(respuesta['Nombre']);
            $('#app').val(respuesta['ApellidoP']);
            $('#apm').val(respuesta['ApellidoM']);
            $('#carrera').val(respuesta['CarreraN']);
            $('#Programa').val(respuesta['NombreP']);
            $('#dependencia').val(respuesta['NombreDep']);
            $('#destinatario').val(respuesta['TitularDep']);
        }
    });
}