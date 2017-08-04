<?php

/**
 * Copyright by Oleg Dudkin.
 * Project: www
 * File name: CartController.php
 * Date: 11/8/2016
 * Time: 3:52 PM
 */
class CartController
{
    public function actionAdd($id){
        Cart::addProduct($id);
        $ref = $_SERVER['HTTP_REFERER'];
        header("Location: $ref");
    }
    
    public function addForm($id){
        Cart::addProduct($id);
    }

    public static function actionDelete($id){
        Cart::deleteItem($id);
        //$productsInCart = Cart::getProducts();
        //$productsIds = array_keys($productsInCart);
        //$products = Product::deleteProductsByIds($productsIds);
        header("Location: /cart/");
        exit;
    }

    public function actionAddAjax($id){
        echo Cart::addProduct($id);
        return true;
    }

    public function actionIndex(){
        $categories = Category::getCategoriesList();
        $productsInCart = false;
        $productsInCart = Cart::getProducts();
        if ($productsInCart){
            $productsIds = array_keys($productsInCart);
            $products = Product::getProductsByIds($productsIds);
            $totalPrice = Cart::getTotalPrice($products);
        }
        require (ROOT.'/views/cart/index.php');
        return true;
    }

    public function actionCheckout() {
        $categories = Category::getCategoriesList();
        $result = false;
        if (isset($_POST['submit'])) {
            $order['user_name'] = Functions::filter($_POST['userName']);
            $order['user_phone'] = Functions::filter($_POST['userPhone']);
            $order['user_email'] = Functions::filter($_POST['userEmail']);
            if (USE_COUNTRY === true) $order['user_country'] = Functions::filter($_POST['userCountry']);
            $order['user_state'] = Functions::filter($_POST['userState']);
            $order['user_city'] = Functions::filter($_POST['userCity']);
            $order['user_street'] = Functions::filter($_POST['userStreet']);
            $order['user_house'] = Functions::filter($_POST['userHouse']);
            $order['user_apartment'] = Functions::filter($_POST['userApartment']);
            $order['user_comment'] = Functions::filter($_POST['userComment']);
            $errors = false;
            if (!User::checkName($order['user_name'])) $errors[] = NAME_NOT_VALID;
            if (!User::checkNumber($order['user_phone'])) $errors[] = PHONE_NOT_VALID;
            if (!User::checkEmail($order['user_email'])) $errors[] = VALID_EMAIL;
            if (USE_COUNTRY === true && !User::checkTitle($order['user_country'])) $errors[] = COUNTRY_NOT_VALID;
            if (!User::checkTitle($order['user_state'])) $errors[] = STATE_NOT_VALID;
            if (!User::checkTitle($order['user_city'])) $errors[] = CITY_NOT_VALID;
            if (!User::checkString($order['user_street'])) $errors[] = STREET_NOT_VALID;
            if (!User::checkString($order['user_house'])) $errors[] = HOUSE_NOT_VALID;
            if (!User::checkNumber($order['user_apartment'])) $errors[] = APART_NOT_VALID;
            
            if ($errors == false) {
                $productsInCart = Cart::getProducts();
                if (User::isGuest()) {
                    $userId = false;
                } else {
                    $userId = User::checkLogged();
                }
                $result = Order::saveOrder($order, $userId, $productsInCart);

                if ($result) {
                    $adminEmail = ADMIN_EMAIL;
                    $message = ROOT.'/admin/orders';
                    $subject = 'New order!';
                    mail($adminEmail, $subject, $message);
                    Cart::clear();
                }
            } else {
                // Форма заполнена корректно? - Нет
                // Итоги: общая стоимость, количество товаров
                $productsInCart = Cart::getProducts();
                $productsIds = array_keys($productsInCart);
                $products = Product::getProductsById($productsIds);
                $totalPrice = Cart::getTotalPrice($products);
                $totalQuantity = Cart::countItems();
            }
        } else {
            $productsInCart = Cart::getProducts();

            // В корзине есть товары?
            if ($productsInCart == false) {
                // В корзине есть товары? - Нет
                // Отправляем пользователя на главную искать товары
                header("Location: /");
            } else {
                // В корзине есть товары? - Да
                // Итоги: общая стоимость, количество товаров
                $productsIds = array_keys($productsInCart);
                $products = Product::getProductsByIds($productsIds);
                $totalPrice = Cart::getTotalPrice($products);
                $totalQuantity = Cart::countItems();

                $userName = false;
                $userPhone = false;
                $userCountry = false;
                $userState = false;
                $userCity = false;
                $userStreet = false;
                $userHouse = false;
                $userApartment = false;
                $userComment = false;

                if (User::isGuest()) {
                    // Нет
                    // Значения для формы пустые
                } else {
                    // Да, авторизирован
                    // Получаем информацию о пользователе из БД по id
                    $userId = User::checkLogged();
                    $user = User::getUserById($userId);
                    // Подставляем в форму
                    $userName = $user['name'];
                }
            }
        }
        require (ROOT.'/views/cart/checkout.php');
        return true;
    }

      
}