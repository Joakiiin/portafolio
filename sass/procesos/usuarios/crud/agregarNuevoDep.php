<?php

    $file = $_FILES['file'];
    
$datos= array(
"cp" => $_POST['cp'],
"estado" => $_POST['estado'],
"ciudad" => $_POST['ciudad'],
"municipio" => $_POST['municipio'],
"colonia" => $_POST['colonia'],
"calle" => $_POST['calle'],
"idDep" => $_POST['idDep'],
"passw" => $_POST['passw'],
"nombreD" => $_POST['nombreD'],
"titularD" => $_POST['titularD'],
"puesto" => $_POST['puesto'],
"error" => $file['error'],
"nombre_archivo" => $file['name'],
"tipo" => $file['type'],
"tamaño" => $file['size'],
"ruta_temporal" => $file['tmp_name']
);
include "../../../clases/dependencias.php";
$Dependencias= new Dependencias();

echo $Dependencias->agregarNuevoDep($datos);

?>