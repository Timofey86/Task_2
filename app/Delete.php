<?php

namespace app;

class Delete
{
    private $db;
    private $id;

    public function __construct($db, $id)
    {
        $this->db = $db;
        $this->id = $id;
    }

    public function deleteImage()
    {
        $result = mysqli_query($this->db, "SELECT image FROM `images` WHERE `id` = '$this->id'");
        if (!empty($result)) {
            $data = mysqli_fetch_all($result);
            $data1 = array_column($data, '0');
            unlink('../public/uploads/main/' . $data1[0]);
            unlink('../public/uploads/mini/' . $data1[0]);
        } else {
            $_SESSION['message'] = 'Такой файл не найден!';
            header('Location: ../views/pages/profile.php');

        }
    }

    public function deleteFromDb()
    {
        mysqli_query($this->db, "DELETE FROM `images` WHERE `images`.`id` = '$this->id'");
    }

}