<?php
include "../../../clases/dependencias.php";
$Dependencias= new Dependencias();
$datos= array(
    "passw" => $_POST['passwordDep'],
    "idDependencia" => $_POST['idDepReset']
);
echo $Dependencias->cambiarPassword($datos);
?>