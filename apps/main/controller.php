<?php

use don\core\BaseController;


/**
 * Created by Oleg Dudkin.
 * Project: "DON" - framework
 * File name: controller.php
 * Date: 8/3/2017
 * Time: 11:57 AM
 */


class MainController extends BaseController
{

    public function index($args, $settings) {
//        print_model(new Models());
        render('index', $settings);
    }

    public function pages($args) {
        render_page($args);
    }

}

get_model();