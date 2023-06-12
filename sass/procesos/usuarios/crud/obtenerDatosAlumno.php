<?php
$NoControl= $_POST['NoControl'];
include "../../../clases/alumno.php";
$Alumnos= new Alumnos();
echo json_encode($Alumnos->obtenerDatosAlumno($NoControl));


?>
