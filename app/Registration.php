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
            header('Location: ../views/pages/register.php');
        } elseif (mb_strlen($this->login) < 5 && mb_strlen($this->login) > 90) {
            $_SESSION['message'] = 'Недопустимая длинна логина, от 5 до 90 символов';
            header('Location: ../views/pages/register.php');
        } elseif (mb_strlen($this->password) < 2 || mb_strlen($this->password) > 8) {
            $_SESSION['message'] = 'Недопустимая длинна пароля, от 2 до 8 символов';
            header('Location: ../views/pages/register.php');
        } elseif (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['message'] = 'Недопустимый email';
            header('Location: ../views/pages/register.php');
        } elseif (mysqli_num_rows(mysqli_query($this->db, "SELECT * FROM `users` WHERE `login` = '$this->login'"))) {
            $_SESSION['message'] = 'Такой логин уже существует';
            header('Location: ../views/pages/register.php');
        } elseif (mysqli_num_rows(mysqli_query($this->db, "SELECT * FROM `users` WHERE `email` = '$this->email'"))) {
            $_SESSION['message'] = 'Такой email уже существует';
            header('Location: ../views/pages/register.php');
        } /*else {
            $this->password = md5($this->password);
            $login = mysqli_real_escape_string($this->db, $this->login);
            $email = mysqli_real_escape_string($this->db, $this->email);
            mysqli_query($this->db, "INSERT INTO `users` ( `login`, `password`, `email`) VALUES ( '$login', '$this->password', '$email')");

            $_SESSION['message'] = 'Регистрация прошла успешно';
            header('Location: ../views/pages/login.php');
        }*/
    }

    public function checkAlreadyUser()
    {
        $login = mysqli_real_escape_string($this->db, $this->login);
        $email = mysqli_real_escape_string($this->db, $this->email);
        if (mysqli_num_rows(mysqli_query($this->db, "SELECT * FROM `users` WHERE `login` = '$login'"))) {
            $_SESSION['message'] = 'Такой логин уже существует';
            header('Location: ../../views/pages/register.php');
        }
        if (mysqli_num_rows(mysqli_query($this->db, "SELECT * FROM `users` WHERE `email` = '$email'"))) {
            $_SESSION['message'] = 'Такой email уже существует';
            header('Location: ../../views/pages/register.php');
        }
    }

    public function getRegister()
    {
        $this->password = md5($this->password);
        $login = mysqli_real_escape_string($this->db, $this->login);
        $email = mysqli_real_escape_string($this->db, $this->email);
        mysqli_query($this->db, "INSERT INTO `users` ( `login`, `password`, `email`) VALUES ( '$login', '$this->password', '$email')");

        $_SESSION['message'] = 'Регистрация прошла успешно';
        header('Location: ../views/pages/login.php');
    }
}