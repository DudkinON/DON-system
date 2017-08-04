<?php
/**
 * Copyright: by Oleg Dudkin
 * Project: "DON" - framework
 * Date: 11/5/2016
 * Time: 7:01 AM
 */

/********| Include the loader file |********/

use don\core\Router;

require (dirname(__FILE__).'/loader.php');

$app = new Router(require (SETTINGS));


