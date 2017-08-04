<?php

use don\core\BaseController;


/**
 * Created by Oleg Dudkin.
 * Project: "DON" - framework
 * File name: controller.php
 * Date: 8/3/2017
 * Time: 11:57 AM
 */

class NewsController extends BaseController
{
    public function news($args, $settings) {
        render('index', $settings);
    }

    public function page($args) {
        render('one_news', array('id' => $args[1]));
    }
}

