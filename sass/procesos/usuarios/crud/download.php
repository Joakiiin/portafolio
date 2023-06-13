<?php
// Establecer la conexión a la base de datos
$conn = mysqli_connect("localhost", "root", "Adm1n15tr4D0r11!", "sassf");
$periodo= $_GET['periodo2'];
$Year=$_GET['year'];
// Consulta SQL para obtener los datos
$query = "SELECT al.NoControl, al.Nombre, al.ApellidoP, al.ApellidoM, al.Telefono, 
al.edad, al.Creditos, 
CASE al.idRolFK 
        WHEN 4 THEN 'ACTIVO' 
        WHEN 5 THEN 'FINALIZADO' 
        ELSE 'OTRO' 
    END AS idRolFK,
al.Sexo, ca.Carrera, se.Semestre, d.NombreDep, d.TitularDep, 
d.puesto, d.correodep, p.NombreP, tp.Actividad, m.modalidad, 
pe.Periodo, pa.Year, 
dom.codigoP, dom.estado, dom.municipio, dom.colonia, dom.calleNo,
domd.codigoPDep, domd.estadoDep, domd.municipioDep, domd.coloniaDep, domd.calleNoDep,
fin.fechasI, fin.fechasT,
fin.fechasinicioB1, fin.fechasterminoB1, 
fin.fechasinicioB2, fin.fechasterminoB2, 
fin.fechasinicioB3, fin.fechasterminoB3,
rep.Nombre_Reporte, repcal.Calificacion1, repcal.Calificacion2, repcal.Calificacion3
FROM alumno AS al 
INNER JOIN carrera AS ca ON al.NoCarrera1 = ca.NoCarrera 
INNER JOIN programaseleccionado AS ps ON al.NoControl = ps.NoControl1 
INNER JOIN programa AS p ON p.idPrograma = ps.idPrograma1 
INNER JOIN dependencia AS d ON d.idDependencia =p.idDependencia1 
INNER JOIN modalidad AS m ON m.idModalidad = p.idModalidad1 
INNER JOIN tipoactividad AS tp ON tp.idTipoAct = p.idTipoAct1 
INNER JOIN semestre AS se ON se.NoSemestre = al.NoSemestre1 
INNER JOIN periodoasignado AS pa ON al.NoControl = pa.NoControlP 
INNER JOIN periodo AS pe ON pa.idPeriodo1 = pe.idPeriodo
INNER JOIN domiciliosdep AS domd ON domd.NoControlDomDep = d.idDependencia
INNER JOIN domicilios AS dom ON dom.NoControlDom = al.NoControl
INNER JOIN fechainiciotermino AS fin ON fin.NoControlIT = al.NoControl 
INNER JOIN reportes_calificacion AS repcal ON repcal.NoControlCalificacion = al.NoControl
INNER JOIN reportes AS rep ON rep.idReporte = repcal.idReporteCal
WHERE al.idRolFK = 5 AND pe.Clave = '$periodo' AND pa.Year = '$Year' ";
$result = mysqli_query($conn, $query);

// Crear un archivo temporal
$tempFile = tempnam(sys_get_temp_dir(), 'data');

// Abrir el archivo en modo de escritura
$file = fopen($tempFile, 'w');

// Escribir los encabezados de columna en el archivo CSV
$headers = array('NoControl', 'Nombre', 'ApellidoP', 'ApellidoM', 'Telefono', 
'edad', 'Creditos', 'Estatus', 'Sexo', 'Carrera', 'Semestre', 'NombreDep', 
'TitularDep', 'puesto', 'correodep', 'NombreP', 'Actividad', 'modalidad', 
'Periodo', 'Year', 'codigoPalumno', 'estadoalumno', 'municipioalumno', 
'coloniaalumno', 'calleNoalumno', 
'codigoPDep', 'estadoDep', 'municipioDep', 'coloniaDep', 'calleNoDep', 
'fechasI', 'fechasT', 'fechasinicioB1', 'fechasterminoB1', 'fechasinicioB2', 
'fechasterminoB2', 'fechasinicioB3', 'fechasterminoB3', 'Nombre_Reporte', 'Calificacion1', 'Calificacion2', 'Calificacion3');
fputcsv($file, $headers);

// Recorrer los resultados de la consulta y escribirlos en el archivo CSV
while ($row = mysqli_fetch_assoc($result)) {
    fputcsv($file, $row);
}

// Cerrar el archivo
fclose($file);

// Establecer las cabeceras para la descarga del archivo
header("Content-Type: text/csv");
header("Content-Disposition: attachment; filename=alumno.csv");

// Enviar el archivo al navegador
readfile($tempFile);

// Eliminar el archivo temporal
unlink($tempFile);
?>