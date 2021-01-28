<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'template_email.php';

$status = '';
$name = '';
$email = '';
$phone = '';
$model = '';
$regNo = '';
$year = '';
$filedamage = '';
$filecar = '';
$message = '';
$subject = '';

if (isset($_POST['name']))
    $name = $_POST['name'];
if (isset($_POST['email']))
    $email = $_POST['email'];
if (isset($_POST['phone']))
    $phone = $_POST['phone'];
if (isset($_POST['model']))
    $model = $_POST['model'];
if (isset($_POST['regNo']))
    $regNo = $_POST['regNo'];
if (isset($_POST['year']))
    $year = $_POST['year'];
if (isset($_FILES['filedamage']))
    $filedamage = $_FILES['filedamage'];
if (isset($_FILES['filecar']))
    $filecar = $_FILES['filecar'];
if (isset($_POST['message']))
    $message = $_POST['message'];
if (isset($_POST['subject']))
    $subject = $_POST['subject'];

// CONTACT DETAILS
if ($name === '') {
    $status = "Name cannot be empty.";
}
if ($email === '') {
    $status = "Email cannot be empty.";
} else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $status = "Email format invalid.";
    }
}
if ($phone === '') {
    $status = "Phone cannot be empty.";
}
if ($subject === '') {
    $status = "Subject cannot be empty.";
}

// CAR DETAILS
if ($model === '') {
    $status = "Car Make/Model cannot be empty.";
}
if ($regNo === '') {
    $status = "Vehicle Registration cannot be empty.";
}
if ($year === '') {
    $status = "Year cannot be empty.";
}
if ($message === '') {
    $status = "Message cannot be empty.";
}

require_once "PHPMailer/PHPMailer.php";
require_once "PHPMailer/SMTP.php";
require_once "PHPMailer/Exception.php";


$mail = new PHPMailer(true);
try {
    $mail->SMTPDebug = 2; // Enable verbose debug output
    $mail->isSMTP();
    $mail->Host = "mail.dvtech.co.za";
    $mail->SMTPAuth = true;
    $mail->Username = "noreply@dvtech.co.za";
    $mail->Password = "Devauto@123";
    $mail->Port = 25;
    $mail->SMTPSecure = "tls";
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    // Recipients
    $mail->addReplyTo($email, $name);
    // File validation UPLOAD PHOTOS
    // ====== Attachments ======
    // $uploads_dir = '/uploads//';
    // foreach ($filedamage["error"] as $key => $error) {
    //     if ($error == UPLOAD_ERR_OK) {
    //         $tmp_name = $filedamage["tmp_name"][$key];
    //         $file_name = basename($filedamage["name"][$key]);
    //         $destination_path = getcwd() . DIRECTORY_SEPARATOR;
    //         $target_path = $destination_path . $uploads_dir . $file_name;

    //         move_uploaded_file($tmp_name, $target_path);
    //         $mail->addAttachment($target_path);
    //     }
    // }

    // foreach ($filecar["error"] as $key => $error) {
    //     if ($error == UPLOAD_ERR_OK) {
    //         $tmp_name = $filecar["tmp_name"][$key];
    //         $file_name = basename($filecar["name"][$key]);
    //         $destination_path = getcwd() . DIRECTORY_SEPARATOR;
    //         $target_path = $destination_path . $uploads_dir . $file_name;

    //         move_uploaded_file($tmp_name, $target_path);
    //         $mail->addAttachment($target_path);
    //     }
    // }
    foreach ($filedamage["name"] as $key => $error) {
        $mail->AddAttachment($filedamage["tmp_name"][$key], $filedamage["name"][$key]);
    }
    foreach ($filecar["name"] as $key => $error) {
        $mail->AddAttachment($filecar["tmp_name"][$key], $filecar["name"][$key]);
    }


    // ====== Content ======
    $mail->isHTML(true);
    $mail->setFrom("noreply@dvtech.co.za");
    // $mail->setFrom("Devine Auto <noreply@dvtech.co.za>");
    $mail->addAddress("molotoka@dvtech.co.za");
    // $mail->addAddress("mokoenal@dvtech.co.za");
    $mail->Subject = ("$email($subject)");
    $mail->Body = renderMessage($email, $message, $phone, $name, $model, $regNo, $year, $subject);

    //$mail->send();

    $status = "Email sent!";
    //     $status = "Email sent!";

} catch (Exception $e) {

    $error = 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
    $status = "Email Failed! ======" . $mail->ErrorInfo . "\r\n";

    echo !extension_loaded('openssl') ? "Not Available" : "Available";
}
