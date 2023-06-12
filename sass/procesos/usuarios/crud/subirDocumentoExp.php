<?php

    $file1 = $_FILES['file1'];
    $file2 = $_FILES['file2'];
    $file3 = $_FILES['file3'];
    $file4 = $_FILES['file4'];
    $file5 = $_FILES['file5'];
    
$datos= array(
"nocontrol" => $_POST['nocontrol'],
"error1" => $file1['error'],
"nombre_archivo1" => $file1['name'],
"tipo1" => $file1['type'],
"tamaño1" => $file1['size'],
"ruta_temporal1" => $file1['tmp_name'],


"error2" => $file2['error'],
"nombre_archivo2" => $file2['name'],
"tipo2" => $file2['type'],
"tamaño2" => $file2['size'],
"ruta_temporal2" => $file2['tmp_name'],

"error3" => $file3['error'],
"nombre_archivo3" => $file3['name'],
"tipo3" => $file3['type'],
"tamaño3" => $file3['size'],
"ruta_temporal3" => $file3['tmp_name'],

"error4" => $file4['error'],
"nombre_archivo4" => $file4['name'],
"tipo4" => $file4['type'],
"tamaño4" => $file4['size'],
"ruta_temporal4" => $file4['tmp_name'],

"error5" => $file5['error'],
"nombre_archivo5" => $file5['name'],
"tipo5" => $file5['type'],
"tamaño5" => $file5['size'],
"ruta_temporal5" => $file5['tmp_name']
);
include "../../../clases/alumno.php";
$Alumnos= new Alumnos();

echo $Alumnos->subirDocumentoExp($datos);

?>