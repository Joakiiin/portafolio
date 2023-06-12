<?php
    
$datos= array(
"idPrograma" => $_POST['idpro'],
"NombreP" => $_POST['namep'],
"Objetivo" => $_POST['obj'],
"idTipoAct" => $_POST['tip'],
"idModalidad" => $_POST['mod'],
"idDependencia" => $_POST['dep'],
);
include "../../../clases/programas.php";
$Programas= new Programas();

echo $Programas->agregarNuevoPrograma($datos);

?>