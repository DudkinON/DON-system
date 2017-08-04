<?php

use don\core\BaseController;


/**
 * Created by Oleg Dudkin.
 * Project: "DON" - framework
 * File name: controller.php
 * Date: 8/3/2017
 * Time: 11:57 AM
 */

class MainController extends BaseController
{

//    public $var1 = 'value 1';
//    public $var2 = 'value 2';
//    public $var3 = 'value 3';
//
//    protected $protected = 'protected var';
//    private   $private   = 'private var';
//
//
//
//    function iterateVisible() {
//        echo "MyClass::iterateVisible:\n";
//        foreach ($this as $key => $value) {
//            print "$key => $value\n";
//        }
//    }

    public function index($args, $settings) {
        echo $_SERVER['REQUEST_URI'];
        render('test', $settings);
//        echo "<pre>MyClass::iterateVisible:\n";
//        foreach ($this as $key => $value) {
//            print "$key => $value\n";
//        }
//        if (isset($args) && is_array($args)) {
//            foreach ($args as $key => $value) {
//                print "$key => $value\n";
//            }
//        } else {
//            print ($args);
//        }
//        if (isset($settings) && is_array($settings))  {
//            foreach ($settings as $key => $value) {
//                if (is_array($value)) {
//                    print_r($value);
//                } else {
//                    print "$key => $value\n";
//                }
//            }
//        }
    }

    public function pages($args) {
        echo '<pre>';
        print_r($args);
    }
}

