function loginAlumno(){
    $.ajax({
        type: "POST",
        data: $('#frmLogin').serialize(),
        url: "procesos/alumno/login/loginAlumno.php",
        success:function(respuesta){
            respuesta= respuesta.trim();
            if (respuesta == 1) {
                window.location.href= "principal.php";
            } else{
                Swal.fire(":(", "Error al entrar!" + respuesta, "error");
            }
        }
    });
    return false;
}