function datosPersonalesReporte(NoControl) {
    $.ajax({
        type: "POST",
        data: "NoControl=" + NoControl,
        url: "procesos/alumno/crud/obtenerDatosAlumnoSolicitud.php",
        success: function(respuesta) {
            console.log(respuesta);
            respuesta = jQuery.parseJSON(respuesta);
            $('#apellidoPRep').val(respuesta['ApellidoP']);
            $('#apellidoMRep').val(respuesta['ApellidoM']);
            $('#NombreRep').val(respuesta['Nombre']);
            $('#carreraRep').val(respuesta['Carrera']);
            $('#TDependenciaRep').val(respuesta['TitularDep']);
            $('#DependenciaRep').val(respuesta['Dependencia']);
            $('#TPuestoRep').val(respuesta['Puesto']);
            $('#ProgramaRep').val(respuesta['NombreP']);
        }
    });
}