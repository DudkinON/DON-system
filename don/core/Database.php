<?php
/**
 * Created by Oleg Dudkin.
 * Project: "DON" - framework
 * File name: Database.php
 * Date: 8/8/2017
 * Time: 11:26 AM
 */

namespace don\core;



class Database
{
    /**
     * TODO: If database exist return version string else false
     * @return bool
     */
    public static function isMySQLdb()
    {
        if (mysqli_get_client_info()) return true;
        else return false;
    }
}