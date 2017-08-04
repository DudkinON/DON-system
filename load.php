<?php
/*
 * Copyright: by Oleg Dudkin
 * Project: CMS "DON e-Commerce"
 * Front controller loader
 * Date: 11/5/2016
 * Time: 7:25 AM
 */

/******| Starting session |********/
session_start();

/*****| include system files |******/
require(dirname(__FILE__) . '/config.php');

require(ROOT . DON . COMP . '/Autoload.php');

if (file_exists(ROOT . '/' . SETTINGS_FILE)) require(ROOT . '/' . SETTINGS_FILE);

/********| Create Router |*********/
$router = new Router();

/*******| Starting Router |********/
$router->start();

