<?php
session_start();
if ($_SESSION['user']) {
    header('Location: profile.php');
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
<div class="container mt-4">
    <h2 class="mt-4">Авторизация</h2>
    <div class="row">
        <div class="col">
            <!-- Форма авторизации -->

            <form class="mt-4" action="../../core/signin.php" method="post">
                <input type="text" class="form-control" name="login" placeholder="Введите логин" required><br>
                <input type="password" class="form-control" name="password" placeholder="Введите пароль" required><br>
                <button class="btn btn-success" type="submit">Авторизоваться</button>
            </form>
            <br>
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
