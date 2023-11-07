<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';
    require 'phpmailer/src/SMTP.php';

    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';
    $mail->setLanguage('en', 'phpmailer/language/');
    $mail->IsHTML(true);

    $mail->isSMTP();//Send using SMTP
    $mail->Host = 'smtp.gmail.com';//Send the SMTP server to send throuth
    $mail->SMTPAuth = true;//Enable SMTP authentification
    $mail->Username = 'naprikladse9@gmail.com';//SMTP username (email)
    $mail->Password = 'Neskashu@nap';//SMTP password (email password)
    $mail->Port = '587';
    $mail->SMTPSecure = 'TLS';

    //From SMTP username (email)
    $mail->setFrom('naprikladse9@gmail.com', 'Code Test');
    //To...
    $mail->addAddress('w27ksyu@gmail.com');
    //Subject
    $mail->Subject = 'E-mail from test';
    //Body
    $body = '<h1>Hi! It`s Test!</h1>';

    if(!empty($_POST['name'])) {
        $body .= "<p>Name: <strong>".$_POST['name']."</strong></p>" 
    }
    if(!empty($_POST['email'])) {
        $body .= "<p>E-mail: <strong>".$_POST['email']."</strong></p>" 
    }
    if(!empty($_POST['message'])) {
        $body .= "<p>Message: <strong>".$_POST['message']."</strong></p>" 
    }
    if(!empty($_POST['like'])) {
        $body .= "<p>Do you like Test? <strong>".$_POST['like']."</strong></p>" 
    }
    if(!empty($_POST['thebest'])) {
        $body .= "<strong><a href='https://www.youtube.com/@codeonly'>Test</a> the best channel in the world</strong>" 
    }

    //Add file
    if(trim(!empty($_FILES['image']['tmp_name']))) {
        $_fileTmpName = $_FILES['image']['tmp_name'];
        $_fileName = $_FILES['image']['name'];
        $mail->addAttachment($_fileTmpName, $_fileName);
    }

    $mail->Body = $body;

    //Sending
    $mail->send();
    $mail->smtpClose();
?>

