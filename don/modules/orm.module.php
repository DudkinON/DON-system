<?php
/**
 * Created by Oleg Dudkin.
 * Project: "DON" - framework
 * File name: orm.module.php
 * Date: 8/6/2017
 * Time: 5:14 AM
 */

/**
 * @param $data (json string or array)
 */
function char_field($data) {
    $json = '';
    if (is_array($data))
    {
        $json = $data;
    }
    else
    {
        $json = json_decode($data, true);
    }
}