<?php
session_start();
require_once '../config/connect.php';
require_once '../app/Delete.php';

use app\Delete;


$id = $_GET['id'];
$id = mysqli_real_escape_string($db, $id);

$delete = new Delete($db, $id);
$array = $delete->getImage();
$delete->deleteImage($array);
$delete->deleteFromDb();

$idUser = $_SESSION['user']['id'];
$result1 = mysqli_query($db, "SELECT * FROM images WHERE id_user = $idUser ");
$data1 = mysqli_fetch_all($result1);
$_SESSION['images'] = $data1;

header('Location:../views/pages/profile.php');
