<?php
require_once 'connect.php';

$id = $_GET['id'];

mysqli_query($db,"DELETE FROM `images` WHERE `images`.`id` = '$id'");
header('Location:../views/pages/profile.php');
