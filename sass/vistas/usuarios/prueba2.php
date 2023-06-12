<?php
include "../../clases/Conexion.php";
$con = new Conexion();
    $conexion = $con->conectar();
    $query=  'SELECT usuario FROM tab_usuario';
    $result = mysqli_query($conexion, $query);

 while ($row = mysqli_fetch_array($result)) {
    $username = $row['usuario'];
$listar= null;
$ruta1= '../../procesos/usuarios/crud/files/'.$username.'/Primera Evaluacion';
$directorio= opendir($ruta1);
while ($elemento = readdir($directorio)) {
    if ($elemento != '.' && $elemento != '..'){
    if (is_dir("files".$elemento)) {
        $listar .= "<li><a href='files/$elemento' target='_blank'>$elemento</a></li>";
    }
    else {
        $listar .= "<li><a href='files/$elemento' target='_blank'>$elemento</a></li>";
    }
}
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Prueba de carpetas</h2>
    <ul>
<?php
    echo $listar
?>

    </ul>
</body>
</html>