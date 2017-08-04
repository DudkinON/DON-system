<?php

/**
 * Copyright by Oleg Dudkin.
 * User.php
 * Date: 11/5/2016
 * Time: 7:29 AM
 */
class User
{

    public static function registration($name, $email, $hash){

        $db = Db::getConnection();

        $role = 'user';
        $sql = 'INSERT '.'INTO `user` (`id`, `name`, `email`, `password`, `role`)'.' VALUES (NULL, :name, :email, :password, :role)';
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $hash, PDO::PARAM_STR);
        $result->bindParam(':role', $role, PDO::PARAM_STR);

        return $result->execute();
    }


    public static function checkEmailExist($email){
        $db = Db::getConnection();
        $sql = 'SELECT COUNT(*) '.'FROM `user` WHERE email = :email';
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

        if ($result->fetchColumn()) return true;
        return false;
    }
    
    public static function checkNameValid($name){
        if (
            $name == 'Admin' ||
            $name == 'admin' ||
            $name == 'Administration' ||
            $name == 'administration' ||
            $name == 'Adminestration' ||
            $name == 'adminestration' ||
            $name == 'Administrator' ||
            $name == 'administrator' ||
            $name == 'Adminestrator' ||
            $name == 'adminestrator'
        ){
            return false;
        } 
        return true;
    }

    public static function checkUserData($email, $password){

        $db = Db::getConnection();

        $sql = 'SELECT * '.'FROM `user` WHERE email = :email AND password = :password';
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_INT);
        $result->bindParam(':password', $password, PDO::PARAM_INT);
        $result->execute();

        $user = $result->fetch();

        if ($user) {
            return $user['id'];
        }
        return false;

    }

    public static function auth($userID){
        
        $_SESSION['user'] = $userID;
    }

    public static function checkLogged(){
        
        if (isset($_SESSION['user'])){
            return $_SESSION['user'];
        } else{
            header("Location: /user/login");
            return false;
        }
    }

    public static function isGuest(){
        
        if (isset($_SESSION['user'])){
            return false;
        } 
        return true;
    }

    public static function getUserById($id){
        if ($id){
            $db = Db::getConnection();
            $sql = 'SELECT *'.'FROM `user` WHERE id = :id';

            $result = $db->prepare($sql);
            $result->bindParam(':id', $id, PDO::PARAM_INT);

            $result->setFetchMode(PDO::FETCH_ASSOC);
            $result->execute();

            return $result->fetch();
        }
        return false;
    }

    public static function edit($id, $name, $password, $email){
        $db = Db::getConnection();
        $sql = 'UPDATE user '.'SET name = :name, password = :password, email = :email WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        return $result->execute();
    }
    public static function getUserByEmail($email){
        $db = Db::getConnection();
        $sql = 'SELECT `id`, `password`, `email` '.'FROM `user` WHERE email = :email';
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_INT);
        $result->execute();
        return $result->fetch();
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

    /**
     * @param $uid
     * @return bool|mixed
     */
    public static function getAddressById($uid) {
        $db = Db::getConnection();
        $sql = 'SELECT * '.'FROM `address` WHERE uid = :uid';
        $result = $db->prepare($sql);
        $result->bindParam(':uid', $uid, PDO::PARAM_INT);
        if ($result->execute()) return $result->fetch();
        else return false;
    }

    /**
     * @param $uid
     * @param $address
     * @return bool
     */
    public static function createAddressByUid($uid, $address) {
        $uid = intval($uid);
        $db = Db::getConnection();
        $sql = 'INSERT '
              .'INTO `address` 
            (`uid`, `country`, `state`, `city`, `street`, `house_number`, `apartment_number`, `phone_number`, `zip_code`)'
              .' VALUES 
            (:uid,  :country,  :state,  :city,  :street,  :house_number,  :apartment_number,  :phone_number, :zip_code)';
        if (USE_COUNTRY === true) $country = $address['country'];
        else $country = null;
        $result = $db->prepare($sql);
        $result->bindParam(':uid', $uid, PDO::PARAM_INT);
        $result->bindParam(':country', $country, PDO::PARAM_STR);
        $result->bindParam(':state', $address['state'], PDO::PARAM_STR);
        $result->bindParam(':city', $address['city'], PDO::PARAM_STR);
        $result->bindParam(':street', $address['street'], PDO::PARAM_STR);
        $result->bindParam(':house_number', $address['house_number'], PDO::PARAM_INT);
        $result->bindParam(':apartment_number', $address['apartment_number'], PDO::PARAM_INT);
        $result->bindParam(':phone_number', $address['phone_number'], PDO::PARAM_INT);
        $result->bindParam(':zip_code', $address['zip_code'], PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * @param $uid
     * @param $address
     * @return bool
     */
    public static function updateAddressByUid($uid, $address) {
        $uid = intval($uid);
        $db = Db::getConnection();
        $sql = 'UPDATE `address` '.'SET 
                                    country = :country, 
                                    state = :state, 
                                    city = :city,
                                    street = :street,
                                    house_number = :house_number,
                                    apartment_number = :apartment_number,
                                    phone_number = :phone_number
                                    zip_code = :zip_code
                                    WHERE uid = :uid';
        if (USE_COUNTRY === true) $country = $address['country'];
        else $country = null;
        $result = $db->prepare($sql);
        $result->bindParam(':uid', $uid, PDO::PARAM_INT);
        $result->bindParam(':country', $country, PDO::PARAM_STR);
        $result->bindParam(':state', $address['state'], PDO::PARAM_STR);
        $result->bindParam(':city', $address['city'], PDO::PARAM_STR);
        $result->bindParam(':street', $address['street'], PDO::PARAM_STR);
        $result->bindParam(':house_number', $address['house_number'], PDO::PARAM_INT);
        $result->bindParam(':apartment_number', $address['apartment_number'], PDO::PARAM_INT);
        $result->bindParam(':phone_number', $address['phone_number'], PDO::PARAM_INT);
        $result->bindParam(':zip_code', $address['zip_code'], PDO::PARAM_INT);
        return $result->execute();
    }
}