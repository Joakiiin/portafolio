<?php

$Pregunta1 = $_POST['pregunta1'];
$Pregunta2 = $_POST['pregunta2'];
$Pregunta3 = $_POST['pregunta3'];
$Pregunta4 = $_POST['pregunta4'];
$Pregunta5 = $_POST['pregunta5'];
$Pregunta6 = $_POST['pregunta6'];
$Pregunta7 = $_POST['pregunta7'];
$total= ($Pregunta1 + $Pregunta2 + $Pregunta3 + $Pregunta4 + $Pregunta5 + $Pregunta6 + $Pregunta7)/7;
$datos= array(
"nocontrol" => $_POST['nocontrolA'],
"fechaI" => $_POST['fechaIA'],
"fechaT" => $_POST['fechaTA'],
"sumaPreguntas" => $total,
"bimestre" => $_POST['bimestre']
);
include "../../../clases/alumno.php";
$Alumnos= new Alumnos();

echo $Alumnos->registrasFechasITB($datos);

?>