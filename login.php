<?php 
if (isset($_COOKIE['user_id'])) {
    header('Location: /');
  }  

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/login-page.min.css">
    <script src="assets/js/login-page.min.js"></script>
</head>
<body>
<div>
    <div class="min-vh-100 d-flex flex-column justify-content-between">
        <div>
            <section class="text-center p-5">
                <img src="assets/img/logo low.png" height="200px"
                    alt="Logo">
            </section>
            <form action="password.php" method="POST">
            <div class="loginContainer shadow-sm text-center px-5 py-3">
                <p class="fw-bold">Вход в аккаунт</p>
                <input class="form-control" name="login" id="textMessage" type="email" placeholder="Введите почту">
                <div>
                    <button class="btn w-100 btn-primary my-4 shadow-none">Продолжить</button>
                </div>
            </form>
                <p>или</p>
                <div class="">
                    <button
                        class="border bg-white w-100 d-flex justify-content-between align-items-center p-2 my-3 shadow-sm fw-bold">
                        <img src="https://aid-frontend.prod.atl-paas.net/atlassian-id/front-end/5.0.410/static/media/google-logo.e086107b.svg"
                            alt="google-logo" height="18px">
                        <a class="text-decoration-none text-dark w-100" href="#">Войти через Google</a>
                    </button>
                    <button
                        class="border bg-white w-100 d-flex justify-content-between align-items-center p-2 my-3 shadow-sm fw-bold">
                        <img src="assets/img/Yandex.svg"
                            alt="Yandex" height="18px">
                        <a class="text-decoration-none text-dark w-100" href="#">Войти через Yandex</a>
                    </button>
                    <button
                        class="border bg-white w-100 d-flex justify-content-between align-items-center p-2 my-3 shadow-sm fw-bold">
                        <img src="assets/img/VK.svg"
                            alt="VK" height="18px">
                        <a class="text-decoration-none text-dark w-100" href="#">Войти через VK</a>
                    </button>
                </div>
                <hr class="m-0 mt-5">
                <div class="pt-3 align-top">
                    <a href="#" class="text-decoration-none">Забыли пароль?</a>
                    <div class="p-1 d-inline align-middle"> . </div>
                    <a href="register.php" class="text-decoration-none">Зарегистрироваться</a>
                </div>
            </div>

        </div>
     
    </div>
</div>
</body>
</html>