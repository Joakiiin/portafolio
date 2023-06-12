<?php
$datos= array(
    'cp' => $_POST['cpU'],
    'estado' => $_POST['estadoU'],
    'ciudad' => $_POST['ciudadU'],
    'municipio' => $_POST['municipioU'],
    'colonia' => $_POST['coloniaU'],
    'calle' => $_POST['calleU'],

    'idDependencia' => $_POST['idDepU'],
    'NombreDep' => $_POST['nombreDU'],
    'TitularDep' => $_POST['titularDU'],
    'puesto' => $_POST['puestoU']
        );
        include "../../../clases/dependencias.php";
        $Dependencias= new Dependencias();
        echo $Dependencias->actualizarDep($datos);

?>