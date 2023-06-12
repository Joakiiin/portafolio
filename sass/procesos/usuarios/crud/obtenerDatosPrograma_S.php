<?php
$idPS= $_POST['idPS'];
include "../../../clases/programas_S.php";
$ProgramasS= new ProgramasS();
echo json_encode($ProgramasS->obtenerDatosProgramaS($idPS));


?>
