<?php
/**
 * Created by Oleg Dudkin.
 * Project: "DON" - framework
 * File name: BaseLocalisation.php
 * Date: 8/5/2017
 * Time: 4:34 AM
 */

namespace don\core;


abstract class BaseLocalisation
{
    /**
     * @return array|mixed
     */
    public static function getLanguage()
    {
        $language = array();
        if (isset($_SESSION['language'])) {
            $path = BASE_DIR . '/loc/' . $_SESSION['language'] . '.php';
            if (file_exists($path)) {
                $language = include($path);
            } else {
                $language = include(BASE_DIR . '/loc/en.php');
            }
        } else {
            $browser_lang = !empty($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? strtok(strip_tags($_SERVER['HTTP_ACCEPT_LANGUAGE']), ',') : '';
            if ($browser_lang) $_SESSION['language'] = substr($browser_lang, 0, 2);
            else  $_SESSION['language'] = 'en';
            $path = BASE_DIR . '/loc/' . $_SESSION['language'] . '.php';
            if (file_exists($path)) {
                $language = include($path);
            } else {
                $language = include(BASE_DIR . '/loc/en.php');
            }
        }
        return $language;
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
        $sql = 'UPDATE `user` '.'SET `language` = :language WHERE `id` = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $uid, PDO::PARAM_INT);
        $result->bindParam(':language', $lang, PDO::PARAM_STR);
        return $result->execute();
    }
}