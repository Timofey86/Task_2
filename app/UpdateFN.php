<?php

namespace app;

class UpdateFN
{
    private $db;
    private $id;
    private $full_name;

    public function __construct($id,$full_name,$db)
    {
        $this->id = $id;
        $this->full_name = $full_name;
        $this->db = $db;
    }

    public function getUpdateFullName()
    {
        mysqli_query($this->db, "UPDATE `users` SET `full_name` = '$this->full_name' WHERE `users`.`id` = '$this->id'");
    }




}