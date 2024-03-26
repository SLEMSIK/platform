<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="assets/css/CRwork.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="assets/js/CRwork.js"></script>
</head>
<body>
<?php 
    session_start();
    require_once 'vendor/connect.php';
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    
    $result_ms = mysqli_query($connect, "SELECT `id` FROM `work`");        
    $work_id = mysqli_fetch_assoc($result_ms)['id']+1;
  ?>
<div class="wrap cf">
  <h1 class="projTitle">Сохранение работы</h1>
  <div class="heading cf">
    <h1>Работа <?php echo $work_id; ?></h1>
    <a href="/" class="continue">Продолжить выбор моделей</a>
  </div>
  <?php 
    require_once 'vendor/connect.php';
    $result_ms1 = mysqli_query($connect, "SELECT * FROM `work_figure` WHERE `work_id` = '$work_id'");
    $res = mysqli_fetch_assoc($result_ms1);
    for($i = 0; $i < count($_SESSION['work']); $i++){
      $model = $_SESSION['work'][$i]; 
      $result_model = mysqli_query($connect, "SELECT * FROM `blueprint` WHERE `id` = '$model'");
      $res1 = mysqli_fetch_assoc($result_model)
  ?>
    <div class="cart">
      <ul class="cartWrap">
        <li class="items odd">
          <div class="infoWrap"> 
            <div class="cartSection">
              <img class="itemImg" src=<?php echo $res1['image-student']; ?> />
              <p class="itemNumber"><?php echo "id:". $res1['id']; ?></p>
              <h3><?php echo "Фигура: " . $res1['name'] . " Сложность: ". $res1['dificult']; ?></h3>
            </div>
            <div class="cartSection removeWrap">
              <a href="vendor/removeatwork.php?model_id=<?php echo $res1['id']; ?>" class="remove">x</a>
            </div>
          </div>
        </li>
        <?php }?>
        <li class="totalRow"><a href="vendor/CRworkVN.php" class="btn continue">Сохранить работу</a></li>
      </ul>
    </div>
</div>  
</body>
</html>