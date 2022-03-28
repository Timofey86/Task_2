<?php

$config = require_once 'configDB.php';
$db = mysqli_connect($config["host"], $config["username"], $config["password"], $config["database"]);

if (!$db) {
    throw new Exception("Error connect to DataBase");
}

mysqli_set_charset($db, "utf8") or die ('Не установлена кодировка');
