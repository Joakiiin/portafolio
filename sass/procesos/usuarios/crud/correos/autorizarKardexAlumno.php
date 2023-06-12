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
    $mail->Subject = 'Kardex Autorizado';
    $mail->Body = 'Estimado/a alumno/a,

    Nos complace informarte que estás autorizado/a para continuar tu proceso de registro en la plataforma de servicio social. Por favor, accede a la plataforma y completa los pasos necesarios para completar tu inscripción.
    
    Si tienes alguna pregunta o necesitas ayuda, no dudes en contactarnos.
    
    Atentamente,
    
    Departamento de Gestión Tecnológica y Vinculación';

    // Enviar el correo electrónico
    $mail->send();
    echo 'Tu Kardex fue aprobado.';
} catch (Exception $e) {
    echo 'Error al enviar el correo electrónico: ' . $mail->ErrorInfo;
}
?>
