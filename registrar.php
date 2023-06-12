<?php
$nocontrol= $_POST["nocontrol"];
$password= $_POST["password"];
$app= $_POST["app"];
$apm= $_POST["apm"];
$nombres= $_POST["nombres"];
$tel= $_POST["tel"];
$sexo= $_POST["sexo"];
$carrera= $_POST["carrera"];
$semestre= $_POST["semestre"];
$email= $_POST["email"];
$creditos= $_POST["creditos"];
$edad= $_POST["edad"];
$year= $_POST["fecha"];
$idPeriodo= $_POST["periodo"];
$file = $_FILES['file'];
$error = $file['error'];
$nombre_archivo = $file['name'];
$tipo = $file['type'];
$tamaño = $file['size'];
$ruta_temporal = $file['tmp_name'];
$Carpeta= $_POST['nocontrol'];
include_once 'conexion/con_db.php';
$con= conexion();
$sql= "INSERT INTO alumno(NoControl, pass, ApellidoP, ApellidoM, Nombre, Telefono, 
Sexo, NoCarrera1, NoSemestre1, Correo, Creditos, edad, idRolFK) VALUES ($nocontrol,'$password',
'$app', '$apm', '$nombres', '$tel', '$sexo', $carrera, 
$semestre, '$email', '$creditos', '$edad', 2)";
$sql2= "INSERT INTO periodoasignado(idPeriodo1, NoControlP, Year)
VALUES($idPeriodo, $nocontrol, $year)";
$sql3= "INSERT INTO kardex(NoControlKardex)
VALUES($nocontrol)";
$query= mysqli_query($con, $sql);
$query2= mysqli_query($con, $sql2);
$query3= mysqli_query($con, $sql3);
$sql_periodo = "SELECT Clave FROM periodo WHERE idPeriodo = $idPeriodo";
$query_periodo = mysqli_query($con, $sql_periodo);
$row_periodo = mysqli_fetch_assoc($query_periodo);
$periodo = $row_periodo['Clave'];
$ruta= 'sass/procesos/usuarios/crud/files/'.$year.'_'.$periodo.'/'.$Carpeta.'/KARDEX/';
if ($query && $query2 && $query3) {
    if (!file_exists($ruta)) {
        mkdir($ruta, 0777, true);
    }
    if ($error>0) {
        echo "Error al cargar archivos";
    } else {
        $permitidos= array("image/jpg","image/png","application/pdf");
        $limite_kb= 500;
        if (in_array($tipo, $permitidos) && $tamaño <= $limite_kb * 1024) {
            $archivo= $ruta.$nombre_archivo;
            if (!file_exists($ruta)) {
                mkdir($ruta, 0777, true);
            }
            if (!file_exists($archivo)) {
                $resultado= @move_uploaded_file($ruta_temporal, $archivo);
                if ($resultado) {
                } else {
                    echo "Error al guardar archivo";
                } 
                
            }
            else {
                echo "Archivo ya existe";
            }
        } else {
            echo "Archivo no permitido o excede el tamaño";
        }
    }
header('refresh:0;url=registroUsuario.php?registrado');
}
else{
            header('refresh:0;url=registroUsuario.php?error');
        }
?>