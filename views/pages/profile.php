<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: home.php');
}
//error_reporting(E_ALL);
require_once '../../config/connect.php';
?>
<!doctype html>
<html lang="en">
<?php require_once '../templates/head.php'; ?>
<body>
<?php
//var_dump($_SESSION);
?>

<div class="container mt-4">
    <div class="row">
        <div class="col">
            <h2>Профиль пользователя</h2>
            <form>
                <h3><?= $_SESSION['user']['login'] ?> </h3>
                <p><?= $_SESSION['user']['email'] ?></p>
                <a href="../../controllers/logout.php" class="logout">Выход</a>
            </form>
            <hr>
            <p><small>Формат изображения: <b>jpg, png, gif</b></small></p>
            <form method="post" action="../../controllers/upload.php" enctype="multipart/form-data">
                <input type="file" name="image">
                <button class="btn btn-success" type="submit">Загрузить</button>
            </form>
            <br>
            <hr>
            <table>
                <tr>
                    <th>Image</th>
                </tr>

                <?php
                //var_dump($_SESSION['images']);

                if (!empty($_SESSION['images'])) {
                    foreach ($_SESSION['images'] as $img) {
                        ?>
                        <tr>
                            <td><?= $img[2] ?></td>
                            <td><a href="../../controllers/delete.php?id=<?= $img[0] ?>">Delete</a></td>
                        </tr>
                        <?php
                    }
                }

                ?>
            </table>
            <br>
            <?php
            if ($_SESSION['message']) {
                echo '<p class="msg">' . $_SESSION['message'] . '</p>';
            }
            unset($_SESSION['message']);
            ?>
            <?php if (!empty($_SESSION['images'])) : ?>
                <?php foreach ($_SESSION['images'] as $image) : ?>
                    <p class="imglist">

                        <a href="../../public/uploads/main/<?= $image[1] ?> " data-fancybox="gallery">
                            <img src="../../public/uploads/mini/<?= $image[1] ?>"/>
                        </a>
                    </p>
                <?php endforeach; ?>
            <?php endif; ?>


        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
</body>
</html>