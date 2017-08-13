<?php
/**
 * Created by Oleg Dudkin.
 * Project: "DON" - framework
 * File name: models.module.php
 * Date: 8/4/2017
 * Time: 2:51 PM
 */

/**
 * return model as array
 * @param $class
 * @return mixed
 */
function return_model_as_array($class)
{
    return $class->return_model();
}

function register_model($class)
{
    $class->iterateVisible();
}

function print_model($model)
{
    register_model($model);
}

function get_models()
{
    require (BASE_DIR.'/apps/'.ACTIVE_APP.'/models.php');

}
