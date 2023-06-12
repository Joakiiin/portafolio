<?php
$idPrograma= $_POST['idPrograma'];
include "../../../clases/programas.php";
$Programas= new Programas();
echo json_encode($Programas->obtenerDatosPrograma($idPrograma));


?>
