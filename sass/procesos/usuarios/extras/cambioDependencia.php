<?php

    include "../../../clases/dependencias.php";
    $Dependencias = new Dependencias();
    $idDependencia = $_POST['idDependencia'];
    $estatus= $_POST['estatus'];
    echo $Dependencias->cambioDependencia($idDependencia, $estatus);

?>