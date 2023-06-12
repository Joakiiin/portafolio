function datosAutoEvaluacion(NoControl) {
    $.ajax({
        type: "POST",
        data: "NoControl=" + NoControl,
        url: "procesos/alumno/crud/obtenerDatosAutoEv.php",
        success: function(respuesta) {
            respuesta = jQuery.parseJSON(respuesta);
            $('#apellidoPA').val(respuesta['ApellidoP']);
            $('#apellidoMA').val(respuesta['ApellidoM']);
            $('#NombreA').val(respuesta['Nombre']);
            $('#ProgramaA').val(respuesta['Programa']);
            $('#PeriodoA').val(respuesta['Periodo']);
            $('#TDependenciaRep').val(respuesta['TitularDep']);
            $('#DependenciaRep').val(respuesta['Dependencia']);
            $('#TPuestoRep').val(respuesta['Puesto']);
            console.log(respuesta);
        }
    });
}