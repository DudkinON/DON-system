<?php
/**
 * Copyright by Oleg Dudkin.
 * Project: cmsOD
 * File name: index.php
 * Date: 2/25/2017
 * Time: 11:11 PM
 */
class Photo{

    public static function getFullPath($name, $type){
        $f1 = substr($name, 0, 1);
        $f2 = substr($name, 1, 1);
        $f3 = substr($name, 2, 1);
        $f4 = substr($name, 3, 1);
        $f5 = substr($name, 4, 1);
        $f6 = substr($name, 5, 1);
        $fileName = substr($name, 6);
        $path = "/images/$f1/$f2/$f3/$f4/$f5/$f6/$fileName.$type";
        return $path;
    }
    public static function getPath($name){
        $f1 = substr($name, 0, 1);
        $f2 = substr($name, 1, 1);
        $f3 = substr($name, 2, 1);
        $f4 = substr($name, 3, 1);
        $f5 = substr($name, 4, 1);
        $f6 = substr($name, 5, 1);
        $path = "/images/$f1/$f2/$f3/$f4/$f5/$f6/";
        return $path;
    }
    public static function addPhotoInDb($uid, $title, $description, $album, $place, $imgDB){
        $db = Db::getConnection();
        if ($album === 0||$album === '') $album = NULL;
        $sql = 'INSERT'.' INTO  `photos` (  `uid`,  `title`,  `description`,  `album_id`,  `place`,  `path` ) '
            . 'VALUES ' . '(:uid, :title, :description, :album_id, :place, :path)';
        $result = $db->prepare($sql);
        $result->bindParam(':uid', $uid, PDO::PARAM_INT);
        $result->bindParam(':title', $title, PDO::PARAM_STR);
        $result->bindParam(':description', $description, PDO::PARAM_STR);
        $result->bindParam(':album_id', $album, PDO::PARAM_INT);
        $result->bindParam(':place', $place, PDO::PARAM_STR);
        $result->bindParam(':path', $imgDB, PDO::PARAM_STR);
        if ($result->execute()) {
            return true;
        }
        return false;
    }
    public static function resizeImage($file_input, $imgName, $w_o, $h_o){
        $filename = $file_input;
        $width = $w_o;
        $height = $h_o;
        list($width_orig, $height_orig) = getimagesize($filename);
        $ratio_orig = $width_orig/$height_orig;
        if ($width/$height > $ratio_orig) {
            $width = $height*$ratio_orig;
        } else {
            $height = $width/$ratio_orig;
        }
        $image_p = imagecreatetruecolor($width, $height);
        $image = imagecreatefromjpeg($filename);
        imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);

        if (!file_exists($imgName)) {
            $img = imagejpeg($image_p, $imgName);
            imagedestroy($image_p);
            return true;
        }
        return false;
    }
    public function addPhoto(){
        $uid = User::checkLogged();
        if (isset($_FILES['photoFile'])&&!empty($_FILES['photoFile'])) {

            $title = '';
            $description = '';
            $album = '';
            $place = '';
            $image = $_FILES['photoFile'];
            $maxSize = 1024*1024*MAX_SIZE_IMG;
            $type = '.'.str_replace("image/","",$image['type']);
            $imageName = md5(uniqid());
            $path = self::getFullPath($imageName, $type);
            $fullPath = dirname(__FILE__).self::getPath($imageName);
            $imgFile = $image['tmp_name'];

            $q = Photo::addPhotoInDb($uid, $title, $description, $album, $place, $path);
            if ($q == true){
                if (!mkdir($fullPath, 0777, true)) echo 'Error create file';
                if ($image['size']>$maxSize) echo 'too big image';
                list($width, $height) = getimagesize($imgFile);
                if ($width<800&&$height<800){
                    if (!file_exists($path)) {
                        if (!move_uploaded_file($imgFile, $path)) echo 'ERROR move_uploaded_file';
                    }
                } else {
                    if (!Photo::resizeImage($imgFile, $path, 800, 800)) echo 'resizeImage false';
                }
                if (file_exists($path)){
                    echo 'true';
                }
            } else {
                echo 'false';
            }
        }
        return true;
    }
}