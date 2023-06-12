<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // incluir la librería PHPMailer

// Instanciar un objeto PHPMailer
$mail = new PHPMailer(true); 
$correo= $_GET['Correo'];
$bimestre= $_GET['bimestre'];
try {
    // Configurar el servidor SMTP
    $mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->Host = 'smtp.office365.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'joakiiin-14@live.com.mx';
    $mail->Password = '5526653535telcel';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Configurar el mensaje
    $mail->setFrom('joakiiin-14@live.com.mx', 'Joaquin');
    $mail->addAddress($correo);
    $mail->Subject = 'Evaluaciones Rechazadas';
    $mail->Body = 'Tus evaluaciones del bimestre '.$bimestre.' fueron erroneas, favor de corregirlas y subirlas nuevamente.';

    // Enviar el correo electrónico
    $mail->send();
    echo 'Tus evaluaciones fueron correctas.';
} catch (Exception $e) {
    echo 'Error al enviar el correo electrónico: ' . $mail->ErrorInfo;
}
?>