<?php
    $datos = array(
        "paterno" => $_POST['paterno'],
        "materno" => $_POST['materno'],
        "nombre" => $_POST['nombre'],
        "edad" => $_POST['edad'],
        "sexo" => $_POST['sexo'],
        "telefono" => $_POST['telefono'],
        "correo" => $_POST['correo'],
        "calle" => $_POST['calle'],
        "nExterior" => $_POST['nExterior'],
        "nInterior" => $_POST['nInterior'],
        "colonia" => $_POST['colonia'],
        "municipio" => $_POST['municipio'],
        "estado" => $_POST['estado'],
        "usuario" => $_POST['usuario'],
        "password" => sha1($_POST['password']),
        "idRol" => $_POST['idRol'],
        "idAlumno" => $_POST['idAlumno']
    );

    include "../../../clases/Usuarios.php";
    $Usuarios = new Usuarios();

    echo $Usuarios->agregarNuevoUsuario($datos);
?>