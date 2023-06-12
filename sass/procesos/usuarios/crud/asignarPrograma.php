<?php
    
$datos= array(
"idProgramaS" => $_POST['idproS'],
"NoControlS" => $_POST['nocontrolS']
);
include "../../../clases/programas.php";
$Programas= new Programas();

echo $Programas->asignarPrograma($datos);

?>