<?php

use don\core\BaseController;


/**
 * Created by Oleg Dudkin.
 * Project: "DON" - framework
 * File name: controller.php
 * Date: 8/3/2017
 * Time: 11:57 AM
 */

get_models();

class MainController extends BaseController
{
    /**
     * main app, action index
     * @param $args
     * @param $settings
     */
    public function index($args, $settings)
    {
        // if first load redirect to admin panel
        if (parent::checkConfiguration()) parent::startConfiguration();
        render('index');
    }

    /**
     * render page by query
     * @param $args
     */
    public function pages($args)
    {
        render_page($args);
    }


}

