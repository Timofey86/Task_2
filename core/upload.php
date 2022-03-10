<?php
session_start();
require_once 'connect.php';
require_once '../app/Upload.php';
use app\Upload;


$image = $_FILES['image'];
$fileName = $_FILES['image']['name'];
$type = $_FILES['image']['type'];
$imagetmp = $_FILES['image']["tmp_name"];
$idUser = $_SESSION['user']['id'];

$uploadfile = new Upload($type,$imagetmp,$fileName,$idUser,$db);
$uploadfile->uploadImage();



