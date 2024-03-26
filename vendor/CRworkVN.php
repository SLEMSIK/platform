<?php
session_start();
$zip = new ZipArchive;
require_once 'connect.php';
$date = date("m.d.y");
$time = date("H.i.s");

if ($zip->open("../uploads/zip/$date-$time.zip", ZipArchive::CREATE) === TRUE)
{
    for($i = 0; $i < count($_SESSION['work']); $i++){
        $model = $_SESSION['work'][$i]; 

        $result_model = mysqli_query($connect, "SELECT * FROM `blueprint` WHERE `id` = '$model'");
        $res1 = mysqli_fetch_assoc($result_model);
        $file = "../".$res1['image-student'];
        $zip->addFromString(basename($file),  file_get_contents($file));
    }
    $zip->close();
}
unset($_SESSION['work']);
header("Location: ../uploads/zip/$date-$time.zip");