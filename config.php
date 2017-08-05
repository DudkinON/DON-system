<?php
/**
 * Copyright: by Oleg Dudkin
 * Project: CMS "DON e-Commerce"
 * Date: 11/5/2016
 * Time: 7:27 AM
 */

/******************| main settings |*********************/

###########Define constants#############
// TODO: define constants
define('BASE_DIR', getcwd());
define('DON_DIR', BASE_DIR.'/don');
define('TWIG_CACHE_DIR', BASE_DIR.'/don/cache');
define('APPS_DIR', BASE_DIR.'/apps');
define('TEMPLATES_DIR', BASE_DIR.'/templates');
define('SETTINGS', BASE_DIR.'/settings.php');
define('MODULES', BASE_DIR.'/don/modules');
define('PUBLIC', BASE_DIR.'/public');


/**************| Shows errors if debug true |**************/
/*
 * do not change this code
 * if you want turn on display errors use 'settings.php' file
 */
if ((require (SETTINGS))['debug']) {
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
}
