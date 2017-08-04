<?php
/**
 * Copyright by Oleg Dudkin.
 * Project: www
 * File name: ProductController.php
 * Date: 11/14/2016
 * Time: 4:34 PM
 */
class ProductController
{
    public function actionView($productId){
        $categories = Category::getCategoriesList();
        $products = Product::getProductsById($productId);
        require (ROOT.'/views/product/index.php');
        return true;
    }
}