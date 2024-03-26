<?php
session_start();
$model_id = isset($_GET["model_id"]) ? $_GET["model_id"] : "ERROR!";

    unset($_SESSION['work'][$model_id]);


  header("Location: ../CREATwork.php");
