<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../../PHP-Mailer/src/Exception.php';
require '../../PHP-Mailer/src/PHPMailer.php';
require '../../PHP-Mailer/src/SMTP.php';

function emailreset($correo,$titulo,$cuerpo,$cuerposimple){


    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);
    
    try {
        //Server settings
        //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.sendgrid.net';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'apikey';                     // SMTP username
        $mail->Password   = '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';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
    
        //Recipients
        $mail->setFrom('fotomaniafid20@gmail.com', 'FotomaniaCR');
        $mail->addAddress($correo);               // Name is optional
        $mail->addReplyTo('fotomaniafid20@gmail.com', 'Information');
    
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $titulo;
        $mail->Body    = $cuerpo;
        $mail->AltBody = $cuerposimple;
    
        $mail->send();
        $estado='exito';
        return $estado;
    } catch (Exception $e) {
        $estado = 'fallo';
        return $estado;
        //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
     
        }
    
      

?>