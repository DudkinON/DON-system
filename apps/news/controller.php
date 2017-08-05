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
    public function news($args, $language) {
        render('index', $language);
    }

    public function page($args, $language) {
        $context = array(
            'id' => $args[1],
            'language' => $language
            );
        render('one_news', $context);
    }
}

