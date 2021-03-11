
<?php

$filedamage = '';
$filecar = '';


if (isset($_FILES['filedamage']))
    $filedamage = $_FILES['filedamage'];
if (isset($_FILES['filecar']))
    $filecar = $_FILES['filecar'];
    print_r('Files' . $filecar);


    // // ====== Attachments ======
    foreach ($filedamage as $key) 
        print_r ('File Name: ' . $key['name']);
        print_r ('File Type: ' . $key['type']);
        print_r ('File Size: ' . $key['size']);
        // echo "{$key} => {$error}";
    
    // foreach ($filecar["name"] as $key => $error) {
    //     echo "{$key} => {$error}";
    // }
