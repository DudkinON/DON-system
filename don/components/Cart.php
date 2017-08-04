<?php

/**
 * Copyright by Oleg Dudkin.
 * Project: zaat.16mb.com
 * File name: Cart.php
 * Date: 11/8/2016
 * Time: 3:58 PM
 */
class Cart
{
    public static function addProduct($id, $amount=1){
        $id = intval($id);
        //Create empty array
        $productsInCart = array();
        //If in the cart is items. Add item in array $productInCart
        if (isset($_SESSION['products'])) $productsInCart = $_SESSION['products'];
        //If item had add again, increase the amount
        if (array_key_exists($id, $productsInCart)){
            $productsInCart[$id] =  $productsInCart[$id]+$amount;
        } else {
            $productsInCart[$id] = $amount;
        }
        $_SESSION['products'] = $productsInCart;
        return self::countItems();
    }

    public static function clear()
    {
        if (isset($_SESSION['products'])) {
            unset($_SESSION['products']);
        }
    }
    
    public static function deleteItem($id){

        $productsInCart = self::getProducts();
        unset($productsInCart[$id]);
        $_SESSION['products'] = $productsInCart;
    }

    public static function getProducts(){
        if (isset($_SESSION['products'])) return $_SESSION['products'];
        return false;
    }

    public static function getTotalPrice($products){
        $productsInCart = self::getProducts();
        $total = 0;
        if ($productsInCart){
            foreach ($products as $item){
                $total += $item['price'] * $productsInCart[$item['id']];
            }
        }
        return $total;
    }

    public static function countItems(){
        if (isset($_SESSION['products'])) {
            $count = 0;
            foreach ($_SESSION['products'] as $id => $quantity) {
                $count = $count + $quantity;
            }
            return $count;
        } else {
            return 0;
        }
    }

}