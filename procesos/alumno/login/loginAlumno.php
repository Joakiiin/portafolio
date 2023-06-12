<?php
session_start();
$alumno = $_POST['login'];
$password= $_POST['password'];
include "../../../sass/clases/alumno.php";
$Alumnos= new Alumnos();
echo $Alumnos->loginAlumno($alumno, $password);
?>