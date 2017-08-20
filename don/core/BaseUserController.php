<?php
/**
 * Created by Oleg Dudkin.
 * Project: "DON" - framework
 * File name: BaseUserController.php
 * Date: 8/13/2017
 * Time: 1:03 AM
 */

namespace don\core;


use PDO;

class BaseUserController extends Base
{
    public static function registration($settings){

        $db = Db::getConnection();

        $role = 'user';
        $sql = 'INSERT '.'INTO `users` (`uid`, `name`, `email`, `hash`, `role`)'.' VALUES (NULL, :name, :email, :hash, :role)';
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':hash', $hash, PDO::PARAM_STR);
        $result->bindParam(':role', $role, PDO::PARAM_STR);

        return $result->execute();
    }

}