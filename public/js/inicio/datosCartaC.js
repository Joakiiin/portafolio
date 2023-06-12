function datosPersonalesCartaC(NoControl) {
    $.ajax({
        type: "POST",
        data: "NoControl=" + NoControl,
        url: "procesos/alumno/crud/obtenerDatosAlumnoCarta.php",
        success: function(respuesta) {
            respuesta = jQuery.parseJSON(respuesta);
            $('#apellidoPS').val(respuesta['ApellidoP']);
            $('#apellidoMS').val(respuesta['ApellidoM']);
            $('#NombreS').val(respuesta['Nombre']);
            $('#cpS').val(respuesta['CodigoP']);
            $('#estadoS').val(respuesta['Estado']);
            $('#municipioS').val(respuesta['Municipio']);
            $('#coloniaS').val(respuesta['Colonia']);
            $('#calleS').val(respuesta['Calle']);
            $('#telefonoS').val(respuesta['Telefono']);
            $('#carreraS').val(respuesta['Carrera']);
            $('#semestreS').val(respuesta['Semestre']);
            $('#tdependenciaS').val(respuesta['TitularDep']);
            $('#dependenciaS').val(respuesta['Dependencia']);
            $('#puestoS').val(respuesta['Puesto']);
            $('#fechaIS').val(respuesta['FechaI']);
            $('#fechaTS').val(respuesta['FechaT']);
            $('#cpDep').val(respuesta['CodigoPDep']);
            $('#estadoDep').val(respuesta['EstadoDep']);
            $('#municipioDep').val(respuesta['MunicipioDep']);
            $('#coloniaDep').val(respuesta['ColoniaDep']);
            $('#calleDep').val(respuesta['CalleDep']);
        }
    });
}