<?php
session_start();
if ($_SESSION['user']) {
    header('Location:../views/pages/profile.php');
} else {
    header('Location: ../views/pages/login.php');
}