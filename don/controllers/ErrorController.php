<?php

/**
 * Created by PhpStorm.
 * User: 3002
 * Date: 3/29/2017
 * Time: 6:22 PM
 */
class ErrorController
{
    public function actionIndex($error = 404) {
        $error = intval($error);
        if($error === 404) require_once (ROOT.'/template/'.TEMPLATE.'/404.html');
    }
}