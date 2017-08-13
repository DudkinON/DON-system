<?php
/**
 * Created by Oleg Dudkin.
 * Project: "DON" - framework
 * File name: BaseModel.php
 * Date: 8/3/2017
 * Time: 1:19 PM
 */

namespace don\core;


class BaseModel
{

    protected function register_table()
    {

        self::iterateVisible();
    }

    function iterateVisible() {

        echo "MyClass::iterateVisible:\n";
        foreach ($this as $key => $value)
        {
            print "$key => $value\n";
        }
    }

    function return_model()
    {
        $arr = array();
        foreach ($this as $key => $value)
        {
            if (is_array($value))
            {
                $arr[$key] = json_encode($value);
            }
            else
            {
                $arr[$key] = json_decode($value, true);
            }
        }
        return $arr;
    }

//    protected static function char_field($data = false)
//    {
//        if ($data)
//        {
//            $data = json_decode($data);
//            $set = array();
//            foreach ($data as $key => $value)
//            {
//                $set[] = "'{$key}' => '{$value}'";
//            }
//            return $set;
//        }
//        else
//        {
//           return false;
//        }
//
//    }
}
