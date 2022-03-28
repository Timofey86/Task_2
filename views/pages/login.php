<?php
session_start();
if ($_SESSION['user']) {
    header('Location: /views/pages/profile.php');
}

?>
<?php require_once '../templates/header.php'?>
<?php
require_once '../templates/head.php';
?>
<body>
<?php
require_once '../templates/navbar.php';
?>
<div class="container mt-4">
    <h2 class="mt-4">Авторизация</h2>
    <div class="row">
        <div class="col">

            <form class="mt-4" action="../../controllers/signin.php" method="post">
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
