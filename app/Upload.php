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

    public function uploadImage()
    {
        $types = ["image/jpeg", "image/png", "image/gif"];
        if (!in_array($this->type, $types)) {
            $_SESSION['message'] = 'Недопустимый формат файла!';
            header('Location: ../views/pages/profile.php');
        } else {
            if (!is_dir('../uploads')) {
                mkdir('../uploads', 0777, true);
            }

            if (!is_dir('../uploads/mini')) {
                mkdir('../uploads/mini', 0777, true);
            }

            move_uploaded_file($this->imagetmp, "../uploads/" . $this->filename);
            $uploadedfile = "../uploads/" . $this->filename;
            $img = imagecreatefromjpeg($uploadedfile); //открываем исходное изображение
            if (!$img) $img = imagecreatefrompng($uploadedfile);
            if (!$img) $img = imagecreatefromgif($uploadedfile);

            list($img_width, $img_height) = getimagesize($uploadedfile);
            $width_mini = 220;
            $k = round($img_width / $width_mini, 2); //коэффициент сжатия
            $new_width = $img_width / $k;
            $new_heigth = $img_height / $k;
            $tmp = imagecreatetruecolor($new_width, $new_heigth);//создаем новое изображение с меньшими размерами
            $newfile = "../uploads/mini/" . $this->filename; //имя файла для нового изображения
            imagecopyresampled($tmp, $img, 0, 0, 0, 0, $new_width, $new_heigth, $img_width, $img_height); //сжатие файла
            imagejpeg($tmp, $newfile, 100);//сохраняем изображение на диск

            mysqli_query($this->db, "INSERT INTO `images` ( `image`, `IdUser`) VALUES ( '$this->filename', '$this->idUser')");
            $_SESSION['message'] = 'Файл успешно загружен';
            header('Location: ../views/pages/profile.php');

        }
    }
}
