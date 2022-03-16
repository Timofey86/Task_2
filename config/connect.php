<?php

$config = require_once 'configDB.php';
$db = mysqli_connect($config["host"], $config["username"], $config["password"], $config["database"]);

if (!$db) {
    try {
        throw new Exception("Error connect to DataBase $db->error <br>", $db->errno);
    } catch (Exception $exception) {
        echo "Error DB connect" . $exception->getCode() . " - " . $exception->getMessage() . "<br>";
    }

}

mysqli_set_charset($db, "utf8") or die ('Не установлена кодировка');
