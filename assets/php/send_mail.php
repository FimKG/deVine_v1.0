
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'template_email.php';

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
// if (isset($_POST['filedamage']))
//     $filedamage = $_POST['filedamage'];
// if (isset($_POST['filecar']))
//     $filecar = $_POST['filecar'];
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
    echo "Name cannot be empty.";
}
if ($email === '') {
    echo "Email cannot be empty.";
} else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Email format invalid.";
    }
}
if ($phone === '') {
    echo "Phone cannot be empty.";
}
if ($subject === '') {
    echo "Subject cannot be empty.";
}

// CAR DETAILS
if ($model === '') {
    echo "Car Make/Model cannot be empty.";
}
if ($regNo === '') {
    echo "Vehicle Registration cannot be empty.";
}
if ($year === '') {
    echo "Year cannot be empty.";
}

// File validation UPLOAD PHOTOS
 if(!empty($_FILES["files"]["name"])){
    // File path config
    $targetDir = "uploads/";
    $fileName = basename($_FILES["files"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    
    // Allow certain file formats
    $allowTypes = array('jpg', 'png', 'jpeg');
    if(in_array($fileType, $allowTypes)){
        // Upload file to the server
        if(move_uploaded_file($_FILES["files"]["tmp_name"], $targetFilePath)){
            $uploaded_photos = $targetFilePath;
        }else{
            $uploadStatus = 0;
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $uploadStatus = 0;
        $statusMsg = 'Sorry, only PDF, DOC, JPG, JPEG, & PNG files are allowed to upload.';
    }
}
// if ($filecar === '') {
//     echo "filecar cannot be empty.";
// }
// if ($filedamage === '') {
//     echo "filedamage cannot be empty.";
// }
if ($message === '') {
    echo "Message cannot be empty.";
}

$uploaded_photos = $model .' and ' .$regNo . 'Images not found request via email';
// $content = "From: $name \n Email: $email \n 
// Phone: $phone \n Model: $model \n Vehicle Registration: $regNo \n 
// Year: $year \n Entire Car: $filecar \n Damaged: $filedamage \n 
// Message: $message";

// $content = "From: $name \n Email: $email \n 
// Phone: $phone \n Model: $model \n Vehicle Registration: $regNo \n 
// Year: $year \n Message: $message";

require_once "PHPMailer/PHPMailer.php";
require_once "PHPMailer/SMTP.php";
require_once "PHPMailer/Exception.php";


$mail = new PHPMailer(true);
try {
    // ============

    // $mail->SMTPDebug = 2; // Enable verbose debug output
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
    //Recipients
    // $mail->setFrom('info@mail', 'OT HUB');
    //$mail->addAddress('mail', 'Joe User');     // Add a recipient
    // $mail->addAddress('mail'); // Name is optional
    $mail->addReplyTo( $email, $name );
    // $mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');
    // ====== Attachments ======
    //
    // $mail->addAttachment('docs/'.$uploaded_photos);         // Add attachments

    // ====== Content ======
    $mail->isHTML(true);
    $mail->setFrom("noreply@dvtech.co.za");
    $mail->addAddress("kgaugelob82@gmail.com");
    $mail->Subject = ("$email($subject)");
    $mail->Body = renderMessage ($email, $message, $phone, $name, $model, $regNo, $year, $subject);
    // ============
    // $content = "From: $name \n Email: $email \n 
    // Phone: $phone \n Model: $model \n Vehicle Registration: $regNo \n 
    // Year: $year \n Entire Car: $filecar \n Damaged: $filedamage \n 
    // Message: $message";
    
    
    $mail->send();

    echo "Email sent!";

    // $recipient = "noreply@dvtech.co.za";
    // $mailheader = "From: $email \r\n";
    // mail($recipient, $subject, $content, $mailheader) or die("Error!");
    // echo "Email sent!";
    
} catch (Exception $e) {
    // echo "Email Failed! ======" . $mail->ErrorInfo . "\r\n";
    // $error =''; 
    $error = '<div id="success" class="alert alert-danger">Message 
    could not be sent. Mailer Error: ' . $mail->ErrorInfo . '</div>';

    echo !extension_loaded('openssl') ? "Not Available" : "Available";
}
//echo json_encode(array('feedback'=>$feedback))

?>

