<?php 
require_once 'connect.php';
session_start();
$id = $_GET['id'];
$_SESSION['work'][]= $id;
$sql = mysqli_query($connect, "SELECT * FROM `shapes` WHERE `id` = $id ");
while($result = mysqli_fetch_assoc($sql)){    
    $_SESSION['work_img'][] = "../".$result['student_file'];
}
header('Location: ../cataloge.php');