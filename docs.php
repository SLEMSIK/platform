<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="assets/css/card.css" rel="stylesheet">

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
    <script src="assets/js/addTowork.js"></script>
    <link rel="stylesheet" href="assets/css/menu.css">
    <style>
        .title{
            font-family: Montserrat, sans-serif;
            text-align: center;
            font-size: 30px;
            font-weight: bolder;
        }

        a{
            color: #7c9ab7;
            font-weight: bold;
            text-decoration: none;
        }
        p{
            margin: 10px 0;
            text-align: center;
        }
    </style>
</head>
<body>
    <nav>
        <ul class="horizontal-menu plain">
            <li><a href="/">Главная</a></li>
            <li class="active"><a href="cataloge.php">Каталог</a></li>
            <li><a href="construct.php">Конструктор</a></li>
            <li><a href="search_model.php">Поиск моделей</a></li>
            <li><a href="docs.php">Документация</a></li>
        </ul>
    </nav>
    <p class="title">Создание работы</p>
    <p>
       <a href="/CREATwork.php">Сохранить работу на локальный компьютер</a>
    </p>
    <div class="cards">
        <?php
            require_once 'vendor/connect.php';
            $fig_name = $_POST['figure'];
            $dificult = $_POST['dificult'];
            $result_ms = mysqli_query($connect, "SELECT * FROM `blueprint` WHERE `name` = '$fig_name' AND `dificult` = '$dificult'");        
            while($result = mysqli_fetch_assoc($result_ms)){
        ?>
                <div class="card">
                    <div class="card__top">
                        <a class="card__image"><img src=<?php echo $result['image-result']; ?>></a>
                    </div>
                    <div class="card__bottom">
                        <a class="card__title"> 
                            <p class="dateTime"><?php echo "Номер фигуры: ". $result['id']; ?></p> 
                            <button class="card__add" onclick="$.get('vendor/addtowork.php?model_id=<?php echo $result['id'] ?>');" >Добавить в работу</button>
                        </a>
                    </div>

                </div>
            <?php
            }
            ?>
        </div>
</body>
</html>