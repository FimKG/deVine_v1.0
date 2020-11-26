
<?php

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
if (isset($_POST['filedamage']))
    $filedamage = $_POST['filedamage'];
if (isset($_POST['filecar']))
    $filecar = $_POST['filecar'];
if (isset($_POST['message']))
    $message = $_POST['message'];
if (isset($_POST['subject']))
    $subject = $_POST['subject'];

// CONTACT DETAILS
if ($name === '') {
    echo "Name cannot be empty.";
    die();
}
if ($email === '') {
    echo "Email cannot be empty.";
    die();
} else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Email format invalid.";
        die();
    }
}

if ($phone == '') {
    echo "Phone cannot be empty.";
    die();
} else {
    if (!filter_var($phone, FILTER_VALIDATE_INT)) {
        echo "Enter 10 numbers.";
        die();
    }
}
if ($subject === '') {
    echo "Subject cannot be empty.";
    die();
}

// CAR DETAILS

if ($model == '') {
    echo "Car Make/Model cannot be empty.";
    die();
}
if ($regNo == '') {
    echo "Vehicle Registration cannot be empty.";
    die();
}
if ($year == '') {
    echo "Year cannot be empty.";
    die();
} else {
    if (is_numeric($year)) {
        echo "Enter 4 numbers.";
        die();
    }
}

// File validation UPLOAD PHOTOS

if ($_FILES["filecar"]["name"]) {
    $filename = $_FILES["filecar"]["name"];
    $source = $_FILES["filecar"]["tmp_name"];
    $type = $_FILES["filecar"]["type"];

    $name = explode(".", $filename);
    $accepted_types = array('application/zip', 'application/x-zip-compressed', 'multipart/x-zip', 'application/x-compressed');
    foreach ($accepted_types as $mime_type) {
        if ($mime_type == $type) {
            $okay = true;
            break;
        }
    }

    $continue = strtolower($name[1]) == 'zip' ? true : false;
    if (!$continue) {
        $status = "The file you are trying to upload is not a .zip file. Please try again.";
    }

    $target_path = "/home/var/yoursite/httpdocs/" . $filename;  // change this to the correct site path
    if (move_uploaded_file($source, $target_path)) {
        $zip = new ZipArchive();
        $x = $zip->open($target_path);
        if ($x === true) {
            $zip->extractTo("/home/var/yoursite/httpdocs/"); // change this to the correct site path
            $zip->close();

            unlink($target_path);
        }
        $status = "Your .zip file was uploaded and unpacked.";
    } else {
        $status = "There was a problem with the upload. Please try again.";
    }
}
// 
if ($_FILES["filedamage"]["name"]) {
    $filename = $_FILES["filedamage"]["name"];
    $source = $_FILES["filedamage"]["tmp_name"];
    $type = $_FILES["filedamage"]["type"];

    $name = explode(".", $filename);
    $accepted_types = array('application/zip', 'application/x-zip-compressed', 'multipart/x-zip', 'application/x-compressed');
    foreach ($accepted_types as $mime_type) {
        if ($mime_type == $type) {
            $okay = true;
            break;
        }
    }

    $continue = strtolower($name[1]) == 'zip' ? true : false;
    if (!$continue) {
        $status = "The file you are trying to upload is not a .zip file. Please try again.";
    }

    $target_path = "/home/var/yoursite/httpdocs/" . $filename;  // change this to the correct site path
    if (move_uploaded_file($source, $target_path)) {
        $zip = new ZipArchive();
        $x = $zip->open($target_path);
        if ($x === true) {
            $zip->extractTo("/home/var/yoursite/httpdocs/"); // change this to the correct site path
            $zip->close();

            unlink($target_path);
        }
        $status = "Your .zip file was uploaded and unpacked.";
    } else {
        $status = "There was a problem with the upload. Please try again.";
    }
}

if ($message === '') {
    echo "Message cannot be empty.";
    die();
}



$content = "From: $name \n Email: $email \n 
Phone: $phone \n Model: $model \n Vehicle Registration: $regNo \n 
Year: $year \n Entire Car: $filecar \n Damaged: $filedamage \n 
Message: $message";
$recipient = "kgaugelob82@gmail.com";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $content, $mailheader) or die("Error!");
echo "Email sent!";
?>