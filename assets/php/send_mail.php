<?php
echo 'This is only a test for $_FILES uploaded images.'
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require 'template_email.php';

// if (isset($_POST['name']))
//     $name = $_POST['name'];
// if (isset($_POST['email']))
//     $email = $_POST['email'];
// if (isset($_POST['phone']))
//     $phone = $_POST['phone'];
// if (isset($_POST['model']))
//     $model = $_POST['model'];
// if (isset($_POST['regNo']))
//     $regNo = $_POST['regNo'];
// if (isset($_POST['year']))
//     $year = $_POST['year'];
// if (isset($_FILES['filedamage']))
//     $filedamage = $_FILES['filedamage'];
// if (isset($_FILES['filecar']))
//     $filecar = $_FILES['filecar'];
// if (isset($_POST['message']))
//     $message = $_POST['message'];
// if (isset($_POST['subject']))
//     $subject = $_POST['subject'];

// // CONTACT DETAILS
// if ($name === '') {
//     echo "Name cannot be empty.";
// }
// if ($email === '') {
//     echo "Email cannot be empty.";
// } else {
//     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//         echo "Email format invalid.";
//     }
// }
// if ($phone === '') {
//     echo "Phone cannot be empty.";
// }
// if ($subject === '') {
//     echo "Subject cannot be empty.";
// }

// // CAR DETAILS
// if ($model === '') {
//     echo "Car Make/Model cannot be empty.";
// }
// if ($regNo === '') {
//     echo "Vehicle Registration cannot be empty.";
// }
// if ($year === '') {
//     echo "Year cannot be empty.";
// }

// // File validation UPLOAD PHOTOS
// if (!empty($_FILES["files"]["name"])) {
//     $errors = array();
//     $uploaded_photos = $_FILES['image']['name'];
//     $file_size = $_FILES['image']['size'];
//     $file_tmp = $_FILES['image']['tmp_name'];
//     $file_type = $_FILES['image']['type'];
//     $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));

//     $expensions = array("jpeg", "jpg", "png", "pdf");

//     if (in_array($file_ext, $expensions) === false) {
//         $errors[] = "extension not allowed, please choose a PDF, JPEG or PNG file.";
//     }

//     if ($file_size > 4194304) {
//         $errors[] = 'File size must be excately 4 MB';
//     }

//     if (empty($errors) == true) {
//         move_uploaded_file($file_tmp, "uploads/" . $uploaded_photos); //The folder where you would like your file to be saved
//         echo "Success";
//     } else {
//         print_r($errors);
//     }
// }

// if ($message === '') {
//     echo "Message cannot be empty.";
// }

// $uploaded_photos = $model . ' and ' . $regNo . 'Images not found request via email';

// require_once "PHPMailer/PHPMailer.php";
// require_once "PHPMailer/SMTP.php";
// require_once "PHPMailer/Exception.php";


// $mail = new PHPMailer(true);
// try {
//     // $mail->SMTPDebug = 2; // Enable verbose debug output
//     $mail->isSMTP();
//     $mail->Host = "mail.dvtech.co.za";
//     $mail->SMTPAuth = true;
//     $mail->Username = "noreply@dvtech.co.za";
//     $mail->Password = "Devauto@123";
//     $mail->Port = 25;
//     $mail->SMTPSecure = "tls";
//     $mail->SMTPOptions = array(
//         'ssl' => array(
//             'verify_peer' => false,
//             'verify_peer_name' => false,
//             'allow_self_signed' => true
//         )
//     );
//     // Recipients
//     $mail->addReplyTo($email, $name);
//     // ====== Attachments ======
//     $mail->addAttachment('uploads/' . $uploaded_photos);         // Add attachments

//     // ====== Content ======
//     $mail->isHTML(true);
//     $mail->setFrom("noreply@dvtech.co.za");
//     // $mail->setFrom("Devine Auto <noreply@dvtech.co.za>");
//     $mail->addAddress("kgaugelob82@gmail.com");
//     $mail->Subject = ("$email($subject)");
//     $mail->Body = renderMessage($email, $message, $phone, $name, $model, $regNo, $year, $subject);

//     $mail->send();

//     echo "Email sent!";
//     $status = "Email sent!";

// } catch (Exception $e) {

//     $error = 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
//     $status = "Email Failed! ======" . $mail->ErrorInfo . "\r\n";

//     echo !extension_loaded('openssl') ? "Not Available" : "Available";
// }

?>

