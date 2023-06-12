<?php
$datos= array(
    'idPrograma' => $_POST['idproU'],
    'NombreP' => $_POST['namepU'],
    'Objetivo' => $_POST['objU'],
    'idTipoAct' => $_POST['tipU'],
    'idModalidad' => $_POST['modU'],
    'idDependencia' => $_POST['depU']
        );
        include "../../../clases/programas.php";
        $Programas= new Programas();
        echo $Programas->actualizarPrograma($datos);

?>