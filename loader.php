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

// require modules
if(file_exists(DON_DIR.'/modules/composer/vendor/autoload.php')) {
    require (DON_DIR.'/modules/composer/vendor/autoload.php');
}

// require modules
$modules = glob(DON_DIR.'/modules/*.module.php');
foreach ($modules as $module) {
    require ($module);
}

//dump(CORE, true);
// require autoload
require (COMPONENTS . '/autoload.php');

//// require base classes
//require (DON_DIR.'/core/Base.php');
//require (DON_DIR.'/core/BaseModel.php');
//require (DON_DIR.'/core/BaseForms.php');
//require (DON_DIR.'/core/BaseView.php');
//require (DON_DIR.'/core/BaseController.php');
//require (DON_DIR.'/core/BaseLocalisation.php');
//require (DON_DIR.'/core/Kernel.php');
//require (DON_DIR.'/core/Router.php');