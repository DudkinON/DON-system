<?php

use don\core\UserBaseController;

/**
 * Created by Oleg Dudkin.
 * Project: "DON" - framework
 * File name: controller.php
 * Date: 8/6/2017
 * Time: 10:04 AM
 */


class UsersController extends UserBaseController
{
    public function login($args, $language)
    {
        $context = array(
            'args' => $args,
            'language' => $language,
            'login' => true,
        );
        $errors = false;
        $user = false;
        $password = false;
        if (isset($_POST['login']))
        {
            $form = parent::validateForm($_POST);
//            dump($form);
            $email = filter_var($form['email'], FILTER_VALIDATE_EMAIL);
            if ($email)
            {
                $user = parent::getUserByEmail($email);
                if ($user)
                {
//                    dump($user);
                    if (!password_verify($form['password'], $user['hash']))
                    {
                        $errors[] = $language['error_passwords_not_match'];
                    }
                    else
                    {
                        $password = true;
                    }
                }
                else $errors[] = $language['error_email_not_registered'];
            }
            else
            {
                $errors[] = $language['error_invalid_email'];
            }
            if (!$errors && $user && $password)
            {
                echo 'OK!';
            }
            else
            {
                $context['errors'] = $errors;
            }

        }

        render('login', $context);
    }

    public function register($args, $language)
    {
        $context = array(
            'args' => $args,
            'language' => $language,
        );
        render('login', $context);
    }
}