<?php
$datos= array(
    'NoControl' => $_POST['NoControl']
        );
        include "../../../clases/alumno.php";
        $Alumnos= new Alumnos();
        echo $Alumnos->eliminarAlumno($datos);

?>