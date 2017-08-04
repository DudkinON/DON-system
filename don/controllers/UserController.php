<?php

/**
 * Copyright by Oleg Dudkin.
 * Project: www
 * File name: UserController.php
 * Date: 11/5/2016
 * Time: 7:38 AM
 */
class UserController
{
    public function actionRegistration(){

        $name = '';
        $email = '';
        $password = '';
        $result = false;

        if (isset($_POST['submit'])){
            $name = Functions::filter($_POST['name']);
            $email = Functions::filter($_POST['email']);
            $password = Functions::filter($_POST['password']);
            $confirm_password = Functions::filter($_POST['confirmpassword']);

            $errors = false;
            if (!Functions::checkName($name)) $errors[] = NAME_MORE;
            if (!Functions::checkEmail($email)) $errors[] = VALID_EMAIL;
            if (!Functions::checkPassword($password)) $errors[] = PASS_MORE;
            if (!Functions::checkConfirmPassword($password, $confirm_password)) $errors[] = PASS_NOT_MUTCH;
            if (User::checkEmailExist($email)) $errors[] = EMAIL_REG_ALREADY;
            if (!User::checkNameValid($name)) $errors[] = NAME_NOT_VALID;
            $hash = password_hash($password, PASSWORD_DEFAULT);
            if ($errors === false){
                $result = User::registration($name, $email, $hash);
            }
        }

        require (ROOT.'/views/user/registration.php');

        return true;
    }

    public function actionLogin(){
        $email = '';
        $password = '';

        if (isset($_POST['submit'])){
            $email = Functions::filter($_POST['email']);
            $password = Functions::filter($_POST['password']);

            $errors = false;

            if (!Functions::checkEmail($email)) {$errors[] = VALID_EMAIL;}
            if (!Functions::checkPassword($password)) {$errors[] = PASS_MORE;}

            if ($errors === false){
                $user = User::getUserByEmail($email);
                $hash = $user['password'];
                if (password_verify($password, $hash)) {
                    $_SESSION['u'] = $user['id'];
                    User::auth($user['id']);
                    header("Location: /profile/}");
                    exit;
                } else {
                    $errors[] = EMAIL_PASS_WRONG;
                }
            }
        }
        require (ROOT.'/views/user/login.php');

        return true;
    }
    public function actionLogout(){
        unset($_SESSION['user']);
        header("Location: /");
    }
}