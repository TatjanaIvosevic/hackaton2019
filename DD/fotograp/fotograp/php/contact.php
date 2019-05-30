<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once 'PHPMailer.php';
require_once 'Exception.php';
require_once 'SMTP.php';


$data = json_decode($_POST['data'],1);

foreach ($data as $key => $value) {
    if(empty($value)){
        exit('Molim Vas, ispunite sva polja');
    }
}

if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL)){
    exit('Email adresa koju ste uneli, je pogrešna');
}
// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                                       // Enable verbose debug output
    $mail->isSMTP();                                            // Set mailer to use SMTP
    $mail->Host       = 'smtp.gmail.com';                       // Specify main and backup SMTP servers
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'lukaphptesting@gmail.com';             // SMTP username
    $mail->Password   = 'undefined2019;';                       // SMTP password
    $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom($data['email'], $data['name'].' '.$data['surname']);
    $mail->addAddress('tatjana.ivosevic1@gmail.com');     // Add a recipient

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $data['subject'];
    $mail->Body    = $data['message'];

    $mail->send();
    echo 'Poruka je poslata!';
} catch (Exception $e) {
    echo "Došlo je do greške. Poruka nije poslata, pokušajte ponovo kasnije.";
}