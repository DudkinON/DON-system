<?php

/**
 * Created by PhpStorm.
 * User: 3002
 * Date: 3/29/2017
 * Time: 7:07 PM
 */
class PhpmyadminController
{
    public function actionIndex(){
        require_once (ROOT.'/template/'.TEMPLATE.'/404.html');
        return true;
    }

}