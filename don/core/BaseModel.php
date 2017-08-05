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

}

//$class = new Model();
//$class->iterateVisible();
