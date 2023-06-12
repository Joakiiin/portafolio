<?php

    $file = $_FILES['file'];
    
$datos= array(
"nocontrol" => $_POST['nocontrol'],
"pass" => $_POST['pass'],
"paterno" => $_POST['paterno'],
"materno" => $_POST['materno'],
"nombre" => $_POST['nombre'],
"sexo" => $_POST['sexo'],
"telefono" => $_POST['telefono'],
"correo" => $_POST['correo'], 
"creditos" => $_POST['creditos'],
"idperiodo" => $_POST['periodo'],
"year" => $_POST['fecha'],
"carrera" => $_POST['carrera'],
"semestre" => $_POST['semestre'],
"edad" => $_POST['edad'],
"error" => $file['error'],
"nombre_archivo" => $file['name'],
"tipo" => $file['type'],
"tamaño" => $file['size'],
"ruta_temporal" => $file['tmp_name']
);
include "../../../clases/alumno.php";
$Alumnos= new Alumnos();

echo $Alumnos->agregarNuevoAlumno($datos);

?>