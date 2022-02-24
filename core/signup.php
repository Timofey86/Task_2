<?php
session_start();
require_once 'connect.php';


$login = trim($_POST['login']);
$password = trim($_POST['password']);
$password_confirm = trim($_POST['password_confirm']);
$email = trim($_POST['email']);
$query1 = "SELECT * FROM `users` WHERE `login` = '$login'";
$query2 = "SELECT * FROM `users` WHERE `email` = '$email'";

//Валидация введенных данных
if ($login == '') {
    $_SESSION['message'] = 'Введите логин';
    header('Location: ../index.php');
} elseif ($password == '') {
    $_SESSION['message'] = 'Введите пароль';
    header('Location: ../index.php');
} elseif ($email == '') {
    $_SESSION['message'] = 'Введите email';
    header('Location: ../index.php');
} elseif ($password !== $password_confirm) {
    $_SESSION['message'] = 'Повторный пароль введен не верно!';
    header('Location: ../index.php');
} elseif (mb_strlen($login) < 5 || mb_strlen($login) > 90) {
    $_SESSION['message'] = 'Недопустимая длинна логина';
    header('Location: ../index.php');
} elseif (mb_strlen($password) < 2 || mb_strlen($password) > 8) {
    $_SESSION['message'] = 'Недопустимая длинна пароля';
    header('Location: ../index.php');
} elseif (!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $email)) {
    $_SESSION['message'] = 'Недопустимый email';
    header('Location: ../index.php');
} elseif (mysqli_num_rows(mysqli_query($db,$query1))){
    $_SESSION['message'] = 'Такой логин существует';
    header('Location: ../index.php');
} elseif (mysqli_num_rows(mysqli_query($db,$query2))){
    $_SESSION['message'] = 'Такой email существует';
    header('Location: ../index.php');
}
else {
    $password = md5($password);
    mysqli_query($db, "INSERT INTO `users` ( `login`, `password`, `email`) VALUES ( '$login', '$password', '$email')");

    $_SESSION['message'] = 'Регистрация прошла успешно';
    header('Location: ../login.php');
}
/*} else {
    $_SESSION['message'] = 'Пароли не совпадают';
    header('Location: ../index.php');

}*/
/*if (isset($_POST)) {
    $errors = array();

    if (trim($login) == '') {
        $errors[] = "Введите логин!";
    }
    if (trim($email) == '') {
        $errors[] = "Введите Email!";
    }
    if (trim($password) == '') {
        $errors[] = "Введите пароль";
    }
    if ($password !== $pass_conf) {
        $errors[] = "Повторный пароль введен не верно!";
    }
    if (mb_strlen($login) < 5 || mb_strlen($login) > 90) {
        $errors[] = "Недопустимая длинна логина!";
    }
    if (mb_strlen($password) < 2 || mb_strlen($password) > 8) {
        $errors[] = "Недопустимая длинна пароля (от 2 до 8 символов)";
    }
    if (!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $email)) {
        $errors[] = "Неверно введен e-mail!";
    }*/

/*  $check_user = mysqli_query($db, "SELECT * FROM 'users' WHERE 'login' ='$login' ");
  $result = mysqli_fetch_assoc($check_user);
  if (!empty($result)) {
      $errors[] = "Пользователь с таким логином существует!";
  }
  $check_user_email = mysqli_query($db, "SELECT * FROM 'users' WHERE 'email' = '$email'".mysqli_real_escape_string($db, $email)."'");
  $result1 =mysqli_fetch_assoc($check_user_email);
  if (!empty($result1)) {
      $errors[] = "Такой Email  уже существует!";
  }*/
if (empty($errors)) {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO `users` (`id`, `login`, `pass`, `email`) VALUES (NULL, '$login', '$password', '$email')";
    mysqli_query($db, $query);

    echo '<div style="color: green; ">Вы успешно зарегистрированы! Можно <a href="../login.php">авторизоваться</a>.</div><hr>';
} else {
    // array_shift() извлекает первое значение массива array и возвращает его, сокращая размер array на один элемент.
    echo '<div style="color: red; ">' . array_shift($errors) . '</div><hr>';

}
?>