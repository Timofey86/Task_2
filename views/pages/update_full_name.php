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
    <h2 class="mt-4">Смена ФИО</h2>
    <div class="row">
        <div class="col">

            <form class="mt-4" action="../../controllers/update_full_name.php" method="post">
                <input type="text" class="form-control" name="full_name" placeholder="Введите ФИО" required><br>
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
