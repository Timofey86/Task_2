<?php
session_start();
if ($_SESSION['user']) {
    header('Location:/views/pages/profile.php');
}

?>
<?php require_once '../templates/header.php'?>
<?php require_once '../templates/head.php'; ?>
<body>
<?php require_once '../templates/navbar.php'; ?>

<div class="container">
    <h2 class="mt-4">Форма регистрации</h2>
    <form class="mt-4" action="../../controllers/signup.php" method="post">

        <input type="text" class="form-control" id="login" name="login" placeholder="Введите логин"><br>
        <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Введите ФИО"><br>
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