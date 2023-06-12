<?php
$datos= array(
    'idPS' => $_POST['idPSU'],
    'idPrograma1' => $_POST['idproS_U']
        );
        include "../../../clases/programas_S.php";
        $ProgramasS= new ProgramasS();
        echo $ProgramasS->actualizarProgramaS($datos);

?>