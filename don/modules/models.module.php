<?php
/**
 * Created by Oleg Dudkin.
 * Project: "DON" - framework
 * File name: models.module.php
 * Date: 8/4/2017
 * Time: 2:51 PM
 */


function register_model($class)
{
    $class->iterateVisible();
}

function print_model($model)
{
    register_model($model);
}

function get_model()
{
    require (BASE_DIR.'/apps/'.ACTIVE_APP.'/models.php');

}