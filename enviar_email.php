<?php
    
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
	
	$nome = $_POST['nome'];
	$email = $_POST['email'];
    $mensagem = $_POST['mensagem'];

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 2;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.mailtrap.io';  // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = '5efbd653bcfb9b';                     // SMTP username
    $mail->Password   = 'ad759c7af9f4cd';                               // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('code4suzano@gmail.com', 'Mailer');
    $mail->addAddress($email, $nome);     // Add a recipient 
    // $mail->addReplyTo('alvesfernandosantos1@gmail.com', 'Information');
    // $mail->addCC('cc@example.com');
    // $mail->addBCC('bcc@example.com');


    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Sugestão Code4Suzano';
    $mail->Body    = "<h2> $mensagem</h2>";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    
    echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Email enviado com sucesso, Obrigado por entrar em contato.')
    window.location.href='index.php';
    </SCRIPT>");

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>