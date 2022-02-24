<?php
session_start();
require "connect.php";

$login = $_POST['login'];
$password = md5($_POST['password'] );

$query = "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'"  ;
$check_user = mysqli_query($db, $query);

if (mysqli_num_rows($check_user) > 0) {
    $user = mysqli_fetch_assoc($check_user);
   $_SESSION['user'] = [
        "id" => $user['id'],
        "login" => $user['login'],
        "email" => $user['email'],
    ];
    header('Location: ../profile.php');
} else {
    $_SESSION['message'] = 'Неверный логин или пароль!';
    header('Location: ../login.php');
}