<?php
$NoControl= $_POST['NoControl'];
include "../../../sass/clases/alumno.php";
$Alumnos= new Alumnos();
echo json_encode($Alumnos->obtenerDatosDependencia($NoControl));


?>