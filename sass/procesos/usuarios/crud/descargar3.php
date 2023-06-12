<?php
include "../../../clases/Conexion.php";

$conexion = new Conexion();
$enlace = $conexion->conectar();

$sql = "SELECT NoControlFi FROM archivos";
$resultado = mysqli_query($enlace, $sql);
$periodo= $_POST['periodo1'];
$year= $_POST['year'];
// Crear un objeto ZipArchive
$zip = new ZipArchive();

// Definir el nombre del archivo ZIP a crear
$archivoZip = 'expedientes.zip';
// Abrir el archivo ZIP para escritura
if ($zip->open($archivoZip, ZipArchive::CREATE) === TRUE) {

    while ($fila = mysqli_fetch_assoc($resultado)) {
        $noControl = $fila["NoControlFi"];

        // Ruta de la carpeta a comprimir
        $carpeta = $noControl;
        $ruta= 'files/'.$year.'_'.$periodo.'/'.$carpeta.'/Expediente';
        // Añadir los archivos de la carpeta al archivo ZIP si la carpeta existe
        if (is_dir($ruta)) {
            $dir = opendir($ruta);
            while ($archivo = readdir($dir)) {
                if ($archivo != '.' && $archivo != '..') {
                    $zip->addFile($ruta . '/' . $archivo, $year.'_'.$periodo.'/' .$carpeta . '/Expediente/' . $archivo);
                }
            }
            closedir($dir);
        }
    }

    // Cerrar el archivo ZIP
    $zip->close();

    // Descargar el archivo ZIP resultante
    header('Content-Type: application/zip');
    header('Content-disposition: attachment; filename=' . $archivoZip);
    header('Content-Length: ' . filesize($archivoZip));
    readfile($archivoZip);

    // Eliminar el archivo ZIP
    unlink($archivoZip);

} else {
    echo 'Error al crear el archivo ZIP';
}

// Cerrar la conexión a la base de datos
mysqli_close($enlace); 

?>
