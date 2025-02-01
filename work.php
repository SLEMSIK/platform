<?php require_once('vendor/connect.php')?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Работа | </title>
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
            <div class="col">
                <?php 
                $id = $_GET['id'];
                    $sql = mysqli_query($connect, "SELECT * FROM `work` WHERE `id` = '$id'");       
                    $result = mysqli_fetch_assoc($sql);
                        $creator_id = $result['creator_id'];
                        $creator_sql = mysqli_query($connect, "SELECT * FROM `Users` WHERE `id` = '$creator_id'");
                        $creator = mysqli_fetch_assoc($creator_sql);           
                ?>
                    <img src="<?php if(!$result['logo']){echo 'assets/img/logo low.png';}else{echo $result['logo'];}?>" class="card-img-top" />
                    
            </div>
                
        </div>
    </div>



</body>
</html>