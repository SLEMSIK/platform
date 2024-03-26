<?php
session_start();
    $model_id = $_POST['model_id'];
    require_once 'connect.php';
    $check_user = mysqli_query($connect, "SELECT * FROM `blueprint` WHERE `id` = '$model_id'");
    if (mysqli_num_rows($check_user) > 0) {

        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['blueprint'] = [
            "3d_model" => $user['3d_model'],
        ];
        
        header('Location: ../search_model.php');
    }else{
        echo "Модель не найдена";
    }
?>