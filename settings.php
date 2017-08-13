<?php
/**
 * Created by Oleg Dudkin.
 * Project: "DON" - framework
 * File name: settings.php
 * Date: 8/3/2017
 * Time: 10:32 AM
 */

// TODO: Settings
return array(
    // debug true/on
    'debug' => true,
    // don folder
    'don' => '/don',
    // controller file name
    'controller' => '/controller.php',
    // routes file name
    'routes' => '/routes.php',
    // views file name
    'views' => '/views.php',
    // cache enable
    'cache' => false,
    // twig extensions
    'twig_ext' => '.html.twig',
    // localization
    'localization' => true,

    // define works apps
    'apps' => [
    //    'your_app', # add your app here
        'main',
        'admin',
    ],
);