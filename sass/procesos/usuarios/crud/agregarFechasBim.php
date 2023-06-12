<?php

    
$datos= array(
"nocontrol" => $_POST['nocontrolA'],
"fechaI" => $_POST['fechaIA'],
"fechaT" => $_POST['fechaTA'],
"bimestre" => $_POST['bimestre']
);
include "../../../clases/alumno.php";
$Alumnos= new Alumnos();

echo $Alumnos->registrasFechasITB($datos);

?>