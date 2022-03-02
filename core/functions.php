<?php
function resizeImage($type, $nameFile){

    switch ($type) {
        case 'image/jpeg':
            $img = imagecreatefromjpeg($nameFile);
            break;

        case 'image/png':
            $img = imagecreatefrompng($nameFile);
            break;
        case 'image/gif':
            $img = imagecreatefromgif($nameFile);
            break;
    }

    list($img_width,$img_height) = getimagesize($nameFile);// текущие размеры изображения

    $width = 200;
    $k = round($img_width/$width,2);// коэффициент уменьшения

    $new_width = $img_width/$k;
    $new_height = $img_height/$k;

    $new_img = imagecreatetruecolor($new_width,$new_height);
    imagecopyresampled($new_img,$img,0,0,0,0,$new_width,$new_height,$img_width,$img_height);

    switch ($type){
        case 'image/jpeg':
            imagejpeg($new_img,"../uploads/mini/". $nameFile,100);
            break;
        case 'image/png':
            imagepng($new_img,"../uploads/mini/". $nameFile,100);
            break;
        case 'image/gif':
            imagegif($new_img,"../uploads/mini/". $nameFile);
            break;
    }

 }