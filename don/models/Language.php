<?php

/**
 * Copyright by Oleg Dudkin.
 * Project: www
 * File name: language.php
 * Date: 12/14/2016
 * Time: 6:55 PM
 */
class Language
{
    public static function getLanguage(){
        $language = array();
        if (isset($_SESSION['language'])) {
            $path = ROOT.'/loc/'.$_SESSION['language'].'.php';
            if (file_exists($path)) {
                $language = include ($path);
            } else {
                $language = include (ROOT.'/loc/en.php');
            }
        } else {
            $browser_lang = !empty($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? strtok(strip_tags($_SERVER['HTTP_ACCEPT_LANGUAGE']), ',') : '';
            if ($browser_lang) $_SESSION['language'] = substr($browser_lang, 0,2);
            else  $_SESSION['language'] = 'en';
            $path = ROOT.'/loc/'.$_SESSION['language'].'.php';
            if (file_exists($path)) {
                $language = include ($path);
            } else {
                $language = include (ROOT.'/loc/en.php');
            }
        }
        return $language;
    }
}
