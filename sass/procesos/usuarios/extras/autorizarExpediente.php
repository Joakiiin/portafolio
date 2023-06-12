<?php

    include "../../../clases/alumno.php";
    $Alumnos = new Alumnos();
    $NoControl = $_POST['NoControl'];
    $idRolFK= $_POST['idRolFK'];
    echo $Alumnos->autorizarExpediente($NoControl, $idRolFK);

?>