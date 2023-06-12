<?php
$datos= array(
    'idDependencia' => $_POST['idDependencia']
        );
        include "../../../clases/dependencias.php";
        $Dependencias= new Dependencias();
        echo $Dependencias->eliminarDependencia($datos);

?>