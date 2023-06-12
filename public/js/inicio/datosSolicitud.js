function datosPersonalesSolicitud(NoControl) {
    $.ajax({
        type: "POST",
        data: "NoControl=" + NoControl,
        url: "procesos/alumno/crud/obtenerDatosAlumnoSolicitud.php",
        success: function(respuesta) {
            console.log(respuesta);
            respuesta = jQuery.parseJSON(respuesta);
            $('#apellidoPS').val(respuesta['ApellidoP']);
            $('#apellidoMS').val(respuesta['ApellidoM']);
            $('#NombreS').val(respuesta['Nombre']);
            $('#telefonoS').val(respuesta['Telefono']);
            $('#sexoS').val(respuesta['Sexo']);
            $('#carreraS').val(respuesta['Carrera']);
            $('#periodoS').val(respuesta['Periodo']);
            $('#yearS').val(respuesta['Year']);
            $('#semestreS').val(respuesta['Semestre']);
            $('#tdependenciaS').val(respuesta['TitularDep']);
            $('#dependenciaS').val(respuesta['Dependencia']);
            $('#puestoS').val(respuesta['Puesto']);
            $('#nombrePS').val(respuesta['NombreP']);
            $('#modalidadS').val(respuesta['Modalidad']);
            $('#tipoPS').val(respuesta['Tipo']);
        }
    });
}