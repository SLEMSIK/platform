<?php

    $connect = mysqli_connect('192.168.1.119', 'root', 'root', 'math');

    if (!$connect) {
        die('Error connect to DataBase');
    }