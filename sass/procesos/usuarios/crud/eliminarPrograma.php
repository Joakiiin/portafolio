<?php
$datos= array(
    'idPrograma' => $_POST['idPrograma']
        );
        include "../../../clases/programas.php";
        $Programas= new Programas();

echo $Programas->eliminarPrograma($datos);

?>