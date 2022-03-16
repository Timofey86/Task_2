<?php
session_start();
if ($_SESSION['user']) {
    header('Location:profile.php');
} else {
    header('Location: ../views/pages/login.php');
}