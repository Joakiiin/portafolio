<?php
$datos= array(
    'nocontrol' => $_POST['nocontrolU'],
    'paterno' => $_POST['paternoU'],
    'materno' => $_POST['maternoU'],
    'nombre' => $_POST['nombreU'],
    'sexo' => $_POST['sexoU'],
    'telefono' => $_POST['telefonoU'],
    'correo' => $_POST['correoU'], 
    'carrera' => $_POST['carreraU'],
    'semestre' => $_POST['semestreU'],
    'edad' => $_POST['edadU']
        );
        include "../../../clases/alumno.php";
        $Alumnos= new Alumnos();
        echo $Alumnos->actualizarAlumno($datos);

?>