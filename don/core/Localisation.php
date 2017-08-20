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
        if (!isset($_SESSION['language']))
        {
            $browser_lang = !empty($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? strtok(strip_tags($_SERVER['HTTP_ACCEPT_LANGUAGE']), ',') : '';
            if ($browser_lang) $_SESSION['language'] = substr($browser_lang, 0, 2);
            else  $_SESSION['language'] = 'en';
        }
        $path = BASE_DIR . '/apps/' . ACTIVE_APP . '/loc/' . $_SESSION['language'] . '.php';
        $default_language = '/apps/' . ACTIVE_APP . '/loc/en.php';
        $language = parent::language($path, $default_language);
        return $language;
    }

    public static function getLang($lang = false)
    {
        self::getUserLanguage($lang);
        $ref = $_SERVER['HTTP_REFERER'];
        header("Location: $ref");
        exit();
    }

    public static function getUserLanguage($lang = false){
        if (isset($_SESSION['user'])){
            self::updateUserLanguage($_SESSION['user'], $lang);
            $db = Db::getConnection();
            $sql = 'SELECT `language`, `id` '.'FROM `user` WHERE id = :id';
            $result = $db->prepare($sql);
            $result->bindParam(':id', $_SESSION['user'], PDO::PARAM_INT);
            $result->execute();
            $user = $result->fetch();
            if ($user['language'] == false) $_SESSION['language'] = $lang;
            $_SESSION['language'] = $user['language'];
        } else {
            $_SESSION['language'] = $lang;
        }
    }
    public static function updateUserLanguage($uid, $lang){
        $db = Db::getConnection();
        $sql = 'UPDATE `users` '.'SET `language` = :language WHERE `id` = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $uid, PDO::PARAM_INT);
        $result->bindParam(':language', $lang, PDO::PARAM_STR);
        return $result->execute();
    }
}