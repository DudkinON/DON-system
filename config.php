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

/**************| Shows errors if debug true |**************/
/*
 * do not change this code
 * if you want turn on display errors use 'settings.php' file
 */
if ((require (SETTINGS))['debug']) {
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
}





///** @define "COMP"  "/components" */
//define('COMP', '/components');
///** @define "CONTROL" "/controllers" */
//define('CONTROL', '/controllers');

///******| Change parameters your web site here |*******/
//define('ROUTES_PATH', '/don/routes.php');   //<------this define a path for any application
//define('TEMPLATE', 'default');              //<------change 'default' on name your template
//define('COUNT_PRODUCT', 6);                 //<------change number if you want change amount products on page
//define('COUNT_PROD_ADMIN', 5);              //<------change number if you want change amount products in admin panel
//define('COUNT_ARTICLES_ADMIN', 3);          //<------change number if you want change amount articles in admin panel
//define('AMOUNT_ARTICLES_BY_PAGE', 3);       //<------amount articles by page (in blog)
//define('ADMIN_EMAIL', 'info@elleada.pw');   //<------change E-mail on yours
//define('MAX_SIZE_IMG', 3);                  //<------max size image for download (mb)
//define('COUNT_ORDERS_ADMIN', 20);           //<------change number if you want change amount orders in admin panel
//define('LENGTH_CODE_COUNTRY', 1);           //<------The length of code country in phone number
//define('USE_COUNTRY', true);                //<------set false if your store work in one country only
//define('SETTINGS_FILE', 'settings.php');    //<------settings file name