<?php
include "../../../clases/alumno.php";
$Alumnos= new Alumnos();
$datos= array(
    "password" => $_POST['passwordAct'],
    "nocontrol" => $_POST['idAlumnoReset']
);
echo $Alumnos->actualizarPassword($datos);
?>