<?php

    $connect = mysqli_connect('localhost', 'root', 'root', 'math');

    if (!$connect) {
        die('Error connect to DataBase');
    }