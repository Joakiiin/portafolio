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

    // Obtener las fechas de inicio y término
    $fechasI = $mostrar['fechasI'];
    $fechasT = $mostrar['fechasT'];
    $fechasterminoB1 = $mostrar['fechasterminoB1'];
    $fechasterminoB2 = $mostrar['fechasterminoB2'];

    // Calcular las fechas límite para enviar los recordatorios
    $limiteFechasI = date('Y-m-d', strtotime('-2 months -5 days', strtotime($fechasI)));
    $limiteFechasterminoB1 = date('Y-m-d', strtotime('-2 months -5 days', strtotime($fechasterminoB1)));
    $limiteFechasterminoB2 = date('Y-m-d', strtotime('-2 months -5 days', strtotime($fechasterminoB2)));

    // Obtener la fecha actual
    $fechaActual = date('Y-m-d');

    // Verificar si se debe enviar un recordatorio
    if ($fechaActual >= $limiteFechasI || $fechaActual >= $limiteFechasterminoB1 || $fechaActual >= $limiteFechasterminoB2) {
        // Instanciar un objeto PHPMailer
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
