<?php

/**
 * Copyright by Oleg Dudkin.
 * Project: CMS "DON e-Commerce"
 * File name: Functions.php
 * Date: 11/5/2016
 * Time: 8:51 AM
 */

namespace don\core;

class Functions
{

    /**
     * TODO: Validate input data
     * @param $string
     * @return string
     */
    public static function filter($string)
    {
        $string = trim(htmlspecialchars(stripcslashes($string)));
        return $string;
    }

    /**
     * TODO: Check integer is not less than length parameter
     * @param $number
     * @param $length
     * @return bool
     */
    public static function isNumber($number, $length)
    {
        if (($number == (int)$number || $number == (float)$number) && strlen($number) < $length) return true;
        return false;
    }

    /**
     * TODO: Check integer is not more than length parameter
     * @param $number
     * @param $length
     * @return bool
     */
    public static function checkNumberMinLength($number, $length)
    {
        if (($number == (int)$number || $number == (float)$number) && strlen($number) > $length) return true;
        return false;
    }

    /**
     * TODO: Cut first six characters of string and return without the deleted characters
     * @param $name
     * @return bool|string
     */
    public static function getFileName($name)
    {
        $fileName = substr($name, 6);
        return $fileName;
    }

    /**
     * TODO: Create path from file name
     * @param $name
     * @return string
     */
    public static function getPath($name)
    {
        $f1 = substr($name, 0, 1);
        $f2 = substr($name, 1, 1);
        $f3 = substr($name, 2, 1);
        $f4 = substr($name, 3, 1);
        $f5 = substr($name, 4, 1);
        $f6 = substr($name, 5, 1);
        $path = "/server/image/$f1/$f2/$f3/$f4/$f5/$f6/";
        return $path;
    }

    /**
     * TODO: Get file input, image name, width, height, and resize image
     * @param $file_input
     * @param $imgName
     * @param $w_o
     * @param $h_o
     * @return bool
     */
    public static function resizeImage($file_input, $imgName, $w_o, $h_o)
    {
        $filename = $file_input;
        $width = $w_o;
        $height = $h_o;
        list($width_orig, $height_orig) = getimagesize($filename);
        $ratio_orig = $width_orig / $height_orig;
        if ($width / $height > $ratio_orig) {
            $width = $height * $ratio_orig;
        } else {
            $height = $width / $ratio_orig;
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

    /**
     * TODO: Create unique name and path for file
     * @param $type
     * @return mixed
     */
    public static function getUniqueName($type)
    {
        do {
            $name = md5(microtime() . rand(0, 9999));
            $path = self::getPath($name);
            $fileName = self::getFileName($name);
            $file = BASE_DIR . $path . $fileName . $type;
        } while (file_exists($file));
        $uniqueName['unique_name'] = $name;
        $uniqueName['path'] = $path;
        $uniqueName['full_path'] = BASE_DIR . $path;
        $uniqueName['file_name'] = $fileName;
        $uniqueName['file_name_type'] = $fileName . $type;
        $uniqueName['root_path_file_type'] = $file;
        $uniqueName['path_file_type'] = $path . $fileName . $type;
        return $uniqueName;
    }

    /**
     * TODO: Validate string maximum length, minimum length
     * @param $title
     * @param $max
     * @param $min
     * @return bool
     */
    public static function checkTitleLength($title, $max, $min)
    {
        $length = strlen($title);
        if ($length >= $min && $length <= $max) return true;
        else return false;
    }

    /**
     * TODO: Validate length is more than 2 characters
     * @param $name
     * @return bool
     */
    public static function checkName($name)
    {
        if (strlen($name) > 2) {
            return true;
        }
        return false;
    }

    /**
     * TODO: Validate string to make sure it is not integer and more than 57 characters
     * @param $title
     * @return bool
     */
    public static function checkTitle($title)
    {
        if (strlen($title) < 57 && $title != (int)$title) {
            return true;
        }
        return false;
    }

    /**
     * TODO: Validate string length is more than 57 characters
     * @param $title
     * @return bool
     */
    public static function checkString($title)
    {
        if (strlen($title) < 57) {
            return true;
        }
        return false;
    }

    /**
     * TODO: Validate integer. If integer and length is more than 12 characters, return true
     * @param $number
     * @return bool
     */
    public static function checkNumber($number)
    {
        if (($number == (int)$number || $number == (float)$number) && strlen($number) < 12) {
            return true;
        }
        return false;
    }

    /**
     * TODO: Check string length - if string is empty, return false
     * @param $text
     * @return bool
     */
    public static function checkText($text)
    {
        if (strlen($text) > 0) {
            return true;
        }
        return false;
    }

    /**
     * TODO: Validate e-mail
     * @param $email
     * @return bool
     */
    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    /**
     * TODO: Validate passwords - are equal
     * @param $password
     * @param $confirm_password
     * @return bool
     */
    public static function checkMatchPassword($password, $confirm_password)
    {
        if ($confirm_password === $password) {
            return true;
        }
        return false;
    }

    /**
     * TODO: Redirect user to $path
     * @param $path
     */
    public static function redirect($path)
    {
        header("Location: $path");
        exit();
    }
}
