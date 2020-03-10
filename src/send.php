<?php

$userName = $_POST['user_name'];
$userPhone = $_POST['user_phone'];
$userEmail = $_POST['user_email'];
$userQuestion = $_POST['user_question'];


// Load Composer's autoloader
require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->CharSet = 'utf-8';

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'semenovaleksandr407@gmail.com';                     // SMTP username
    $mail->Password   = '242175rko';                               // SMTP password
    $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 465;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('semenovaleksandr407@gmail.com', 'Repair Design Project');
    $mail->addAddress('sniper.semenov@ukr.net', 'Joe User');     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Новая заявка с сайта - "Турецкий ремонт в Ростове-на-Дону"';
    $mail->Body    = '
        Имя: ' . $userName . '<br> 
        Телефон: ' . $userPhone . '<br> 
        Email: ' . $userEmail . '<br> 
        Вопрос: ' . $userQuestion . '
    ';

    if ($mail->send()) {
        echo "ok";
    } else {
        echo "Письмо не отправлено. Код ошибки: {$mail->ErrorInfo}";
    }
    
    //header('Location: thanks.html');
} catch (Exception $e) {
    echo "Письмо не отправлено. Код ошибки: {$mail->ErrorInfo}";
}