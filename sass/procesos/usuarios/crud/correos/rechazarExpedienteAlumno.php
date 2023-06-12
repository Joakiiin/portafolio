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
    $mail->Subject = 'Expediente Rechazado';
    $mail->Body = 'Estimado/a alumno/a,

    Lamentamos informarte que tu expediente no ha sido aprobado para la subida de reportes en la plataforma en esta ocasión. Si tienes alguna pregunta o deseas más información sobre los motivos detrás de esta decisión, te invitamos a contactarnos para brindarte mayor claridad.
    
    Agradecemos tu interés y disposición para participar en el proceso de reportes.
    
    Atentamente,
    
    Departamento de Gestión Tecnológica y Vinculación';

    // Enviar el correo electrónico
    $mail->send();
    echo 'Tu expediente fue rechazado.';
} catch (Exception $e) {
    echo 'Error al enviar el correo electrónico: ' . $mail->ErrorInfo;
}
?>
