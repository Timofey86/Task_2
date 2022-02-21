<?php
error_reporting(E_ALL);
require_once 'db.php';
?>
<!doctype html>
<html lang="ru">
<head>
    <!-- Кодировка веб-страницы -->
    <meta charset="utf-8">
    <!-- Настройка viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-RU-Compatible" content="ie=edge">
    <title>Форма регистрации</title>

     <!-- Bootstrap CSS (Cloudflare CDN) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
       <!-- Bootstrap Bundle JS (Cloudflare CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css"
</head>
<body>
    <div class = "container mt-4"
    <h2>Форма регистрации</h2>
    <form action="check.php" method="post">
        <input type="text" class="form-control" name="login" id="login" placeholder="Введите логин"><br>
        <input type="password" class="form-control" name="pass" id="pass" placeholder="Введите пароль"><br>
        <input type="password" class="form-control" name="pass_2" id="pass_2" placeholder="Повторите пароль"><br>
        <input type="email" class="form-control" name="email" id="email" placeholder="Введите Email"><br>
        <button class="btn btn-success" type="submit" >Зарегистрировать</button>
    </form>
    <br>
    <p>Если вы зарегистрированы, тогда нажмите <a href="login.php">здесь.</a></p>
    </div>
</body>
</html>