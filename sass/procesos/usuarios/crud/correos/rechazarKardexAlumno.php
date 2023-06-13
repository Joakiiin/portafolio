<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // incluir la librería PHPMailer

// Instanciar un objeto PHPMailer
$mail = new PHPMailer(true); 
$correo= $_GET['Correo'];
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
    $mail->CharSet = 'UTF-8';
    $mail->setFrom('CORREO', 'REMITENTE');
    $mail->addAddress($correo);
    $mail->Subject = 'Kardex Rechazado';
    $mail->Body = 'Estimado/a alumno/a,

    Lamentamos informarte que tu solicitud de registro en la plataforma de servicio social ha sido rechazada en esta ocasión. Si deseas más información o tienes alguna pregunta, por favor contáctanos.
    
    Atentamente,
    
    Departamento de Gestión Tecnológica y Vinculación';

    // Enviar el correo electrónico
    $mail->send();
    echo 'Tu Kardex fue rechazado.';
} catch (Exception $e) {
    echo 'Error al enviar el correo electrónico: ' . $mail->ErrorInfo;
}
?>
