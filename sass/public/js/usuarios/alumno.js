$(document).ready(function(){
   $('#tablaAlumnosLoad').load("usuarios/tablaAlumnos.php");
});

function agregarNuevoAlumno(){
    var formData = new FormData();
    formData.append("file", $("#frmAgregarAlumno input[name='file']")[0].files[0]);

    // Agregar todos los demás campos del formulario
    $("#frmAgregarAlumno").serializeArray().forEach(function(field) {
      formData.append(field.name, field.value);
    });

    $.ajax({
        processData: false,
        contentType: false,
        type: "POST",
        data: formData,
        url: "../procesos/usuarios/crud/agregarNuevoAlumno.php",
        success:function(respuesta){
            respuesta= respuesta.trim();
            if (respuesta == 1) {
                console.log(respuesta);
                $('#tablaAlumnosLoad').load("usuarios/tablaAlumnos.php");
                $('#frmAgregarAlumno')[0].reset();
                Swal.fire(":D", "Agregado con exito" + respuesta, "success");
            } else {
                Swal.fire(":(","Error al agregar" + respuesta,"error");
            }
        }
    });
    return false;
}

function obtenerDatosAlumno(NoControl) {
    $.ajax({
        type: "POST",
        data: "NoControl=" + NoControl,
        url: "../procesos/usuarios/crud/obtenerDatosAlumno.php",
        success:function(respuesta){
            console.log(respuesta);
            respuesta= jQuery.parseJSON(respuesta);
            console.log(respuesta);
            $('#nocontrolU').val(respuesta['NoControl']);
            $('#paternoU').val(respuesta['ApellidoP']);
            $('#maternoU').val(respuesta['ApellidoM']);
            $('#nombreU').val(respuesta['Nombre']);
            $('#sexoU').val(respuesta['Sexo']);
            $('#telefonoU').val(respuesta['Telefono']);
            $('#correoU').val(respuesta['Correo']);
            $('#carreraU').val(respuesta['Carrera']);
            $('#semestreU').val(respuesta['Semestre']);
            $('#edadU').val(respuesta['edad']);
            $('#creditosU').val(respuesta['creditos']);
            $('#periodoU').val(respuesta['periodo']);
            $('#fechaU').val(respuesta['year']);

        }
    });
}
function actualizarAlumno(){
    $.ajax({
        type: "POST",
        data: $('#frmActualizarAlumno').serialize(),
        url: "../procesos/usuarios/crud/actualizarAlumno.php",
        success:function(respuesta){
            respuesta= respuesta.trim();
            if (respuesta == 1) {
                $('#tablaAlumnosLoad').load("usuarios/tablaAlumnos.php");
                $('#modalActualizarAlumno').modal('hide');
                Swal.fire(":D", "Actualizado con exito", "success");
            } else {
                Swal.fire(":(","Error al actualizar" + respuesta,"error");
            }
        }
    });
    return false;
}
function agregarIdAlumnoReset(NoControl){
    $('#idAlumnoReset').val(NoControl);
}

