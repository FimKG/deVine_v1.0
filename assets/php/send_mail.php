
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


    if ($filecar.files.length == 0) {
        echo "filecar cannot be empty.";
        die();
    }

    if ($filedamage.files.length == 0) {
       echo "filedamage cannot be empty.";
        die();
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