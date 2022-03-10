<?php

namespace app;
class Registration
{
    private $login;
    private $password;
    private $password_confirm;
    private $email;
    private $db;

    public function __construct($login, $password, $password_confirm, $email, $db)
    {
        $this->login = $login;
        $this->password = $password;
        $this->password_confirm = $password_confirm;
        $this->email = $email;
        $this->db = $db;
    }

    public function getValidationRegister()
    {
        if ($this->login == '') {
            $_SESSION['message'] = 'Введите логин';
            header('Location: ../views/pages/register.php');
        } elseif ($this->password == '') {
            $_SESSION['message'] = 'Введите пароль';
            header('Location: ../views/pages/register.php');
        } elseif ($this->email == '') {
            $_SESSION['message'] = 'Введите email';
            header('Location: ../views/pages/register.php');
        } elseif ($this->password !== $this->password_confirm) {
            $_SESSION['message'] = 'Повторный пароль введен не верно!';
            header('Location: ../../views/pages/register.php');
        } elseif (mb_strlen($this->login) < 5 || mb_strlen($this->login) > 90) {
            $_SESSION['message'] = 'Недопустимая длинна логина';
            header('Location: ../../views/pages/register.php');
        } elseif (mb_strlen($this->password) < 2 || mb_strlen($this->password) > 8) {
            $_SESSION['message'] = 'Недопустимая длинна пароля';
            header('Location: ../../views/pages/register.php');
        } elseif (!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $this->email)) {
            $_SESSION['message'] = 'Недопустимый email';
            header('Location: ../../views/pages/register.php');
        } elseif (mysqli_num_rows(mysqli_query($this->db, "SELECT * FROM `users` WHERE `login` = '$this->login'"))) {
            $_SESSION['message'] = 'Такой логин существует';
            header('Location: ../../views/pages/register.php');
        } elseif (mysqli_num_rows(mysqli_query($this->db, "SELECT * FROM `users` WHERE `email` = '$this->email'"))) {
            $_SESSION['message'] = 'Такой email существует';
            header('Location: ../../views/pages/register.php');
        } else {
            $this->password = md5($this->password);
            mysqli_query($this->db, "INSERT INTO `users` ( `login`, `password`, `email`) VALUES ( '$this->login', '$this->password', '$this->email')");

            $_SESSION['message'] = 'Регистрация прошла успешно';
            header('Location: ../views/pages/login.php');
        }
    }
}