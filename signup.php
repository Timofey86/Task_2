<?php
$data = $_POST;
if (isset($data['do_signup'])) {
    $errors = array();
    if (trim($data['login']) == '') {
        $errors = "Введите логин!";
    }
    if (trim($data['email']) = ''){
        $errors = "Введите Email!";
    }
}
$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
$pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);

if(mb_strlen($login) < 5 || mb_strlen($login) > 90) {
    echo "Недопустимая длинна логина";
    exit();

}


?>