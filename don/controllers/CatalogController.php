<?php

class CatalogController
{
    public function actionIndex($page = 1) {
        #

        $total = Product::getTotalProducts();
        $categories = Category::getCategoriesList();
        $lastProducts = Product::getProductsList($page, COUNT_PRODUCT);
        $pagination = new Pagination($total, $page, COUNT_PRODUCT, 'page-');
        require (ROOT.'/views/catalog/index.php');
        return true;
    }
    public function actionCategory($categoryID, $page = 1){
        #
        $categories = Category::getCategoriesList();
        $categoryProducts = Product::getProductsListByCategory($categoryID, $page);
        $total = Product::getTotalProductsInCategory($categoryID);
        $pagination = new Pagination($total, $page, COUNT_PRODUCT, 'page-');
        require (ROOT.'/views/catalog/category.php');
        return true;
    }
}
