<?php
include_once __DIR__ . '/../includes/AutoLoader.php';
$mail = new \vendor\phpmailer\phpmailer\src\PHPMailer(true);

try {
    // Server settings
    //$mail->SMTPDebug = \vendor\phpmailer\phpmailer\src\SMTP::DEBUG_SERVER; // for detailed debug output
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = \vendor\phpmailer\phpmailer\src\PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->Username = 'leonardo.brunetti24@gmail.com'; // YOUR gmail email
    $mail->Password = 'N#a#t#y69_L@e@o01'; // YOUR gmail password

    // Sender and recipient settings
    $mail->setFrom('leonardo.brunetti24@gmail.com', 'Apollo Undici');
    $mail->addAddress('leonardo.brunetti24@gmail.com', 'leonardo');

    // Setting the email content
    $mail->IsHTML(true);
    $mail->Subject = "Socio Apollo Undici ";
    $mail->Body = '<p>La tua richiesta è stata accettata. Ritira in sede Apollo Undici (via bixio) la tua tessera per il costo di 6 euro. </br> Clicca su questo link per creare un profilo e prenotare ai nostri eventi. <a href=""> link> </a></p>';
    $mail->AltBody = 'Plain text message body for non-HTML email client. Gmail SMTP email body.';

    $mail->send();

    $myJSON = json_encode(true);
        
} catch (\vendor\phpmailer\phpmailer\src\Exception $e) {
    echo $mail->ErrorInfo;
}
?>