<?php

/**
 * Copyright by Oleg Dudkin.
 * Project: www
 * File name: AdminCategoryController.php
 * Date: 2/26/2017
 * Time: 7:11 AM
 */
class AdminCategoryController extends AdminBase
{
    public function actionIndex(){
        self::checkAdmin();
        $categories = Category::getCategoriesListAdmin();

        require (ROOT.'/views/admin/categories/index.php');
        return true;
    }
    public function actionCreate(){
        self::checkAdmin();
        $category = array();
        $category['name'] = '';
        $msg = false;
        $category['sort'] = (Category::getTotalCategories()+1);
        $category['status'] = 1;
        if (isset($_POST['submit'])){
            $sort = Category::checkSortCategory($_POST['sort']);
            $category['name'] = Functions::filter($_POST['name']);
            $category['sort'] = ((int)$_POST['sort']);
            $category['status'] = Functions::filter((int)$_POST['status']);
            if (User::checkName($_POST['name']) === false) $msg[] = 'Too short title: <b class="red">'.$_POST['name'].'</b>';
            if ($sort === true) $msg[] = 'This number using category: <b class="red">'.$sort['name'].'</b>';
            if (((int)$_POST['status']) > 1) $msg[] = '<b class="red">Status can be show or hide</b>'; 
            if ($msg === false){
                $create = Category::createCategory($category);
                if ($create === true) {
                    header("Location: /admin/category");
                    exit;
                }
            }
        }
        require (ROOT.'/views/admin/categories/createCategory.php');
        return true;
    }
    public function actionUpdate($id){
        self::checkAdmin();
        $category = Category::getCategoryById($id);
        if (isset($_POST['submit'])){
            $cat['name'] = Functions::filter($_POST['name']);
            $cat['sort_order'] = Functions::filter((int)$_POST['sort']);
            $cat['status'] = Functions::filter((int)$_POST['status']);
            $errors = false;

            if (!isset($cat['name'])) $errors[] = FILL_FIELDS.'name';
            if (!isset($cat['sort_order'])) $errors[] = FILL_FIELDS.'sort_order';
            if (!isset($cat['status'])) $errors[] = FILL_FIELDS.'status';

            if ($errors === false){
                Category::updateCategoryById($id, $cat);
                header("Location: /admin/category");
                exit;
            }
        }
        require (ROOT.'/views/categories/updateCategory.php');
        return true;
    }
    public function actionDelete($id){
        self::checkAdmin();
        $category = Category::getCategoryById($id);
        if (isset($_POST['submit'])) {
            Category::deleteCategoryById($id);
            header("Location: /admin/category");
            exit;
        }
        require_once (ROOT.'/views/admin/categories/deleteCategory.php');
        return true;        
    }
}