<?php
include "../../../clases/Conexion.php";
$con= new Conexion();
$conexion= $con->conectar();
$NoControl = $_GET['NoControl'];
$sql1= "SELECT NoControlFi FROM archivos WHERE NoControlFi = $NoControl";
$respuesta1= mysqli_query($conexion, $sql1);
if (mysqli_num_rows($respuesta1) > 0) {
    $sql2 = "SELECT NoControlFi FROM archivos";
    $respuesta2 = mysqli_query($conexion, $sql2);
    $carpeta = $NoControl;
    $sql_periodo= "SELECT pa.Year, pe.Clave FROM periodoasignado AS pa
        INNER JOIN alumno AS al ON al.NoControl = pa.NoControlP
        INNER JOIN periodo AS pe ON pe.idPeriodo = pa.idPeriodo1
        WHERE al.NoControl = $carpeta";
        $query_periodo= mysqli_query($conexion, $sql_periodo);
        $row_periodo = mysqli_fetch_assoc($query_periodo);
        $periodo = $row_periodo['Clave'];
        $year = $row_periodo['Year'];
        $ruta= 'files/'.$year.'_'.$periodo.'/'.$carpeta.'/Expediente';

    // Comprimir el directorio en un archivo ZIP
    $zip = new ZipArchive();
    $archivoZip = $ruta . $carpeta . '.zip';

    if ($zip->open($archivoZip, ZipArchive::CREATE) === true) {
        // Función recursiva para agregar un directorio y su contenido al archivo ZIP
        function agregarDirectorio($dir, $zip, $rutaBase = '') {
            $archivos = glob($dir . '*');

            foreach ($archivos as $archivo) {
                if (is_dir($archivo)) {
                    $rutaRelativa = str_replace($rutaBase, '', $archivo . '/');
                    $zip->addEmptyDir($rutaRelativa);
                    agregarDirectorio($archivo . '/', $zip, $rutaBase);
                } else {
                    $rutaRelativa = str_replace($rutaBase, '', $archivo);
                    $zip->addFile($archivo, $rutaRelativa);
                }
            }
        }

        agregarDirectorio($ruta, $zip);
        $zip->close();

        // Descargar el archivo ZIP
        header('Content-Type: application/zip');
        header('Content-disposition: attachment; filename=' . basename($archivoZip));
        header('Content-Length: ' . filesize($archivoZip));
        readfile($archivoZip);

        // Eliminar el archivo ZIP
        unlink($archivoZip);

    } else {
        echo "No se pudo crear el archivo ZIP";
    }
} else {
        echo "No se ha subido el expediente para el número de control proporcionado";
    }


        ?>