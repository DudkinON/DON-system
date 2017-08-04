<?php

function __autoload($class_name)
{
    # List all the class directories in the array.
    $array_paths = array(
        '/models/',
        '/components/'
    );
    // TODO: add apps here
    $apps = array(
        '/don/',
    );
    foreach ($apps as $app) {
        foreach ($array_paths as $path) {
            $path = ROOT . $app . $path . $class_name . '.php';
            if (is_file($path)) require_once($path);
        }
    }

}