function actualizarPassword() {
    $.ajax({
        type: "POST",
        data:$('#frmResetPassword').serialize(),
        url: "../procesos/usuarios/extras/actualizarPassword.php",
        success:function(respuesta){
            respuesta= respuesta.trim();
            if (respuesta == 1) {
                $('#modalResetPassword').modal('hide');
                Swal.fire(":D", "Password cambiado con exito", "success");
            } else {
                Swal.fire(":(","Error al actualizar password" + respuesta,"error");
            }
        }
    });
    return false;
}
function cambioAlumno(NoControl, estatus) {
    $.ajax({
        type: "POST",
        data: "NoControl=" + NoControl + "&estatus=" + estatus,
        url: "../procesos/usuarios/extras/cambioAlumno.php",
        success:function(respuesta){
            respuesta= respuesta.trim();
            if (respuesta == 1) {
                $('#tablaAlumnosLoad').load("usuarios/tablaAlumnos.php");
                Swal.fire(":D", "Estatus cambiado con exito", "success");
            } else {
                Swal.fire(":(","Error al cambiar estatus" + respuesta,"error");
            }
        }
    });
}
function agregarFechasAlumno(){
    var accion = $("#frmSolicitud").attr("action");
    $.ajax({
        type: "POST",
        data: $('#frmSolicitud').serialize(),
        url: "sass/procesos/usuarios/crud/agregarFechas.php",
        success:function(respuesta) {
            respuesta = respuesta.trim();
            console.log(respuesta);
            if (respuesta == 1) {
                Swal.fire(":)", "Solicitud generada con exito! Favor de presionar la pestaña de Servicio Social", "success");
            } else {
                Swal.fire(":(", "Error al agregar!" + respuesta, "error");
            }
        }
    });
    $("#frmSolicitud").attr("action", accion);
    return true;
}
function registrasFechasITB(){
    var accion = $("#frmAutoEv").attr("action");
    $.ajax({
        type: "POST",
        data: $('#frmAutoEv').serialize(),
        url: "sass/procesos/usuarios/crud/agregarFechasBim.php",
        success:function(respuesta) {
            respuesta = respuesta.trim();
            console.log(respuesta);
            if (respuesta == 1) {
                Swal.fire(":)", "Solicitud generada con exito! Favor de presionar la pestaña de Servicio Social", "success");
            } else {
                Swal.fire(":(", "Error al agregar!" + respuesta, "error");
            }
        }
    });
    $("#frmSolicitud").attr("action", accion);
    return true;
}
function agregarCompromisoAlumno(){
    var accion = $("#frmCompromiso").attr("action");
    $.ajax({
        type: "POST",
        data: $('#frmCompromiso').serialize(),
        url: "sass/procesos/usuarios/crud/agregarCompromiso.php",
        success:function(respuesta) {
            respuesta = respuesta.trim();
            console.log(respuesta);
            if (respuesta == 1) {
                Swal.fire(":)", "Carta generada con exito! Favor de presionar la pestaña de Servicio Social", "success");
            } else {
                Swal.fire(":(", "Error al agregar!" + respuesta, "error");
            }
        }
    });
    $("#frmCompromiso").attr("action", accion);
    return true;
}
function agregarPlanAlumno(){
    var accion = $("#frmPlandetrabajo").attr("action");
    $.ajax({
        type: "POST",
        data: $('#frmPlandetrabajo').serialize(),
        url: "sass/procesos/usuarios/crud/agregarPlan.php",
        success:function(respuesta) {
            respuesta = respuesta.trim();
            console.log(respuesta);
            if (respuesta == 1) {
                Swal.fire(":)", "Agregado con exito! Favor de presionar la pestaña de Servicio Social", "success");
            } else {
                Swal.fire(":(", "Error al agregar!" + respuesta, "error");
            }
        }
    });
    $("#frmPlandetrabajo").attr("action", accion);
    return true;
}
function subirDocumentoExp(){
    var formData = new FormData();
    var archivos = document.querySelectorAll('input[type="file"]');

    archivos.forEach(function(archivo) {
        formData.append(archivo.name, archivo.files[0]);
    });

    // Agregar todos los demás campos del formulario
    $("#frmSubirDoc").serializeArray().forEach(function(field) {
        formData.append(field.name, field.value);
    });

    $.ajax({
        processData: false,
        contentType: false,
        type: "POST",
        data: formData,
        url: "sass/procesos/usuarios/crud/subirDocumentoExp.php",
        success:function(respuesta){
            respuesta= respuesta.trim();
            console.log(respuesta);
            if (respuesta == 1) {
                console.log(respuesta);
                Swal.fire(":D", "Agregado con exito" + respuesta, "success");
            } else {
                Swal.fire(":(","Error al agregar" + respuesta,"error");
            }
        }
    });
    return false;
}
function subirDocumentoEv1(){
    var formData = new FormData();
    var archivos = document.querySelectorAll('input[type="file"]');

    archivos.forEach(function(archivo) {
        formData.append(archivo.name, archivo.files[0]);
    });

    // Agregar todos los demás campos del formulario
    $("#frmSubirEv1").serializeArray().forEach(function(field) {
        formData.append(field.name, field.value);
    });

    $.ajax({
        processData: false,
        contentType: false,
        type: "POST",
        data: formData,
        url: "sass/procesos/usuarios/crud/subirDocumentoEv1.php",
        success:function(respuesta){
            respuesta= respuesta.trim();
            console.log(respuesta);
            if (respuesta == 1) {
                console.log(respuesta);
                Swal.fire(":D", "Agregado con exito" + respuesta, "success");
            } else {
                Swal.fire(":(","Error al agregar" + respuesta,"error");
            }
        }
    });
    return false;
}
function subirDocumentoEv2(){
    var formData = new FormData();
    var archivos = document.querySelectorAll('input[type="file"]');

    archivos.forEach(function(archivo) {
        formData.append(archivo.name, archivo.files[0]);
    });

    // Agregar todos los demás campos del formulario
    $("#frmSubirEv2").serializeArray().forEach(function(field) {
        formData.append(field.name, field.value);
    });

    $.ajax({
        processData: false,
        contentType: false,
        type: "POST",
        data: formData,
        url: "sass/procesos/usuarios/crud/subirDocumentoEv2.php",
        success:function(respuesta){
            respuesta= respuesta.trim();
            console.log(respuesta);
            if (respuesta == 1) {
                console.log(respuesta);
                Swal.fire(":D", "Agregado con exito" + respuesta, "success");
            } else {
                Swal.fire(":(","Error al agregar" + respuesta,"error");
            }
        }
    });
    return false;
}
function subirDocumentoEv3(){
    var formData = new FormData();
    var archivos = document.querySelectorAll('input[type="file"]');

    archivos.forEach(function(archivo) {
        formData.append(archivo.name, archivo.files[0]);
    });

    // Agregar todos los demás campos del formulario
    $("#frmSubirEv3").serializeArray().forEach(function(field) {
        formData.append(field.name, field.value);
    });

    $.ajax({
        processData: false,
        contentType: false,
        type: "POST",
        data: formData,
        url: "sass/procesos/usuarios/crud/subirDocumentoEv3.php",
        success:function(respuesta){
            respuesta= respuesta.trim();
            console.log(respuesta);
            if (respuesta == 1) {
                console.log(respuesta);
                Swal.fire(":D", "Agregado con exito" + respuesta, "success");
            } else {
                Swal.fire(":(","Error al agregar" + respuesta,"error");
            }
        }
    });
    return false;
}
function subirDocumentoEvF(){
    var formData = new FormData();
    var archivos = document.querySelectorAll('input[type="file"]');

    archivos.forEach(function(archivo) {
        formData.append(archivo.name, archivo.files[0]);
    });

    // Agregar todos los demás campos del formulario
    $("#frmSubirEvF").serializeArray().forEach(function(field) {
        formData.append(field.name, field.value);
    });

    $.ajax({
        processData: false,
        contentType: false,
        type: "POST",
        data: formData,
        url: "sass/procesos/usuarios/crud/subirDocumentoEvF.php",
        success:function(respuesta){
            respuesta= respuesta.trim();
            console.log(respuesta);
            if (respuesta == 1) {
                console.log(respuesta);
                Swal.fire(":D", "Agregado con exito" + respuesta, "success");
            } else {
                Swal.fire(":(","Error al agregar" + respuesta,"error");
            }
        }
    });
    return false;
}
function autorizarExpediente(NoControl, idRolFK) {
    $.ajax({
        type: "POST",
        data: "NoControl=" + NoControl + "&idRolFK=" + idRolFK,
        url: "../procesos/usuarios/extras/autorizarExpediente.php",
        success:function(respuesta){
            respuesta= respuesta.trim();
            if (respuesta == 1) {
                $('#tablaAlumnosLoad').load("usuarios/tablaAlumnos.php");
                Swal.fire(":D", "Expediente eutorizado con exito", "success");
            } else {
                Swal.fire(":(","Error al autorizar el expediente" + respuesta,"error");
            }
        }
    });
}
function liberarServicio(NoControl, idRolFK) {
    $.ajax({
        type: "POST",
        data: "NoControl=" + NoControl + "&idRolFK=" + idRolFK,
        url: "../procesos/usuarios/extras/liberarServicio.php",
        success:function(respuesta){
            respuesta= respuesta.trim();
            if (respuesta == 1) {
                $('#tablaAlumnosLoad').load("usuarios/tablaAlumnos.php");
                Swal.fire(":D", "Servicio liberado con exito", "success");
            } else {
                Swal.fire(":(","Error al liberar el servicio" + respuesta,"error");
            }
        }
    });
}
function eliminarAlumno(NoControl) {
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
                data: "NoControl=" + NoControl,
                url: "../procesos/usuarios/crud/eliminarAlumno.php",
                success:function(respuesta){
                    respuesta= respuesta.trim();
                    if (respuesta==1) {
                        $('#tablaAlumnosLoad').load("usuarios/tablaAlumnos.php");
                        Swal.fire(":D", "Alumno eliminado con exito", "Advertencia!");
                    } else {
                        Swal.fire(":(", "Error al eliminar alumno" + respuesta, "error");
                    }
                }
            });
            
        }
    });
    
}