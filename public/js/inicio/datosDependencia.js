function datosDependencia(NoControl) {
    $.ajax({
        type: "POST",
        data: "NoControl=" + NoControl,
        url: "procesos/alumno/crud/obtenerDatosDependencia.php",
        success: function(respuesta) {
            respuesta = jQuery.parseJSON(respuesta);
            $('#TDependenciaRep').text(respuesta['TitularDep']);
            $('#DependenciaRep').text(respuesta['Dependencia']);
            $('#TPuestoRep').text(respuesta['Puesto']);
            $('#correodep').text(respuesta['correodep']);
            $('#contactodep').text(respuesta['contactodep']);
            console.log(respuesta);
        }
    });
}