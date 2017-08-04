<?php

class Product
{
    //const SHOW_BY_DEFAULT = COUNT_PRODUCT;

    public static function getLatesProducts($count = COUNT_PRODUCT){
        $count = intval($count);
        $productsList = array();
        $db =Db::getConnection();
        if ($db) {
            $result = $db->query('SELECT * '
                .'FROM `product` '
                .'WHERE status = "1" '
                .'ORDER BY id DESC '
                .' LIMIT '.COUNT_PRODUCT
            );

            $i = 0;
            while ($row = $result->fetch()){
                $productsList[$i]['id'] = $row['id'];
                $productsList[$i]['name'] = $row['name'];
                $productsList[$i]['image'] = $row['image'];
                $productsList[$i]['price'] = $row['price'];
                $productsList[$i]['is_new'] = $row['is_new'];
                $i++;
            }
        }
        return $productsList;
    }

    public static function getProductsList($page, $count = COUNT_PROD_ADMIN){
        $count = intval($count);

        $page = intval($page);
        $offset = ($page - 1)*$count;

        $db = Db::getConnection();
        $categoryList = array();
        $result = $db->query("SELECT *"
            ."FROM `product`"
            ."WHERE status = '1'"
            ."ORDER BY id ASC"
            ." LIMIT ".$count
            .' OFFSET '.$offset);

        $i = 0;
        while ($row = $result->fetch()){
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $categoryList[$i]['image'] = $row['image'];
            $categoryList[$i]['price'] = $row['price'];
            $categoryList[$i]['is_new'] = $row['is_new'];
            $i++;
        }
        return $categoryList;
    }

    public static function getProductsListByCategory($categoryID = false, $page){
        if ($categoryID){
            $page = intval($page);
            $offset = ($page - 1)*COUNT_PRODUCT;

            $db = Db::getConnection();
            $categoryList = array();
            $result = $db->query("SELECT * "
                ."FROM `product` "
                ."WHERE status = '1' AND category_id = '$categoryID' "
                ."ORDER BY id ASC "
                ." LIMIT ".COUNT_PRODUCT
                .' OFFSET '.$offset);

            $i = 0;
            while ($row = $result->fetch()){
                $categoryList[$i]['id'] = $row['id'];
                $categoryList[$i]['name'] = $row['name'];
                $categoryList[$i]['image'] = $row['image'];
                $categoryList[$i]['price'] = $row['price'];
                $categoryList[$i]['is_new'] = $row['is_new'];
                $i++;
            }
            return $categoryList;
        } else {
            return null;
        }

    }

    public static function getProductByIDforAdmin($id){

        if ($id){
            $db = Db::getConnection();
            $product = array();
            $result = $db->query('SELECT *'
                .'FROM `product`'
                .'WHERE id = '.$id);

            $i = 0;
            while ($row = $result->fetch()){
                $product[$i]['id'] = $row['id'];
                $product[$i]['name'] = $row['name'];
                $product[$i]['image'] = $row['image'];
                $i++;
            }

            return $product;
        } else {
            return null;
        }

    }

