<?php

namespace app;

class Upload
{
    private $type;
    private $filename;
    private $imagetmp;
    private $idUser;
    private $db;

    public function __construct($type, $imagetmp, $filename, $idUser, $db)
    {
        $this->type = $type;
        $this->imagetmp = $imagetmp;
        $this->filename = $filename;
        $this->idUser = $idUser;
        $this->db = $db;

    }

    public function checkImageFormat()
    {
        $types = ["image/jpeg", "image/png", "image/gif"];
        if (!in_array($this->type, $types)) {
            $_SESSION['message'] = 'Недопустимый формат файла!';

        }
    }

    public function uploadImage()
    {
        if (!is_dir('../public/uploads/main')) {
            mkdir('../public/uploads/main', 0777, true);
        }

        if (!is_dir('../public/uploads/mini')) {
            mkdir('../public/uploads/mini', 0777, true);
        }
        $unique_image_name = time() . $this->filename;
        $original_image_name = $this->filename;

        move_uploaded_file($this->imagetmp, "../public/uploads/main/" . $unique_image_name);
        $uploadedfile = "../public/uploads/main/" . $unique_image_name;

        $img = imagecreatefromjpeg($uploadedfile); //открываем исходное изображение
        if (!$img) {
            $img = imagecreatefrompng($uploadedfile);
        }
        if (!$img) {
            $img = imagecreatefromgif($uploadedfile);
        }

        list($img_width, $img_height) = getimagesize($uploadedfile);
        $width_mini = 220;
        $k = round($img_width / $width_mini, 2); //коэффициент сжатия
        $new_width = $img_width / $k;
        $new_heigth = $img_height / $k;

        $tmp = imagecreatetruecolor($new_width, $new_heigth);//создаем новое изображение с меньшими размерами
        $newfile = "../public/uploads/mini/" . $unique_image_name; //имя файла для нового изображения
        imagecopyresampled($tmp, $img, 0, 0, 0, 0, $new_width, $new_heigth, $img_width, $img_height); //сжатие файла
        imagejpeg($tmp, $newfile, 100);//сохраняем изображение на диск

        mysqli_query($this->db, "INSERT INTO `images` ( `image`,`image_original_name`, `id_user`) VALUES ( '$unique_image_name','$original_image_name', '$this->idUser')");

    }

}
