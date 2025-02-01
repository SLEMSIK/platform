<?php

session_start();

$key = array_search($_GET['id'], $_SESSION['work']);
unset( $_SESSION['work'][$key] );

unset( $_SESSION['work_img'][$key] );

session_commit();

header('Location: ../cataloge.php');