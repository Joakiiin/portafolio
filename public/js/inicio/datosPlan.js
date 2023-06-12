function datosPersonalesPlan(NoControl) {
    $.ajax({
        type: "POST",
        data: "NoControl=" + NoControl,
        url: "procesos/alumno/crud/obtenerDatosAlumnoPlan.php",
        success: function(respuesta) {
            respuesta = jQuery.parseJSON(respuesta);
            $('#apellidoPS').val(respuesta['ApellidoP']);
            $('#apellidoMS').val(respuesta['ApellidoM']);
            $('#NombreS').val(respuesta['Nombre']);
            $('#telefonoS').val(respuesta['Telefono']);
            $('#carreraS').val(respuesta['Carrera']);
            $('#semestreS').val(respuesta['Semestre']);
            $('#periodoS').val(respuesta['Periodo']);
            $('#yearS').val(respuesta['Year']);
            $('#tdependenciaS').val(respuesta['TitularDep']);
            $('#dependenciaS').val(respuesta['Dependencia']);
            $('#nombrePS').val(respuesta['NombreP']);
            $('#cpDep').val(respuesta['CodigoPDep']);
            $('#estadoDep').val(respuesta['EstadoDep']);
            $('#municipioDep').val(respuesta['MunicipioDep']);
            $('#coloniaDep').val(respuesta['ColoniaDep']);
            $('#calleDep').val(respuesta['CalleDep']);
        }
    });
}