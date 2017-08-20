<?php
/**
 * Created by Oleg Dudkin.
 * Project: "DON" - framework
 * File name: Database.php
 * Date: 8/8/2017
 * Time: 11:26 AM
 */

namespace don\core;



use PDO;

class Database
{
    /**
     * TODO: if database exist return version string else false
     * @return bool
     */
    public static function isMySQLdb()
    {
        if (mysqli_get_client_info()) return true;
        else return false;
    }

    /**
     * TODO: return user by email
     * @param $email
     * @return mixed
     */
    public static function getUserByEmail($email)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * '.'FROM `users` WHERE email = :email';
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();
        return $result->fetch(ARRAY_FILTER_USE_KEY);
    }
}