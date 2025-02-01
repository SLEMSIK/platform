<?php

require_once 'connect.php';
$name = $_POST['name'];
$email = $_POST['login'];
$password = $_POST['password'];


mysqli_query($connect, "INSERT INTO `Users` (`id`, `email`, `password`, `name`, `limitations`, `uploaded_data`, `data_downloads`) VALUES (NULL, '$email', '$password', '$name', '0','0', '0');");

header('Location: ../login.php');