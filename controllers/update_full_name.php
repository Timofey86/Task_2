<?php
session_start();
require_once '../config/connect.php';
require_once '../app/UpdateFN.php';

use app\UpdateFN;

$id = $_SESSION['user']['id'];
$full_name = $_POST['full_name'];
$full_name = mysqli_real_escape_string($db, $full_name);

$update_full_name = new UpdateFN($id,$full_name,$db);
$update_full_name->getUpdateFullName();

$result1 = mysqli_query($db, "SELECT * FROM images WHERE id_user = $id ");
$data1 = mysqli_fetch_all($result1);
$_SESSION['images'] = $data1;
$_SESSION['user']['full_name'] = $full_name;

header('Location:../views/pages/profile.php');