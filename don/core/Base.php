<?php
/**
 * Created by Oleg Dudkin.
 * Project: "DON" - framework
 * File name: Base.php
 * Date: 8/3/2017
 * Time: 1:18 PM
 */

namespace don\core;


class Base
{
    /**
     * check database configuration
     * @return bool
     */
    protected function checkConfiguration()
    {
        if (!file_exists(BASE_DIR . '/db.php')) return true;
        else return false;
    }

    /**
     * redirect to admin panel
     * @return void
     */
    protected function startConfiguration()
    {
        header("Location: /don/start");
        return;
    }

    protected function validateForm($form)
    {
        $validForm = false;
        foreach ($form as $name => $value)
        {
            $value = preg_replace("/[[:cntrl:]]+/", '', $value);
            $validForm[$name] = trim(htmlspecialchars($value));
        }
        if ($validForm) return $validForm;
        else return false;
    }
}