<?php
/**
 * Created by Oleg Dudkin.
 * Project: "DON" - framework
 * File name: LocalisationAdmin.php
 * Date: 8/6/2017
 * Time: 10:16 AM
 */

namespace don\core;


class LocalisationAdmin extends BaseLocalisation
{
    public static function get_language()
    {
        if (!isset($_SESSION['language']))
        {
            $browser_lang = !empty($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? strtok(strip_tags($_SERVER['HTTP_ACCEPT_LANGUAGE']), ',') : '';
            if ($browser_lang) $_SESSION['language'] = substr($browser_lang, 0, 2);
            else  $_SESSION['language'] = 'en';
        }
        $default_language = DON_DIR . '/libs/loc/en.php';
        $path = DON_DIR . '/libs/loc/' . $_SESSION['language'] . '.php';
        $language = parent::language($path, $default_language);
        return $language;
    }
}