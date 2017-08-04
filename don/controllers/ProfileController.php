<?php

/**
 * Copyright by Oleg Dudkin.
 * Project: CMS "DON e-Commerce"
 * File name: ProfileController.php
 * Date: 11/6/2016
 * Time: 6:25 AM
 */
class ProfileController
{
    public function actionProfile() {
        $userID = User::checkLogged();
        $address = User::getAddressById($userID);
        $a = $address['phone_number'];
        $address['phone_number'] = '+'.substr($a, 0, LENGTH_CODE_COUNTRY).' ('.substr($a, LENGTH_CODE_COUNTRY, 3).') '
            .substr($a, LENGTH_CODE_COUNTRY+3, 3).'-'.substr($a, LENGTH_CODE_COUNTRY+6,2).'-'.substr($a, LENGTH_CODE_COUNTRY+8);
        $user = User::getUserById($userID);
        require (ROOT.'/views/profile/index.php');
        return true;
    }
    public function actionEdit(){
        $userID = User::checkLogged();
        $user = User::getUserById($userID);
        $name = $user['name'];
        $password = $user['password'];
        $email = $user['email'];
        $result = false;
        if (isset($_POST['submit'])){
            $name = Functions::filter($_POST['name']);
            $password = Functions::filter($_POST['password']);
            $confirm_password = Functions::filter($_POST['confirmpassword']);
            $email = Functions::filter($_POST['email']);
            $errors = false;
            if (!User::checkName($name)) $errors[] = NAME_MORE;
            if (!User::checkEmail($email)) $errors[] = VALID_EMAIL;
            if (!User::checkPassword($password)) $errors[] = PASS_MORE;
            if (!User::checkConfirmPassword($password, $confirm_password)) $errors[] = PASS_NOT_MUTCH;
            if (User::checkEmailExist($email) && $user['email'] !== Functions::filter($_POST['email'])) $errors[] = EMAIL_REG_ALREADY;
            if (!User::checkNameValid($name)) $errors[] = NAME_NOT_VALID;
            $hash = password_hash($password, PASSWORD_DEFAULT);
           
            if ($errors == false){
                $result = User::edit($userID, $name, $hash, $email);
                header("Location: /profile/");
            }
        }
        require (ROOT.'/views/profile/edit.php');
        return true;
    }
    public function actionAddress() {
        $userID = User::checkLogged();
        $userAddress = User::getAddressById($userID);
        $errors = false;
        $language = Language::getLanguage();
        if (isset($_POST['submit'])){
            $address = array();
            $address['phone_number'] = Functions::filter($_POST['phone_number']);
            $address['zip_code'] = Functions::filter($_POST['zip_code']);
            if (USE_COUNTRY === true) $address['country'] = Functions::filter($_POST['country']);
            $address['state'] = Functions::filter($_POST['state']);
            $address['city'] = Functions::filter($_POST['city']);
            $address['street'] = Functions::filter($_POST['street']);
            $address['house_number'] = Functions::filter($_POST['house_number']);
            if (!empty($_POST['apartment_number'])){
                $address['apartment_number'] = Functions::filter($_POST['apartment_number']);
            } else {
                $address['apartment_number'] = null;
            }
            $address['phone_number'] = str_replace('-', '', $address['phone_number']);
            $address['phone_number'] = str_replace('+', '', $address['phone_number']);
            $address['phone_number'] = str_replace('(', '', $address['phone_number']);
            $address['phone_number'] = str_replace(')', '', $address['phone_number']);
            if (!Functions::checkNumber($address['phone_number'], 30)) $errors[] = $language['error_phone_number'];
            if (!Functions::checkNumberMinLength($address['phone_number'], 8)) $errors[] = $language['error_phone_number'];
            if (!Functions::checkNumber($address['zip_code'], 15)) $errors[] = $language['error_zip_code_long'];
            if (!Functions::checkNumberMinLength($address['zip_code'], 4)) $errors[] = $language['error_zip_code_short'];
            if (USE_COUNTRY === true)  if (!Functions::checkTitleLength($address['country'], 80, 2)) $errors[] = $language['error_title_country'];
            if (!Functions::checkTitleLength($address['state'], 80, 2)) $errors[] = $language['error_title_state'];
            if (!Functions::checkTitleLength($address['city'], 30, 2)) $errors[] = $language['error_title_city'];
            if (!Functions::checkTitleLength($address['street'], 50, 2)) $errors[] = $language['error_title_street'];
            if (!Functions::checkNumber($address['house_number'], 5)) $errors[] = $language['error_number_house'];
            if (!Functions::checkNumber($address['apartment_number'], 5))$errors[] = $language['error_number_apartment'];
            if ($errors === false)
                if ($userAddress == false) {
                    $r = User::createAddressByUid($userID, $address);
                    if ($r == true) header('location: /profile');
                } else {
                    $r = User::updateAddressByUid($userID, $address);
                    if ($r == true) header('location: /profile');
                }
            }
        require (ROOT.'/views/profile/address.php');
        return true;
    }
}