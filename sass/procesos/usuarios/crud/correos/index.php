<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // incluir la librería PHPMailer

// Instanciar un objeto PHPMailer
$mail = new PHPMailer(true); 

try {
    // Configurar el servidor SMTP
    $mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'joakiiin96@gmail.com';
    $mail->Password = 'whpnjetnftrbilav';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Configurar el mensaje
    $mail->setFrom('joakiiin96@gmail.com', 'Joaquín');
    $mail->addAddress('galindotrejojoaquin@gmail.com');
    $mail->Subject = 'Asunto del correo electrónico';
    $mail->Body = 'Contenido del correo electrónico';

    // Enviar el correo electrónico
    $mail->send();
    echo 'El correo electrónico ha sido enviado.';
} catch (Exception $e) {
    echo 'Error al enviar el correo electrónico: ' . $mail->ErrorInfo;
}

?>
