<?php
session_start();
require_once 'connect.php';


$image = $_FILES['image'];
//валидация
$types = ["image/jpeg", "image/png", "image/gif"];
$type = $image['type'];

if (!in_array($image["type"], $types)) {
    $_SESSION['message'] = 'Недопустимый формат файла!';
    header('Location: ../profile.php');
} else {
    if (!is_dir('../uploads')) {
        mkdir('../uploads', 0777, true);
    }

    if(!is_dir('../uploads/mini')) {
        mkdir('../uploads/mini',0777,true);
    }

    $fileName = $image['name']; //путь в бд
    $idUser = $_SESSION['user']['id'];
    move_uploaded_file($image["tmp_name"], "../uploads/" . $_FILES['image']['name']);

    $uploadedfile = "../uploads/" . $_FILES['image']['name'];
    $img = imagecreatefromjpeg($uploadedfile); //открываем исходное изображение
    if(!$img) $img = imagecreatefrompng($uploadedfile);
    if(!$img) $img = imagecreatefromgif($uploadedfile);

    list($img_width, $img_height) = getimagesize($uploadedfile);
    $width_mini = 220;
    $k = round($img_width / $width_mini, 2); //коэффициент сжатия
    $new_width = $img_width / $k;
    $new_heigth = $img_height / $k;
    $tmp = imagecreatetruecolor($new_width, $new_heigth);//создаем новое изображение с меньшими размерами
    $newfile = "../uploads/mini/" . $_FILES['image']['name']; //имя файла для нового изображения
    imagecopyresampled($tmp, $img, 0, 0, 0, 0, $new_width, $new_heigth, $img_width, $img_height); //сжатие файла
    imagejpeg($tmp, $newfile, 100);//сохраняем изображение на диск

    mysqli_query($db, "INSERT INTO `images` ( `image`, `IdUser`) VALUES ( '$fileName', '$idUser')");
    $_SESSION['message'] = 'Файл успешно загружен';
    header('Location: ../profile.php');
}



