<?php
session_start();
if ($_SESSION['user']) {
    header('Location: profile.php');
}
$title = "Форма авторизации";
require __DIR__.'/header.php';

?>
<div class="container mt-4">
    <div class="row">
        <div class="col">
            <!-- Форма авторизации -->
            <h2>Форма авторизации</h2>
            <form action="core/signin.php" method="post">
                <input type="text" class="form-control" name="login"  placeholder="Введите логин" required><br>
                <input type="password" class="form-control" name="password" placeholder="Введите пароль" required><br>
                <button class="btn btn-success" type="submit">Авторизоваться</button>
            </form>
            <br>
            <p>Если вы еще не зарегистрированы, тогда нажмите <a href="index.php">здесь</a>.</p>
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
