<?php

/**
 * Copyright by Oleg Dudkin.
 * Project: CMS "DON e-Commerce"
 * File name: Order.php
 * Date: 11/5/2016
 * Time: 7:29 AM
 */
class Order
{
    /**
     * Save the order in database
     * @param $order (array)
     * @param $userID
     * @param $products (JSON)
     * @return bool
     */
    public static function saveOrder($order, $userID, $products){
        #JSON encode to $products array
        $products = json_encode($products);
        #connect to database
        $db = Db::getConnection();
        #prepare SQL query
        $sql = 'INSERT'.' INTO product_order'
        .'(user_name, user_phone, user_email, user_country, user_state, user_city, user_street, 
                                    user_house, user_apartment, user_comment, user_id, products)'
        .'VALUES '
        .'(:user_name, :user_phone, :user_email, :user_country, :user_state, :user_city, :user_street, 
                                    :user_house, :user_apartment, :user_comment, :user_id, :products)';
        $result = $db->prepare($sql);
        #define variable $null
        $null = NULL;
        #binding the parameters
        $result->bindParam(':user_name', $order['user_name'], PDO::PARAM_STR);
        $result->bindParam(':user_phone', $order['user_phone'], PDO::PARAM_STR);
        $result->bindParam(':user_email', $order['user_email'], PDO::PARAM_STR);
        #check the constant USE_COUNTRY and define parameter: country
        if (USE_COUNTRY === true) $result->bindParam(':user_country', $order['user_country'], PDO::PARAM_STR);
        else $result->bindParam(':user_country', $null, PDO::PARAM_STR);
        $result->bindParam(':user_state', $order['user_state'], PDO::PARAM_STR);
        $result->bindParam(':user_city', $order['user_city'], PDO::PARAM_STR);
        $result->bindParam(':user_street', $order['user_street'], PDO::PARAM_STR);
        $result->bindParam(':user_house', $order['user_house'], PDO::PARAM_STR);
        $result->bindParam(':user_apartment', $order['user_apartment'], PDO::PARAM_STR);
        $result->bindParam(':user_comment', $order['user_comment'], PDO::PARAM_STR);
        $result->bindParam(':user_id', $userID, PDO::PARAM_STR);
        $result->bindParam(':products', $products, PDO::PARAM_STR);
        #execute and return the bool value: true if success
        return $result->execute();
    }

    /**
     * Return total number of orders
     * @return number
     */
    public static function getTotalOrders(){
        #connect to database
        $db = Db::getConnection();
        #prepare and execute the query to database
        $result = $db->query('SELECT count(id) AS count '.' FROM `product_order` ');
        #set the fetch mode as: fetch assoc
        $result->setFetchMode(PDO::FETCH_ASSOC);
        #get array and return number of orders
        $row = $result->fetch();
        return $row['count'];
    }

    /**
     * Return the list of orders
     * @param int $count
     * @return array
     */
    public static function getOrdersList($count = COUNT_ORDERS_ADMIN) {
        #Get the integer value of a variable: $count
        $count = intval($count);
        #connect to database
        $db = Db::getConnection();
        #define array: $orderList
        $orderList = array();
        #prepare and execute the query to database
        $result = $db->query('SELECT * '
            . 'FROM `product_order` '
            . 'ORDER BY id DESC '
            . ' LIMIT ' . $count
        );
        #starting the loop and binding the array
        $i = 0;
        while ($row = $result->fetch()){
            $orderList[$i]['id'] = $row['id'];
            $orderList[$i]['user_name'] = $row['user_name'];
            $orderList[$i]['user_country'] = $row['user_country'];
            $orderList[$i]['user_state'] = $row['user_state'];
            $orderList[$i]['user_city'] = $row['user_city'];
            $orderList[$i]['user_street'] = $row['user_street'];
            $orderList[$i]['user_house'] = $row['user_house'];
            $orderList[$i]['user_apartment'] = $row['user_apartment'];
            $orderList[$i]['user_phone'] = $row['user_phone'];
            $orderList[$i]['user_comment'] = $row['user_comment'];
            $orderList[$i]['user_id'] = $row['user_id'];
            $orderList[$i]['date'] = $row['date'];
            $orderList[$i]['products'] = $row['products'];
            $orderList[$i]['status'] = $row['status'];
            $i++;
        }
        #return the list of orders in array: $orderList
        return $orderList;
    }

    /**
     * Update order by id
     * @param $order
     * @return bool
     */
    public static function updateOrderById($order){
        #connect to database
        $db = Db::getConnection();
        #prepare SQL query
        $sql = 'UPDATE'.' `product_order`
            SET 
                `user_name` = :user_name, 
                `user_phone` = :user_phone, 
                `user_email` = :user_email, 
                `user_country` = :user_country, 
                `user_state` = :user_state, 
                `user_city` = :user_city, 
                `user_street` = :user_street, 
                `user_house` = :user_house, 
                `user_apartment` = :user_apartment, 
                `status` = :status,
                `user_comment` = :user_comment
            WHERE id = :id';
        $result = $db->prepare($sql);
        #binding the parameters
        $result->bindParam(':id', $order['id'], PDO::PARAM_INT);
        $result->bindParam(':user_name', $order['user_name'], PDO::PARAM_STR);
        $result->bindParam(':user_phone', $order['user_phone'], PDO::PARAM_STR);
        $result->bindParam(':user_email', $order['user_email'], PDO::PARAM_STR);
        $result->bindParam(':user_country', $order['user_country'], PDO::PARAM_INT);
        $result->bindParam(':user_state', $order['user_state'], PDO::PARAM_STR);
        $result->bindParam(':user_city', $order['user_city'], PDO::PARAM_INT);
        $result->bindParam(':user_street', $order['user_street'], PDO::PARAM_STR);
        $result->bindParam(':user_house', $order['user_house'], PDO::PARAM_INT);
        $result->bindParam(':user_apartment', $order['user_apartment'], PDO::PARAM_INT);
        $result->bindParam(':status', $order['status'], PDO::PARAM_INT);
        $result->bindParam(':user_comment', $order['user_comment'], PDO::PARAM_STR);
        #return the bool value: true if success
        return $result->execute();
    }

    /**
     * Show order by id
     * @param $id
     * @return array
     */
    public static function getOrderById($id) {
        #connect to database
        $db = Db::getConnection();
        #prepare SQL query
        $sql = 'SELECT *'.' FROM `product_order` WHERE id = :id';
        $result = $db->prepare($sql);
        #binding the parameter :id
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        #set the fetch mode as: fetch assoc
        $result->setFetchMode(PDO::FETCH_ASSOC);
        #execute and return array
        $result->execute();
        return $result->fetch();
    }

    /**
     * Delete order by id
     * @param $id
     * @return bool
     */
    public static function deleteOrderById($id)  {
        #connect to database
        $db = Db::getConnection();
        #prepare SQL query
        $sql = 'DELETE'.' FROM `product_order` WHERE id = :id';
        $result = $db->prepare($sql);
        #binding the parameter :id
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        #return the bool value: true if success
        return $result->execute();
    }
}