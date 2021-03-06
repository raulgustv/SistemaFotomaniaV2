<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../PHP-Mailer/src/Exception.php';
require '../PHP-Mailer/src/PHPMailer.php';
require '../PHP-Mailer/src/SMTP.php';

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
        $mail->setFrom('fotomaniafidcr@gmail.com', 'FotomaniaCR');
        $mail->addAddress($correo);               // Name is optional
        $mail->addReplyTo('fotomaniafidcr@gmail.com', 'Information');
    
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