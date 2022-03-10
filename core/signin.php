<?php
session_start();
require_once "connect.php";
require_once '../app/Authorization.php';
use app\Authorization;

$login = $_POST['login'];
$password = md5($_POST['password'] );

$authorization = new Authorization($login,$password,$db);
$authorization->getCheckuser();
