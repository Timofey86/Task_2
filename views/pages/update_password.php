<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /views/pages/login.php');
}

?>
<?php require_once '../templates/header.php'?>
<?php
require_once '../templates/head.php';
?>
<body>
<div class="container mt-4">
    <h2 class="mt-4">Смена пароля</h2>
    <div class="row">
        <div class="col">

            <form class="mt-4" action="../../controllers/update_password.php" method="post">
                <input type="password" class="form-control" name="last_password" id="last_password" placeholder="Введите действующий пароль" required><br>
                <input type="password" class="form-control" id="password" name="password" placeholder="Введите новый пароль"><br>
                <input type="password" class="form-control" id="password_confirm" name="password_confirm"
                       placeholder="Повторите новый пароль"><br>
                <button class="btn btn-success" type="submit">Изменить</button>
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
