<?php
session_start();
require_once '../config/connect.php';
require_once '../app/UpdatePASS.php';

use app\UpdatePASS;

$id = $_SESSION['user']['id'];
$last_password = trim($_POST['last_password']);
$password = trim($_POST['password']);
$password_confirm = trim($_POST['password_confirm']);

$update_password = new UpdatePASS($id, $last_password, $password, $password_confirm, $db);
$update_password->getValidationPassword();
if (!$_SESSION['message']) {
    $update_password->checkLastPassword();
} else header('Location: ../views/pages/update_password.php');

$result1 = mysqli_query($db, "SELECT * FROM images WHERE id_user = $id ");
$data1 = mysqli_fetch_all($result1);
$_SESSION['images'] = $data1;

header('Location:../views/pages/profile.php');