<?php
/**
 * Created by Oleg Dudkin.
 * Project: "DON" - framework
 * File name: Localisation.php
 * Date: 8/5/2017
 * Time: 8:19 AM
 */

namespace don\core;


class Localisation extends BaseLocalisation
{
    public static function get_language()
    {
        $path = BASE_DIR . '/loc/' . $_SESSION['language'] . '.php';
        $default_language = '/loc/en.php';
        $language = parent::language($path, $default_language);
        return $language;
    }
}