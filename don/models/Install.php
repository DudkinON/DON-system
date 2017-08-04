<?php
/**
 * Created by Oleg Dudkin.
 * Project: CMS "DON e-Commerce"
 * File name: Install.php
 * Date: 7/30/2017
 * Time: 8:19 AM
 */

class Install
{
    public static function checkDb($data_base)
    {
        $db = new PDO("mysql:host=$host;", $user, $password);
        $db->exec("SHOW DATABASES LIKE $db_name");
        $result = $db->query("SHOW DATABASES LIKE $db_name");
    }
}