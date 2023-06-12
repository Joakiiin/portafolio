<?php

    
$datos= array(
"nocontrol" => $_POST['nocontrolS'],
"fechaI" => $_POST['fechaIS'],
"fechaT" => $_POST['fechaTS'],
"codigoP" => $_POST['cp'],
"estado" => $_POST['estado'],
"ciudad" => $_POST['ciudad'],
"municipio" => $_POST['municipio'],
"colonia" => $_POST['colonia'],
"calle" => $_POST['calle']
);
include "../../../clases/alumno.php";
$Alumnos= new Alumnos();

echo $Alumnos->agregarFechasAlumno($datos);

?>