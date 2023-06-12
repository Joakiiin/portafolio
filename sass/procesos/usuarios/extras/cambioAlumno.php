<?php

    include "../../../clases/alumno.php";
    $Alumnos = new Alumnos();
    $NoControl = $_POST['NoControl'];
    $estatus= $_POST['estatus'];
    echo $Alumnos->cambioAlumno($NoControl, $estatus);

?>