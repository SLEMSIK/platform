<?php
require_once 'vendor/connect.php';
if (!isset($_COOKIE['user_id'])) {
    header('Location: index.php');
}

$id = $_COOKIE['user_id'];

$check_user = mysqli_query($connect, "SELECT * FROM `Users` WHERE `id` = '$id'");
    if (mysqli_num_rows($check_user) > 0) {
        $user = mysqli_fetch_assoc($check_user);

        $name = $user['name'];
        $email = $user['email'];
        $limitations = $user['limitations'];
        $uploaded_data = $user['uploaded_data'];
        $data_downloads = $user['data_downloads'];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профиль | <?php echo $_COOKIE['user_name']?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php require_once('navbar.php')?>
    <form action="/vendor/update.php" method="POST"  enctype="multipart/form-data">
    <div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <span class="font-weight-bold">Созданные работы</span>
                <a href="/" class="text-black-50">Работа на кубы</a>
                <a href="/" class="text-black-50">Работа на кубы</a>
                <a href="/" class="text-black-50">Работа на кубы</a>
                <a href="/" class="text-black-50">Работа на кубы</a>
                <a href="/" class="text-black-50">Работа на кубы</a>
                <a href="/" class="text-black-50">Работа на кубы</a>
                <a href="/" class="text-black-50">Работа на кубы</a>
                <a href="/" class="text-black-50">Работа на кубы</a>
                <a href="/" class="text-black-50">Работа на кубы</a>
                <a href="/" class="text-black-50">Работа на кубы</a>
                <a href="/" class="text-black-50">Работа на кубы</a>
                <a href="/" class="text-black-50">Работа на кубы</a>
                <a href="/" class="text-black-50">Работа на кубы</a>
                <a href="/" class="text-black-50">Работа на кубы</a>
                <a href="/" class="text-black-50">Работа на кубы</a>
                <a href="/" class="text-black-50">Работа на кубы</a>
                <a href="/" class="text-black-50">Работа на кубы</a>
                <a href="/" class="text-black-50">Работа на кубы</a>
                <a href="/" class="text-black-50">Работа на кубы</a>
                <a href="/" class="text-black-50">Работа на кубы</a>
                <a href="/" class="text-black-50">Работа на кубы</a>
                <a href="/" class="text-black-50">Работа на кубы</a>
                <a href="/" class="text-black-50">Работа на кубы</a>
                <a href="/" class="text-black-50">Работа на кубы</a>
                <a href="/" class="text-black-50">Работа на кубы</a>
                <a href="/" class="text-black-50">Работа на кубы</a>
                <a href="/" class="text-black-50">Работа на кубы</a>
                <a href="/" class="text-black-50">Работа на кубы</a>
            </div>
        </div>
        <div class="col-md-6 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Настройки аккаунта</h4>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12"><label class="labels">Имя</label><input name="name" type="text" class="form-control" placeholder="<?= $name; ?>" value="<?= $name; ?>"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Почта</label><input name="email" type="text" class="form-control" placeholder="<?= $email; ?>" value="<?= $email; ?>"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">Старый пароль</label><input name="old_password" type="text" class="form-control" placeholder="***"></div>
                    <div class="col-md-12"><label class="labels">Новый пароль</label><input name="new_password" type="text" class="form-control" placeholder="***"></div>
                </div>
                <div class="row mt-3">
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <button class="btn btn-outline-success" type="submit">Сохранить данные</button></form>
                    </div>
                    
                    
                    <div class="d-grid gap-2 col-6 mx-auto">
                    <form action="vendor/logout.php">
                        <button class="btn btn-outline-danger" type="submit">Выйти из аккаунта</button></form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
</div>
</div>
</body>
</html>