<?php
    require_once 'connect.php';

    $email = $_POST['login'];
    $password = $_POST['password'];

    $check_user = mysqli_query($connect, "SELECT * FROM `Users` WHERE `email` = '$email' AND `password` = '$password'");
    if (mysqli_num_rows($check_user) > 0) {

        $user = mysqli_fetch_assoc($check_user);
        setcookie('user_id', $user['id'] , strtotime('+30 days'), '/');
        setcookie('user_name', $user['name'] , strtotime('+30 days'), '/');
        setcookie('user_email', $user['email'] , strtotime('+30 days'), '/');
        setcookie('user_limitations', $user['limitations'] , strtotime('+30 days'), '/');
        setcookie('user_uploaded_data', $user['uploaded_data'] , strtotime('+30 days'), '/');
        setcookie('user_data_downloads', $user['data_downloads'] , strtotime('+30 days'), '/');
        
        
        header('Location: ../');

    } else {
        header('Location: ../login.php');
    }

    
    ?>

    
