<?php


$db = mysqli_connect('localhost', 'root', '', 'register-db');

if (!$db) {
    die('Error connect to DataBase');
}

mysqli_set_charset($db, "utf8") or die ('Не установлена кодировка');
?>