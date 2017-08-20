<?php

namespace don\core;

use Exception;
use mysqli;
use PDO;

class Db
{

    /**
     * TODO: Connect to database return PDO
     * @return PDO
     */
    public static function getConnection()
    {
        $host = HOST;
        $db_name = DB_NAME;
        $user = USER_DB;
        $password = PASSWORD_DB;


        $db = new PDO("mysql:host=$host;dbname=$db_name", $user, $password);
        $db->exec("set names utf8");
        return $db;
    }

    /**
     * TODO: Try to connect to MySQL database
     * @param $_host_name
     * @param $_db_name
     * @param $_db_user
     * @param $_db_password
     * @return bool
     */
    public static function checkDbName($_host_name, $_db_name, $_db_user, $_db_password)
    {
        try {
            $db = new PDO("mysql:host=$_host_name;dbname=$_db_name", $_db_user, $_db_password);
            $db->exec("set names utf8");
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * TODO: Try to connect to MySQL server without database name
     * @param $_host_name
     * @param $_db_user
     * @param $_db_password
     * @return bool
     */
    public static function checkUserNamePassword($_host_name, $_db_user, $_db_password)
    {
        try {
            $db = new PDO("mysql:host=$_host_name;", $_db_user, $_db_password);
            $db->exec("set names utf8");
            return true;
        } catch (Exception $e) {
            return false;
        }

    }

    /**
     * TODO: If database exist return version string else false
     * @return bool|string
     */
    public static function isDbExist()
    {
        try {
            $db_version = mysqli_get_client_info();
            return $db_version;
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * TODO: Create database.
     * @param $settings
     * @return bool|string
     */
    public static function createDatabase($settings)
    {
        try {
            $_host_name = $settings['host'];
            $_db_user = $settings['db_user'];
            $_db_password = $settings['db_password'];
            $_db_name = $settings['db_name'];

            $db = new PDO("mysql:host=$_host_name;", $_db_user, $_db_password);
            $result = $db->query("SHOW DATABASES LIKE $_db_name");
            if (!$result) {
                $mysqli = new mysqli($_host_name, $_db_user, $_db_password);
                if (mysqli_connect_errno()) return false;

                $query_first = "CREATE DATABASE `$_db_name` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;";
                $mysqli->multi_query($query_first);
                $mysqli->close();
                if (self::createUsersDb($settings)) return true;
            } else {
                return true;
            }
        } catch (Exception $e) {
            return false;
        }
    }

    /**
     * create database "users"
     * @param $settings
     * @return bool
     */
    public static function createUsersDb($settings)
    {
        $host_name = $settings['host'];
        $_db_user = $settings['db_user'];
        $_db_password = $settings['db_password'];
        $_db_name = $settings['db_name'];
        $name = $settings['super_user_name'];
        $email = $settings['super_user_email'];
        $hash = password_hash($settings['super_user_password'], PASSWORD_DEFAULT);
        $query = "CREATE TABLE `users`(
                            `uid` INT(11) NOT NULL,
                            `name` VARCHAR(35) NOT NULL,
                            `email` VARCHAR(40) NOT NULL,
                            `hash` VARCHAR(200) NOT NULL,
                            `role` VARCHAR(10) NOT NULL
                        ) ENGINE = InnoDB DEFAULT CHARSET = utf8;
                        INSERT
                        INTO
                            `users`(`uid`, `name`, `email`, `hash`, `role`)
                        VALUES(
                            1,
                            '{$name}',
                            '{$email}',
                            '{$hash}',
                            'super'
                        );
                        ALTER TABLE
                            `users` ADD PRIMARY KEY(`uid`);
                        ALTER TABLE
                            `users` MODIFY `uid` INT(11) NOT NULL AUTO_INCREMENT,
                            AUTO_INCREMENT = 2;";
        $mysqli = new mysqli($host_name, $_db_user, $_db_password, $_db_name);
        if (mysqli_connect_errno()) return false;
        $mysqli->multi_query($query);
        if ($mysqli) {
            $mysqli->close();
            return true;
        }
    }

}