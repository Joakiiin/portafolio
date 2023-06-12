<?php

    
$datos= array(
"nocontrol" => $_POST['nocontrolS'],
"Dia" => $_POST['diaF'],
"Mes" => $_POST['mesF'],
"Year" => $_POST['yearF']
);
include "../../../clases/alumno.php";
$Alumnos= new Alumnos();

echo $Alumnos->agregarCompromisoAlumno($datos);

?>