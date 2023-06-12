<?php
$idPrograma= $_POST['idPrograma'];
include "../../../clases/programasE.php";
$Programas= new ProgramasE();
echo json_encode($Programas->obtenerDatosProgramaE($idPrograma));


?>
