<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/menu.css">
    <style>
        body {
            font-family: Montserrat, sans-serif;
        }
        label{ font-size: 25px;}
        input{ height: 30px; text-align: center; font-weight: bolder;}
        button{ margin-top: -5px;}
    </style>
</head>
<body>
    <nav>
    <ul class="horizontal-menu plain">
        <li><a href="/">Главная</a></li>
        <li><a href="cataloge.php">Каталог</a></li>
        <li><a href="construct.php">Конструктор</a></li>
        <li class="active"><a href="search_model.php">Поиск моделей</a></li>
        <li><a href="docs.php">Документация</a></li>
    </ul>
    </nav>
    <center>
        <form action="vendor/showModel.php" method="post"> 
            <label>Введите номер модели</label> <br>
            <input name="model_id"><br>
            <button type="submit">Найти</button>
        </form>
    
    <iframe src="<?php echo $_SESSION['blueprint']['3d_model']?>" height="800px" width="1600px" frameBorder="0"></iframe></center>
    <?php unset($_SESSION['blueprint']); ?>
</body>
</html>