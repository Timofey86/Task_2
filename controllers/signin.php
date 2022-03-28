<?php
session_start();
require_once '../config/connect.php';
require_once '../app/Authorization.php';

use app\Authorization;

$login = $_POST['login'];
$password = md5($_POST['password']);

$authorization = new Authorization($login, $password, $db);
$array = $authorization->getUser();
$authorization->checkUser($array);



if ($_SESSION['user']) {
    $idUser = $_SESSION['user']['id'];
    $result1 = mysqli_query($db, "SELECT * FROM images WHERE id_user = $idUser ");
    $data = mysqli_fetch_all($result1);
    $_SESSION['images'] = $data;
    header('Location: ../views/pages/profile.php');

} else header('Location: ../views/pages/login.php');
