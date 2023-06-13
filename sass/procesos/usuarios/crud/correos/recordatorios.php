<?php
include "../../../../../clases/Conexion.php";
$con = new Conexion();
$conexion = $con->conectar();
$sql = "SELECT al.Correo, 
fin.fechasI, fin.fechasT,
fin.fechasinicioB1, fin.fechasterminoB1, 
fin.fechasinicioB2, fin.fechasterminoB2, 
fin.fechasinicioB3, fin.fechasterminoB3
FROM alumno AS al
INNER JOIN fechainiciotermino AS fin ON fin.NoControlIT = al.NoControl";
$respuesta = mysqli_query($conexion, $sql);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // incluir la librería PHPMailer

while ($mostrar = mysqli_fetch_array($respuesta)) {
    $correo = $mostrar['Correo'];
    $fechasI = $mostrar['fechasI'];
    $fechasT = $mostrar['fechasT'];
    
    // Obtener la fecha actual
    $fechaActual = date('d/m/Y');
    
    // Convertir las fechas al formato Y-m-d para realizar las comparaciones
    $fechasI = date_create_from_format('d/m/Y', $fechasI)->format('Y-m-d');
    $fechasT = date_create_from_format('d/m/Y', $fechasT)->format('Y-m-d');
    
    // Verificar si la fecha actual está dentro del rango de 5 días antes de fechasI y fechasT
    if (strtotime($fechasI) - strtotime($fechaActual) <= 5 * 24 * 60 * 60 ||
        strtotime($fechasT) - strtotime($fechaActual) <= 5 * 24 * 60 * 60) {
        
        $mail = new PHPMailer(true);

        try {
            // Configurar el servidor SMTP
            $mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->Host = 'smtp.office365.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'CORREO';
            $mail->Password = 'CONTRASEÑA';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Configurar el mensaje
            $mail->setFrom('CORREO', 'REMITENTE');
            $mail->addAddress($correo);
            $mail->Subject = 'Fecha de evaluaciones';
            $mail->Body = 'A partir de ahora tienes 5 días hábiles para realizar tus evaluaciones';

            // Enviar el correo electrónico
            $mail->send();
            echo 'Se envió un recordatorio a ' . $correo . '<br>';
        } catch (Exception $e) {
            echo 'Error al enviar el correo electrónico: .' . $mail->ErrorInfo;
        }
    }
}
?>
