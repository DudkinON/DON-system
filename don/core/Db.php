<?php

class Db
{

    /**
     * TODO: Try to connect to database return PDO or false
     * @return bool|PDO
     */
    public static function getConnection()
    {
        $host = HOST;
        $db_name = DB_NAME;
        $user = USER_DB;
        $password = PASSWORD_DB;

        if (substr(mysqli_get_client_info(), 0, 5) === 'mysql') {
            try {
                $db = new PDO("mysql:host=$host;dbname=$db_name", $user, $password);
                $db->exec("set names utf8");
                return $db;
            } catch (Exception $e) {
                return false;
            }
        } else {
            return false;
        }
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
     * @param $_host_name
     * @param $_db_name
     * @param $_db_user
     * @param $_db_password
     * @return bool
     */
    public static function createDatabase($_host_name, $_db_name, $_db_user, $_db_password)
    {
        try {
            $db = new PDO("mysql:host=$_host_name;", $_db_user, $_db_password);
            $result = $db->query("SHOW DATABASES LIKE $_db_name");
            if (!$result) {
                $mysqli = new mysqli($_host_name, $_db_user, $_db_password);
                if (mysqli_connect_errno()) {
                    return "Unable to connect: mysqli_connect_error()\n";
                }
                $query_first = "CREATE DATABASE `$_db_name` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;";
                $mysqli->multi_query($query_first);
                $mysqli->close();
                $mysqli2 = new mysqli($_host_name, $_db_user, $_db_password, $_db_name);
                if (mysqli_connect_errno()) {
                    return "Unable to connect: mysqli_connect_error()\n";
                }
                $queries = require_once(ROOT . '/config/queries.php');

                $mysqli2->multi_query($queries);
                $db = new PDO("mysql:host=$_host_name;", $_db_user, $_db_password);
                if($db) return true;
            } else {
                return true;
            }
        } catch (Exception $e) {
            return false;
        }
    }
}