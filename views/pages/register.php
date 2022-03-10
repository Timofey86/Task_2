<?php
session_start();
if ($_SESSION['user']) {
    header('Location:profile.php');
}

?>

<!doctype html>
<html lang="en">
<?php
require_once '../components/head.php';
?>
<body>
<?php
require_once '../components/navbar.php';
?>
<div class="container">
    <h2 class="mt-4">Форма регистрации</h2>
    <form class="mt-4" action="../../core/signup.php" method="post">


        <!-- Форма регистрации -->

        <input type="text" class="form-control" id="login" name="login" placeholder="Введите логин"><br>
        <input type="password" class="form-control" id="password" name="password" placeholder="Введите пароль"><br>
        <input type="password" class="form-control" id="password_confirm" name="password_confirm"
               placeholder="Повторите пароль"><br>
        <input type="email" class="form-control" id="email" name="email" placeholder="Введите Email"><br>
        <button class="btn btn-success" type="submit">Зарегистрировать</button>
    </form>
    <br>
    <?php
    if ($_SESSION['message']) {
        echo '<p class="msg">' . $_SESSION['message'] . '</p>';
    }
    unset($_SESSION['message']);
    ?>

</div>

</body>
</html>