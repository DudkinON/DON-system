<?php

/**
 * Copyright by Oleg Dudkin.
 * Project: zaat.16mb.com
 * File name: AdminProductController.php
 * Date: 11/14/2016
 * Time: 5:06 PM
 */
class AdminProductController extends AdminBase
{
    public function actionIndex($page = 1){
        self::checkAdmin();
        $total = Product::getTotalProducts();
        $productList = Product::getProductsList($page);
        $pagination = new Pagination($total, $page, COUNT_PROD_ADMIN, 'page-');
        require (ROOT.'/views/admin/product/index.php');
        return true;
    }
    
    public function actionCreate(){
        self::checkAdmin();

        $categoriesList = Category::getCategoriesListAdmin();
        $product['name'] = '';
        $product['code'] = '';
        $product['price'] = '';
        $product['category_id'] = '';
        $product['brand'] = '';
        $product['availability'] = '';
        $product['description'] = '';
        $product['is_new'] = '';
        $product['is_recommended'] = '';
        $product['status'] = '';
        
        if (isset($_POST['submit'])) {
            $image = $_FILES['image'];
            $maxSize = 1024*1024*MAX_SIZE_IMG;
            $type = '.'.str_replace("image/","",$image['type']);
            $imageName = md5(uniqid());
            $path = Functions::getPath($imageName);
            $fileName = Functions::getFileName($imageName);
            $fullPath = dirname(__FILE__).Functions::getPath($imageName);

            //If the form is sent to obtain the data from the form
            $product['name'] = Functions::filter($_POST['name']);
            $product['code'] = Functions::filter($_POST['code']);
            $product['price'] = Functions::filter($_POST['price']);
            $product['category_id'] = Functions::filter($_POST['category_id']);
            $product['brand'] = Functions::filter($_POST['brand']);
            $product['availability'] = Functions::filter($_POST['availability']);
            $product['description'] = Functions::filter($_POST['description']);
            $product['is_new'] = Functions::filter($_POST['is_new']);
            $product['is_recommended'] = Functions::filter($_POST['is_recommended']);
            $product['status'] = Functions::filter($_POST['status']);
            $product['image'] = md5(uniqid()).$type;

            $errors = false;

            if (!isset($product['name']) || empty($product['name'])) $errors[] = FILL_FIELDS;
            if (!isset($product['code']) || empty($product['code'])) $errors[] = FILL_FIELDS;
            if (!isset($product['price']) || empty($product['price'])) $errors[] = FILL_FIELDS;
            if (!isset($product['category_id']) || empty($product['category_id'])) $errors[] = FILL_FIELDS;
            if (!isset($product['brand']) || empty($product['brand'])) $errors[] = FILL_FIELDS;
            if (!isset($product['availability']) || empty($product['availability'])) $errors[] = FILL_FIELDS;
            if (!isset($product['description']) || empty($product['description'])) $errors[] = FILL_FIELDS;
            if (!isset($product['is_new']) || empty($product['is_new'])) $errors[] = FILL_FIELDS;
            if (!isset($product['is_recommended']) || empty($product['is_recommended'])) $errors[] = FILL_FIELDS;
            if (!isset($product['status']) || empty($product['status'])) $errors[] = FILL_FIELDS;
            if ($image['size']>$maxSize) $errors[] = TOO_BIG_IMG_SIZE;

                $pathImg = $_SERVER['DOCUMENT_ROOT']. '/server/image/'.$product['image'];
                if ($errors == false) {
                //If there are no errors add a new item
                if (move_uploaded_file($image["tmp_name"], $pathImg)) {
                    Product::createProduct($product);
                    }
                }
                //The admin is redirected to the page Management products
                    if (file_exists($pathImg)) header("Location: /admin/product/");
        }
        require (ROOT.'/views/admin/product/createProduct.php');
        return true;
    }

    public function actionUpdate($id){
        self::checkAdmin();
        $categoriesList = Category::getCategoriesListAdmin();
        $product = Product::getProductsById($id);

        if (isset($_POST['submit'])){

            $image = $_FILES['image'];
            $maxSize = 1024*1024*MAX_SIZE_IMG;
            $type = '.'.str_replace("image/","",$image['type']);
            
            $p['name'] = $_POST['name'];
            $p['category_id'] = $_POST['category_id'];
            $p['code'] = $_POST['code'];
            $p['price'] = $_POST['price'];
            $p['availability'] = $_POST['availability'];
            $p['brand'] = $_POST['brand'];
            $p['description'] = $_POST['description'];
            $p['is_new'] = $_POST['is_new'];
            $p['is_recommended'] = $_POST['is_recommended'];
            $p['status'] = $_POST['status'];
            $p['image'] = md5(uniqid()).$type;


            if (!isset($product['name'])) $errors[] = FILL_FIELDS.'name';
            if (!isset($product['code'])) $errors[] = FILL_FIELDS.'code';
            if (!isset($product['price'])) $errors[] = FILL_FIELDS.'price';
            if (!isset($product['category_id'])) $errors[] = FILL_FIELDS.'category_id';
            if (!isset($product['brand'])) $errors[] = FILL_FIELDS.'brand';
            if (!isset($product['availability'])) $errors[] = FILL_FIELDS.'availability';
            if (!isset($product['description'])) $errors[] = FILL_FIELDS.'description';
            if (!isset($product['is_new'])) $errors[] = FILL_FIELDS.'is_new';
            if (!isset($product['is_recommended'])) $errors[] = FILL_FIELDS.'is_recommended';
            if (!isset($product['status'])) $errors[] = FILL_FIELDS.'status';
            if ($image['size']>$maxSize) $errors[] = TOO_BIG_IMG_SIZE;

            $path_old = $_SERVER['DOCUMENT_ROOT'].'/server/image/'.$product['image'];
            $pathImg = $_SERVER['DOCUMENT_ROOT'].'/server/image/'.$p['image'];

            if (is_uploaded_file($image["tmp_name"])){
                move_uploaded_file($image["tmp_name"], $pathImg);
                if (file_exists($pathImg)) {
                    if (file_exists($path_old)) unlink($path_old);
                    Product::updateProductById($id, $p);
                    header("Location: /admin/product");
                    exit;
                }
            }

        }
        require (ROOT.'/views/admin/product/updateProduct.php');
        return true;
    }

    public function actionDelete($id){
        self::checkAdmin();
        $product = Product::getProductsById($id);
        if (isset($_POST['submit'])) {
            $path = $_SERVER['DOCUMENT_ROOT'].'/server/image/'.$product['image'];
            if (file_exists($path)) unlink($path);
            Product::deleteProductById($id);
            header("Location: /admin/product");
        }
        require (ROOT.'/views/admin/product/deleteProduct.php');
        return true;
    }

}