<?php
$datos= array(
    'NoControl1' => $_POST['NoControl1']
        );
        include "../../../clases/programas_S.php";
        $ProgramasS= new ProgramasS();
        echo $ProgramasS->eliminarSeleccion($datos);

?>