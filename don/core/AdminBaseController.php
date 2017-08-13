<?php
/**
 * Created by Oleg Dudkin.
 * Project: "DON" - framework
 * File name: AdimnBaseController.php
 * Date: 8/6/2017
 * Time: 11:54 AM
 */

namespace don\core;


class AdminBaseController extends Base
{
    protected function checkMySQL()
    {
        return Database::isMySQLdb();
    }
}