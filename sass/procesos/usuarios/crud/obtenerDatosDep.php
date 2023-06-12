<?php
$idDependencia= $_POST['idDependencia'];
include "../../../clases/dependencias.php";
$Dependencias= new Dependencias();
echo json_encode($Dependencias->obtenerDatosDependencia($idDependencia));


?>
