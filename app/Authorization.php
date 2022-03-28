<?php

namespace app;

class Authorization
{
    private $login;
    private $password;
    private $db;

    public function __construct($login, $password, $db)
    {
        $this->login = $login;
        $this->password = $password;
        $this->db = $db;
    }

    public function getUser()
    {
        $query = "SELECT * FROM `users` WHERE `login` = '$this->login' AND `password` = '$this->password'";
        return mysqli_query($this->db, $query);
    }
    public function checkUser($array){
        if (mysqli_num_rows($array) > 0) {
            $user = mysqli_fetch_assoc($array);
            $_SESSION['user'] = [
                "id" => $user['id'],
                "login" => $user['login'],
                "email" => $user['email'],
            ];
        } else {
            $_SESSION['message'] = 'Неверный логин или пароль!';
            header('Location: ../views/pages/login.php');
        }
    }
}