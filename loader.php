<?php
/**
 * Created by Oleg Dudkin.
 * Project: "DON" - framework
 * File name: loader.php
 * Date: 8/3/2017
 * Time: 12:08 PM
 */
session_start();



// require configuration file
require (dirname(__FILE__).'/config.php');

// require database configuration file
if (file_exists(BASE_DIR . '/db.php')) require_once (BASE_DIR . '/db.php');

// require modules
if(file_exists(DON_DIR.'/modules/composer/vendor/autoload.php')) {
    require (DON_DIR.'/modules/composer/vendor/autoload.php');
}

// require modules
$modules = glob(DON_DIR.'/modules/*.module.php');
foreach ($modules as $module) {
    require ($module);
}

// require autoload
require (COMPONENTS . '/autoload.php');

