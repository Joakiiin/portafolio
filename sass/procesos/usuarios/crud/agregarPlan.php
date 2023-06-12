<?php

    
$datos= array(
"nocontrol" => $_POST['nocontrolS']
);
include "../../../clases/alumno.php";
$Alumnos= new Alumnos();

echo $Alumnos->agregarPlanAlumno($datos);

?>