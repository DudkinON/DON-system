<?php
/**
 * Created by Oleg Dudkin.
 * Project: "DON" - framework
 * File name: BaseForms.php
 * Date: 8/3/2017
 * Time: 3:14 PM
 */

namespace don\core;


class BaseForms
{
    /**
     * TODO: check length of string if more return true
     * @param $str
     * @param $length
     * @return bool
     */
    public function strMoreLength($str, $length)
    {
        if (strlen($str) < $length) return false;
        else return true;
    }
}