    public static function getProductsById($id)
    {
        $id = intval($id);
        if ($id){
            $db =Db::getConnection();
            $result = $db->query("SELECT *"."FROM `product` "."WHERE id = ".$id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            return $result->fetch();
        } else {
            return null;
        }
    }

    public static function getTotalProducts(){
        $db = Db::getConnection();
        $result = $db->query('SELECT count(id) AS count '.' FROM product '.'WHERE status = "1"');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        return $row['count'];
    }

    public static function getTotalProductsInCategory($categoryID){
        $db = Db::getConnection();
        $result = $db->query('SELECT count(id) AS count '.' FROM product '
                            .'WHERE status = "1" AND category_id = "'.$categoryID.'"');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        return $row['count'];
    }

    public static function getRecommendProduct(){
        $itemList = array();
        $db = Db::getConnection();
        if ($db) {

            $result = $db->query("SELECT *"."FROM `product`"."WHERE status = '1' AND is_recommended = '1' "."ORDER BY id DESC");
            $i = 0;

            while ($row = $result->fetch()) {
                $itemList[$i]['id'] = $row['id'];
                $itemList[$i]['name'] = $row['name'];
                $itemList[$i]['price'] = $row['price'];
                $itemList[$i]['is_new'] = $row['is_new'];
                $itemList[$i]['image'] = $row['image'];
                $i++;
            }
        }
        return $itemList;
    }

    /**
     * Adds a new item
     * @param array $product <p>An array of information about the product</p>
     * @return integer <p>id added to the record table</p>
     */
    public static function createProduct($product) {
        //Connect to data base
        $db = Db::getConnection();

        //Preparation of a database query
        $sql = 'INSERT'.' INTO  `product` (  `name` ,  `code` ,  `price` ,  `category_id` ,  `brand` ,  `availability` ,  `description` ,  `is_new` ,  `is_recommended` ,  `status` ,  `image` )'
            . 'VALUES '
            . "(:name, :code, :price, :category_id, :brand, :availability, "
            . ":description, :is_new, :is_recommended, :status, :image)";

        //Receipt and return results. Use prepared query
        $result = $db->prepare($sql);
        $result->bindParam(':name', $product['name'], PDO::PARAM_STR);
        $result->bindParam(':code', $product['code'], PDO::PARAM_STR);
        $result->bindParam(':price', $product['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $product['category_id'], PDO::PARAM_INT);
        $result->bindParam(':brand', $product['brand'], PDO::PARAM_STR);
        $result->bindParam(':availability', $product['availability'], PDO::PARAM_INT);
        $result->bindParam(':description', $product['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $product['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $product['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':status', $product['status'], PDO::PARAM_INT);
        $result->bindParam(':image', $product['image'], PDO::PARAM_STR);
        if ($result->execute()) {
            //If the request is successful, return the id the added record
            return true;
        }
        //Otherwise it returns 0
        return false;
    }

    public static function updateProductById($id, $p)
    {
        $db = Db::getConnection();

        $sql = 'UPDATE'.' `product`
            SET 
                `name` = :name, 
                `code` = :code, 
                `price` = :price, 
                `category_id` = :category_id, 
                `brand` = :brand, 
                `availability` = :availability, 
                `description` = :description, 
                `is_new` = :is_new, 
                `is_recommended` = :is_recommended, 
                `status` = :status,
                `image` = :image 
            WHERE id = :id';


        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $p['name'], PDO::PARAM_STR);
        $result->bindParam(':code', $p['code'], PDO::PARAM_STR);
        $result->bindParam(':price', $p['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $p['category_id'], PDO::PARAM_INT);
        $result->bindParam(':brand', $p['brand'], PDO::PARAM_STR);
        $result->bindParam(':availability', $p['availability'], PDO::PARAM_INT);
        $result->bindParam(':description', $p['description'], PDO::PARAM_STR);
        $result->bindParam(':is_new', $p['is_new'], PDO::PARAM_INT);
        $result->bindParam(':is_recommended', $p['is_recommended'], PDO::PARAM_INT);
        $result->bindParam(':status', $p['status'], PDO::PARAM_INT);
        $result->bindParam(':image', $p['image'], PDO::PARAM_STR);
        return $result->execute();
    }

    public static function deleteProductById($id)
    {
        $db = Db::getConnection();

        $sql = 'DELETE'.' FROM product WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }
    public static function getTotalProductsAll(){
        $db = Db::getConnection();
        $result = $db->query('SELECT count(id) AS count '.' FROM product ');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        return $row['count'];
    }
    public static function getProductsByIds($idsArray) {
        $db = Db::getConnection();
        $idsString = implode(',', $idsArray);
        $sql = 'SELECT *'." FROM product WHERE status='1' AND id IN ($idsString)";
        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $i = 0;
        $products = array();
        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['code'] = $row['code'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $i++;
        }
        return $products;
    }
    public static function getProductByVendorCode($vc){
        $vc = intval($vc);
        if ($vc){
            $db =Db::getConnection();
            $result = $db->query('SELECT *'.'FROM `product` '.'WHERE `code` = '.$vc);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            return $result->fetch();
        } else {
            return null;
        }
    }
}