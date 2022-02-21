<?php

$db = @mysqli_connect('localhost', 'root', '','register_db') or die('Ошибка соединения с БД');
if(!$db) die (mysqli_connect_error());

mysqli_set_charset($db, "utf8") or die ('Не установлена кодировка');
session_start();

?>