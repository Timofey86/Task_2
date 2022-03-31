<?php

namespace app;

class UpdatePASS
{
    private $db;
    private $id;
    private $last_password;
    private $password;
    private $password_confirm;

    public function __construct($id, $last_password, $password, $password_confirm, $db)
    {
        $this->id = $id;
        $this->last_password = $last_password;
        $this->password = $password;
        $this->password_confirm = $password_confirm;
        $this->db = $db;
    }

    public function getValidationPassword()
    {
        if ($this->last_password == '') {
            $_SESSION['message'] = 'Введите действующий пароль!';
            header('Location: ../views/pages/update_password.php');
        } elseif ($this->password == '') {
            $_SESSION['message'] = 'Введите новый пароль!';
            header('Location: ../views/pages/update_password.php');
        } elseif ($this->password_confirm == '') {
            $_SESSION['message'] = 'Повторите новый пароль!';
            header('Location: ../views/pages/update_password.php');
        } elseif ($this->password !== $this->password_confirm) {
            $_SESSION['message'] = 'Подтверждение пароля введено не верно!';
            header('Location: ../views/pages/update_password.php');
        }
    }

    public function checkLastPassword()
    {
        $last_password = md5($this->last_password);
        $password = md5($this->password);
        $query = "SELECT * FROM `users` WHERE `id` = '$this->id'";
        $result = mysqli_query($this->db, $query);
        $data = mysqli_fetch_assoc($result);
        $current_password = $data['password'];

        if ($last_password !== $current_password) {
            $_SESSION['message'] = 'Неправильно введен действующий пароль!';
            header('Location: ../views/pages/update_password.php');
        } else {
            mysqli_query($this->db, "UPDATE `users` SET `password` = '$password' WHERE `users`.`id` = '$this->id'");
            $_SESSION['message'] = 'Пароль успешно изменен!';
            header('Location: ../views/pages/profile.php');
        }
    }
}