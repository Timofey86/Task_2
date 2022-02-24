<?php
session_start();
if ($_SESSION['user']) {
    header('Location:profile.php');
}
$title = "Форма регистрации";
require __DIR__ . '/header.php';

//error_reporting(E_ALL);
?>

<div class="container mt-4">
    <div class="row">
        <div class="col">
            <h2>Форма регистрации</h2>
            <!-- Форма регистрации -->
            <form action="core/signup.php" method="post">
                <input type="text" class="form-control" name="login" placeholder="Введите логин"><br>
                <input type="password" class="form-control" name="password" placeholder="Введите пароль"><br>
                <input type="password" class="form-control" name="password_confirm" placeholder="Повторите пароль"><br>
                <input type="email" class="form-control" name="email" placeholder="Введите Email"><br>
                <button class="btn btn-success" type="submit">Зарегистрировать</button>
            </form>
            <br>
            <p>Если вы зарегистрированы, тогда нажмите <a href="login.php">здесь.</a></p>
            <?php
            if ($_SESSION['message']) {
                echo '<p class="msg">' . $_SESSION['message'] . '</p>';
            }
            unset($_SESSION['message']);
            ?>
        </div>
    </div>
</div>
</body>
</html>