<?php
session_start();
require_once "core/connect.php";


$title = "Профиль пользователя";
require __DIR__ . '/header.php';
//error_reporting(E_ALL);
?>

<div class="container mt-4">
    <div class="row">
        <div class="col">
            <h2>Профиль пользователя</h2>
            <form>
                <h3><?= $_SESSION['user']['login'] ?> </h3>
                <p><?= $_SESSION['user']['email'] ?></p>
                <a href="core/logout.php" class="logout">Выход</a>
            </form>
            <hr>
            <form method="post" action="core/upload.php" enctype="multipart/form-data">
                <input type="file" name="image">
                <button class="btn btn-success" type="submit">Загрузить</button>

            </form>
            <br>
            <hr>
            <?php
            $idUser = $idUser = $_SESSION['user']['id'];
            $result = mysqli_query($db, "SELECT image FROM images WHERE Iduser = $idUser ");
            $data = mysqli_fetch_all($result);
            $data = array_column($data, '0');

            ?>
            <table>
                <tr>
                    <th>Image</th>
                </tr>

                <?php
                $idUser = $idUser = $_SESSION['user']['id'];
                $result1 = mysqli_query($db, "SELECT * FROM images WHERE Iduser = $idUser ");
                $data1 = mysqli_fetch_all($result1);
                //$data1 = array_column($data, '0');
                if (!empty($data1)) {
                    foreach ($data1 as $img) {
                        ?>
                        <tr>
                            <td><?= $img[0] ?></td>
                            <td><?= $img[1] ?></td>
                            <td><a href="core/delete.php?id=<?= $img[0] ?>">Delete</a></td>
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
            <?php
            $idUser = $idUser = $_SESSION['user']['id'];
            $result = mysqli_query($db, "SELECT image FROM images WHERE Iduser = $idUser ");
            $data = mysqli_fetch_all($result);
            $data = array_column($data, '0');
            ?>
            <?php if (!empty($data)) : ?>
                <?php foreach ($data as $image) : ?>
                    <p class="imglist">

                        <a href="uploads/<?= $image ?> " data-fancybox="gallery">  <!-- ссылка на полное изображение -->
                            <img src="uploads/mini/<?= $image ?>"/><!-- ссылка на изображение 100*100 -->
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