<?php
/**
 * Created by Oleg Dudkin.
 * Project: "DON" - framework
 * File name: UserBaseController.php
 * Date: 8/13/2017
 * Time: 9:15 PM
 */

namespace don\core;


class UserBaseController extends Base
{
    /**
     * TODO: call function the @getUserByEmail
     * @param $email
     * @return mixed
     */
    protected function getUserByEmail($email)
    {
        return Database::getUserByEmail($email);
    }


}
