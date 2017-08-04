<?php

class Category
{
    public static function getCategoriesList()
    {
        $categoryList = array();
        $db = Db::getConnection();
        if ($db) {

            $result = $db->query('SELECT * ' . 'FROM `category` WHERE `status` = "1"');

            $i = 0;
            while ($row = $result->fetch()) {
                $categoryList[$i]['id'] = $row['id'];
                $categoryList[$i]['name'] = $row['name'];
                $categoryList[$i]['name_ru'] = $row['name_ru'];
                $i++;
            }
        }
        return $categoryList;
    }

    public static function getCategoriesListAdmin()
    {
        //Connection to data base
        $db = Db::getConnection();

        //Query to data base
        $result = $db->query('SELECT *' . ' FROM `category` ORDER BY sort_order ASC');

        //Get and back result
        $categoryList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $categoryList[$i]['sort_order'] = $row['sort_order'];
            $categoryList[$i]['status'] = $row['status'];
            $i++;
        }
        return $categoryList;
    }

    public static function getTitleCategory($categoryId = false)
    {
        if ($categoryId) {
            $db = Db::getConnection();

            $categoryList = array();

            $result = $db->query('SELECT * ' . 'FROM `category`' . 'WHERE category_id = ' . $categoryId);

            $i = 0;
            while ($row = $result->fetch()) {
                $categoryList[$i]['id'] = $row['id'];
                $categoryList[$i]['name'] = $row['name'];
                $i++;
            }

            return $categoryList;
        }
        return null;
    }

    public static function getBlogCategories()
    {

        $db = Db::getConnection();

        $categoryList = array();

        $result = $db->query('SELECT * ' . 'FROM `blog_categories`');

        $i = 0;
        while ($row = $result->fetch()) {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $categoryList[$i]['name_ru'] = $row['name_ru'];
            $i++;
        }
        return $categoryList;
    }

    public static function getTotalCategories()
    {
        $db = Db::getConnection();
        $result = $db->query('SELECT count(id) AS count ' . ' FROM category');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        return $row['count'];
    }

    public static function checkSortCategory($sort)
    {
        $db = Db::getConnection();
        $result = $db->query('SELECT * ' . 'FROM `category`' . ' WHERE sort_order = ' . $sort);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        if ($row !== 0) return $row;
        return false;
    }

    public static function createCategory($product)
    {
        //Connect to data base
        $db = Db::getConnection();

        //Preparation of a database query
        $sql = 'INSERT' . ' INTO  `category` (`name`,  `sort_order`, `status`)'
            . 'VALUES ' . '(:name, :sort_order, :status)';

        //Receipt and return results. Use prepared query
        $result = $db->prepare($sql);
        $result->bindParam(':name', $product['name'], PDO::PARAM_STR);
        $result->bindParam(':sort_order', $product['sort'], PDO::PARAM_INT);
        $result->bindParam(':status', $product['status'], PDO::PARAM_INT);
        if ($result->execute()) {
            //If the request is successful, return the id the added record
            return true;
        }
        //Otherwise it returns 0
        return false;
    }

    public static function getCategoryById($id)
    {
        $id = intval($id);
        if ($id) {
            $db = Db::getConnection();
            $result = $db->query("SELECT * " . "FROM `category` " . "WHERE id = " . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            return $result->fetch();
        } else {
            return null;
        }
    }

    public static function updateCategoryById($id, $p)
    {
        $db = Db::getConnection();
        $sql = 'UPDATE' . ' `category` SET `name` = :name, `sort_order` = :sort_order, `status` = :status WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $p['name'], PDO::PARAM_STR);
        $result->bindParam(':sort_order', $p['sort_order'], PDO::PARAM_INT);
        $result->bindParam(':status', $p['status'], PDO::PARAM_INT);
        return $result->execute();
    }

    public static function deleteCategoryById($id)
    {
        $db = Db::getConnection();
        $sql = 'DELETE' . ' FROM `category` WHERE `category`.`id` = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }
}