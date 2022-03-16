<?php
session_start();
require_once '../config/connect.php';
require_once '../app/Upload.php';

use app\Upload;

var_dump($_FILES);

$image = $_FILES['image'];
$fileName = $_FILES['image']['name'];
$type = $_FILES['image']['type'];
$imagetmp = $_FILES['image']["tmp_name"];
$idUser = $_SESSION['user']['id'];

$uploadfile = new Upload($type, $imagetmp, $fileName, $idUser, $db);
$uploadfile->checkImageFormat();
if (!$_SESSION['message']) {
    $uploadfile->uploadImage();
    $idUser = mysqli_real_escape_string($db, $idUser);

    $result1 = mysqli_query($db, "SELECT * FROM images WHERE id_user = $idUser ");
    $data1 = mysqli_fetch_all($result1);
    $_SESSION['images'] = $data1;
    $_SESSION['message'] = 'Файл успешно загружен';
    header('Location: ../views/pages/profile.php');

} else header('Location: ../views/pages/profile.php');

