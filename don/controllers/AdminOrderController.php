<?php

/**
 * Copyright by Oleg Dudkin.
 * Project: www
 * File name: AdminOrderController.php
 * Date: 2/28/2017
 * Time: 12:04 AM
 */
class AdminOrderController extends AdminBase
{
    /*
     * @controller AdminOrder
     * @action Index
     * @check admin session
     * @get orders list
     * @include view file
     */
    public function actionIndex(){
        self::checkAdmin();
        $ordersList = Order::getOrdersList();
        require (ROOT.'/views/admin/order/index.php');
        return true;
    }
    /*
     * @controller AdminOrder
     * @action Create
     * @check admin session
     * @get order, product amount, product list
     * @include view file
     */
    public function actionCreate(){
        self::checkAdmin();
        if (isset($_GET['add'])&&$_GET['add']='order'&&$_GET['q']==='/admin/order/create/'){
            if (!empty($_GET['art'])){
                $vc = Functions::filter($_GET['art']);
                $amount = $_GET['amount'];
                $product = Product::getProductByVendorCode($vc);
                if ($product != null) Cart::addProduct($product['id'], $amount);
            }
        }

        if (isset($_SESSION['products'])&&is_array($_SESSION['products'])){
            if ($_SESSION['products'] == []) {
                unset($_SESSION['products']);
            } else {
                // Получаем массив с идентификаторами и количеством товаров
                $productsQuantity = $_SESSION['products'];
                // Получаем массив с индентификаторами товаров
                $productsIds = array_keys($productsQuantity);
                // Получаем список товаров в заказе
                $products = Product::getProductsByIds($productsIds);
            }
        }

        if (isset($_GET['delete'])&&$_GET['del']==='delete') {
            Cart::deleteItem($_GET['delete']);
            if ($_SESSION['products'] == '0') Cart::clear();
            header("Location: /admin/order/create/");
            exit;
        }

        if (isset($_POST['submit'])){
            
        }
        require (ROOT.'/views/admin/order/create.php');
        return true;
    }
    /*
     * @controller AdminOrder
     * @action View
     * @check admin session
     * @get order, product amount, product list
     * @include view file
     */
    public function actionView($id){
        self::checkAdmin();
        $order = Order::getOrderById($id);
        $productsQuantity = json_decode($order['products'], true);
        $productsIds = array_keys($productsQuantity);
        $products = Product::getProductsByIds($productsIds);
        require (ROOT.'/views/admin/order/view.php');
        return true;
    }
    /*
     * @controller AdminOrder
     * @action Delete
     * @check admin session
     * @delete order
     * @include view file
     */
    public function actionDelete($id) {
        self::checkAdmin();
        if (isset($_POST['submit'])) {
            Order::deleteOrderById($id);
            header("Location: /admin/order");
            exit;
        }
        require (ROOT.'/views/admin/order/delete.php');
        return true;
    }
    /*
     * @controller AdminOrder
     * @action Update
     * @check admin session
     * @get order
     * @update order
     * @include view file
     */
    public function actionUpdate($id){
        #check admin session
        self::checkAdmin();
        #get order
        $order = Order::getOrderById($id);
        if (isset($_POST['submit'])){
            $errors = false;
            #If $_POST not empty change array order
            if (!empty($_POST['user_name'])) {
                $order['user_name'] = Functions::filter($_POST['user_name']);
                #Validation data from $_POST
                if (!User::checkName($order['user_name'])) $errors[] = NAME_NOT_VALID;
            }
            if (!empty($_POST['user_phone'])) {
                $order['user_phone'] = Functions::filter($_POST['user_phone']);
                #Validation data from $_POST
                if (!User::checkNumber($order['user_phone'])) $errors[] = PHONE_NOT_VALID;
            }
            if (!empty($_POST['user_email'])) {
                $order['user_email'] = Functions::filter($_POST['user_email']);
                #Validation data from $_POST
                if (!User::checkEmail($order['user_email'])) $errors[] = VALID_EMAIL;
            }
            if (!empty($_POST['user_country'])) {
                $order['user_country'] = Functions::filter($_POST['user_country']);
                #Validation data from $_POST
                if (!User::checkTitle($order['user_country'])) $errors[] = COUNTRY_NOT_VALID;
            }
            if (!empty($_POST['user_state'])) {
                $order['user_state'] = Functions::filter($_POST['user_state']);
                #Validation data from $_POST
                if (!User::checkTitle($order['user_state'])) $errors[] = STATE_NOT_VALID;
            }
            if (!empty($_POST['user_city'])) {
                $order['user_city'] = Functions::filter($_POST['user_city']);
                #Validation data from $_POST
                if (!User::checkTitle($order['user_city'])) $errors[] = CITY_NOT_VALID;
            }
            if (!empty($_POST['user_street'])) {
                $order['user_street'] = Functions::filter($_POST['user_street']);
                #Validation data from $_POST
                if (!User::checkString($order['user_street'])) $errors[] = STREET_NOT_VALID;
            }
            if (!empty($_POST['user_house'])) {
                $order['user_house'] = Functions::filter($_POST['user_house']);
                #Validation data from $_POST
                if (!User::checkNumber($order['user_house'])) $errors[] = HOUSE_NOT_VALID;
            }
            if (!empty($_POST['user_apartment'])) {
                $order['user_apartment'] = Functions::filter($_POST['user_apartment']);
                #Validation data from $_POST
                if (!User::checkNumber($order['user_apartment'])) $errors[] = APART_NOT_VALID;
            }
            if (!empty($_POST['user_comment'])) {
                $order['user_comment'] = Functions::filter($_POST['user_comment']);
            }
            if ($order['status']!= $_POST['status']) {
                $order['status'] = Functions::filter($_POST['status']);
                #Validation data from $_POST
                if (!Functions::checkNumber($order['status'], 2)) $errors[] = STATUS_NOT_VALID;
            }
            #If all data is valid, update order
            if ($errors === false) {
                Order::updateOrderById($order);
                header("Location: /admin/order/view/$id");
            }
        }
        require (ROOT.'/views/admin/order/edit.php');
        return true;
    }
    public function actionData(){
        self::checkAdmin();
        $art = $_POST['art'];
        echo 'back end works, art='.$art;
        if (isset($_POST['order'])){

        }
        return true;
    }
}