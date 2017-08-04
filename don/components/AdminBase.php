<?php

/**
 * Copyright by Oleg Dudkin.
 * Project: www
 * File name: AdminBase.php
 * Date: 11/13/2016
 * Time: 8:50 PM
 */
abstract class AdminBase
{

    /**
     * The method that checks the user of the fact whether it is the administrator
     * @return boolean
     */
    public static function checkAdmin()
    {
        //Check whether the user is authorized. If not, it will be forwarded
        $userId = User::checkLogged();

        //Get information about the current user
        $user = User::getUserById($userId);

        //If the role of the current user "admin", let him admin panel
        if ($user['role'] === 'admin') {
            return true;
        }

        //Otherwise exits with a message about the closed access
        die('Access denied');
    }
}