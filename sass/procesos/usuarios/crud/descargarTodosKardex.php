<?php
include "../../../clases/Conexion.php";

$conexion = new Conexion();
$enlace = $conexion->conectar();

$sql = "SELECT NoControlKardex FROM kardex";
$resultado = mysqli_query($enlace, $sql);

// Crear un objeto ZipArchive
$zip = new ZipArchive();

// Definir el nombre del archivo ZIP a crear
$archivoZip = 'kardex.zip';
// Abrir el archivo ZIP para escritura
if ($zip->open($archivoZip, ZipArchive::CREATE) === TRUE) {

    while ($fila = mysqli_fetch_assoc($resultado)) {
        $noControl = $fila["NoControlKardex"];

        // Ruta de la carpeta a comprimir
        $carpeta = $noControl;
        $sql_periodo= "SELECT pa.Year, pe.Clave FROM periodoasignado AS pa
        INNER JOIN alumno AS al ON al.NoControl = pa.NoControlP
        INNER JOIN periodo AS pe ON pe.idPeriodo = pa.idPeriodo1
        WHERE al.NoControl = $carpeta";
        $query_periodo= mysqli_query($enlace, $sql_periodo);
        $row_periodo = mysqli_fetch_assoc($query_periodo);
        $periodo = $row_periodo['Clave'];
        $year = $row_periodo['Year'];
        $ruta= 'files/'.$year.'_'.$periodo.'/'.$carpeta.'/KARDEX/';
        $zip->addEmptyDir($year.'_'.$periodo.'/'.$noControl.'/KARDEX/');
        // Añadir los archivos de la carpeta al archivo ZIP
        $dir = opendir($ruta);
        while ($archivo = readdir($dir)) {
            if ($archivo != '.' && $archivo != '..') {
                $zip->addFile($ruta . '/' . $archivo, $year.'_'.$periodo.'/' .$carpeta . '/KARDEX/' . $archivo);
            }
        }
        closedir($dir);
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
