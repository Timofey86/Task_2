<?php
session_start();
/*if (!$_SESSION['users']) {
    header('Location: index.php
   ');
}*/
$title = "Профиль пользователя";
require __DIR__ . '/header.php';
error_reporting(E_ALL);
?>

    <div class="container mt-4">
        <div class="row">
            <div class="col">
                <h2>Профиль пользователя</h2>
                <form>
                    <h3><?= $_SESSION['user']['login']  ?> </h3>
                    <p><?= $_SESSION['user']['email'] ?></p>
                    <a href="core/logout.php" class="logout">Выход</a>
                </form>

            </div>
        </div>
    </div>
</body>
</html>