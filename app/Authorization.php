<?php

namespace app;

class Authorization
{
    private $login;
    private $password;
    private $db;

    public function __construct($login,$password,$db)
    {
        $this->login = $login;
        $this->password = $password;
        $this->db = $db;

    }

    public function getCheckuser()
    {
        $query = "SELECT * FROM `users` WHERE `login` = '$this->login' AND `password` = '$this->password'";
        $check_user = mysqli_query($this->db,$query);
        if (mysqli_num_rows($check_user) > 0) {
            $user = mysqli_fetch_assoc($check_user);
            $_SESSION['user'] = [
                "id" => $user['id'],
                "login" => $user['login'],
                "email" => $user['email'],
            ];
            header('Location: ../views/pages/profile.php');
        } else {
            $_SESSION['message'] = 'Неверный логин или пароль!';
            header('Location: ../views/pages/login.php');
        }

    }

}