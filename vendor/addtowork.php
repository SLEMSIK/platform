<?php
session_start();
$model_id = isset($_GET["model_id"]) ? $_GET["model_id"] : "ERROR!";

if(!isset($_SESSION['work'])) {
    $_SESSION['work'] = [];
  }


  array_push($_SESSION['work'], $model_id);


  header("Location: ../cataloge.php");
