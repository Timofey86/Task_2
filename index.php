<?php
$title = "Форма регистрации";
require __DIR__.'/header.php';
require_once 'db.php';
error_reporting(E_ALL);
?>

    <div class = "container mt-4">
        <div class="row">
            <div class="col">
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