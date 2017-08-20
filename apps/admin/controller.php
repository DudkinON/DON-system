<?php

use don\core\AdminBaseController;

/**
 * Created by Oleg Dudkin.
 * Project: "DON" - framework
 * File name: controller.php
 * Date: 8/6/2017
 * Time: 10:04 AM
 */


class AdminController extends AdminBaseController
{
    /**
     * TODO: Admin default action
     * @param $args
     * @param $language
     */
    public function don($args, $language)
    {
        $context = array(
            'args' => $args,
            'language' => $language,
        );
         parent::isAdmin();
        render('admin', $context);
    }

    /**
     * TODO: Installation action
     * @param $args
     * @param $language
     */
    public function start($args, $language)
    {
        $context = array(
            'language' => $language,
        );
        if (parent::checkMySQL()) $context['host'] = '127.0.0.1';
        if (parent::checkConfiguration()) $context['start'] = true;
        else parent::isAdmin();
        if (isset($_POST['db_conf']))
        {
            $form = parent::validateForm($_POST);
            parent::configurationDb($form);
        }
        render('start', $context);
    }
}