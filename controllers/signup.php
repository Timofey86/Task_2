<?php
session_start();
require_once '../config/connect.php';
require_once '../app/Registration.php';

use App\Registration;

$login = trim($_POST['login']);
$password = trim($_POST['password']);

$password_confirm = trim($_POST['password_confirm']);
$email = trim($_POST['email']);

$registration = new Registration($login, $password, $password_confirm, $email, $db);
$registration->getValidationRegister();
if (!$_SESSION['message']) {
    $registration->checkAlreadyUser();
    $registration->getRegister();
} else header('Location: ../views/pages/register.php');


