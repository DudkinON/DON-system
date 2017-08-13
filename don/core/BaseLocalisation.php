<?php
/**
 * Created by Oleg Dudkin.
 * Project: "DON" - framework
 * File name: BaseLocalisation.php
 * Date: 8/5/2017
 * Time: 4:34 AM
 */

namespace don\core;


class BaseLocalisation implements Language
{

    /**
     * return dictionary of words
     * @param $get_lang_path
     * @param $get_default_language
     * @return array|mixed
     */
    protected static function language($get_lang_path, $get_default_language)
    {
        $language = array();
        if (isset($_SESSION['language'])) {
            $path = $get_lang_path;
            if (file_exists($path)) {
                $language = include($path);
            } else {
                $language = include(BASE_DIR .  $get_default_language);
            }
        } else {
            $path = BASE_DIR . '/loc/' . $_SESSION['language'] . '.php';
            if (file_exists($path)) {
                $language = include($path);
            } else {
                $language = include(BASE_DIR . '/loc/en.php');
            }
        }
        return $language;
    }


    public static function get_user_language($lang = false){
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

    public static function update_user_language($uid, $lang){
        $db = Db::getConnection();
        $sql = 'UPDATE `user` '.'SET `language` = :language WHERE `id` = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $uid, PDO::PARAM_INT);
        $result->bindParam(':language', $lang, PDO::PARAM_STR);
        return $result->execute();
    }
}