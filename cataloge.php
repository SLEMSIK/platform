<?php require_once('vendor/connect.php')?>
<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Фигуры</title>
    <link rel="stylesheet" href="assets/css/cataloge-page.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
</head>
<body>
    <?php require_once('navbar.php')?>

    <div class="container-md">
        <div class="row">
            <div class="card1 p-4 mt-3">
                <div class="d-flex justify-content-center px-5">
                    <form action="cataloge.php" method="GET" style="width: 100%">
                        <div class="search"> <input type="text" class="search-input" placeholder="Поиск по названию" name="query" value="<?php if($_GET['query']){echo $_GET['query'];}?>"> <button type="submit" class="search-icon"> <i class="fa fa-search"></i> </button> </div>
                    </form>
                </div>
                <div class="d-flex justify-content-center px-5">
                    <a href="cataloge.php"class="m-2 btn btn-dark ">Фигуры</a>
                    <a href="works.php"class="m-2 btn btn-dark">Работы</a>
                </div>
            </div>
        </div>
        <div class="row">

                <?php 
                    if($_GET['query']){
                        $title = $_GET['query']."%";

                        $sql = mysqli_query($connect, "SELECT * FROM `shapes` WHERE `title` LIKE '$title' AND `status` = '1' ");      
                    }else{
                        $sql = mysqli_query($connect, "SELECT * FROM `shapes` WHERE `status` = '1'");      
                    }
                    while($result = mysqli_fetch_assoc($sql)){     
                        $creator_id = $result['creator_id'];
                        $creator_sql = mysqli_query($connect, "SELECT * FROM `Users` WHERE `id` = '$creator_id'");
                        $creator = mysqli_fetch_assoc($creator_sql);           
                ?>
                <div class="card p-2 g-col-6" style="width: 18rem;">
                    <img src="<?php echo $result['teacher_file']?>" class="card-img-top" />
                    <div class="card-body">
                        <hr>
                        <h5 class="card-title"><?php echo $result['title']?></h5>
                        <p class="card-text">Уровень сложности: <?php echo $result['level']?><br>Добавил: <?php echo $creator['name']?></p><p class="card-text text-black-50">Номер в каталоге: <?php echo $result['id']?></p>
                    </div>
                    <div class="card-body">
                        <?php if($_SESSION['work']){if(!in_array($result['id'] , $_SESSION['work'])){echo '<a href="vendor/addToWork.php?id='. $result["id"].'" class="card-link link-offset-2 link-underline link-underline-opacity-0 link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Добавить</a>' ;}else{echo '<a href="vendor/deleteAtWork.php?id='. $result["id"].'" class="card-link link-offset-2 link-underline link-underline-opacity-0 link-danger link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Удалить</a>';}}else{echo '<a href="vendor/addToWork.php?id='. $result["id"].'" class="card-link link-offset-2 link-underline link-underline-opacity-0 link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Добавить</a>' ;}?>
                        <a href="<?php echo $result['html_file']?>" class="card-link link-offset-2 link-underline link-underline-opacity-0 link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Подробнее</a>
                    </div>
                </div>
                <?php }?>
                
        </div>
    </div>



</body>
</html>