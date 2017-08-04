<?php

/**
 * Copyright by Oleg Dudkin.
 * Project: www
 * File name: Blog.php
 * Date: 11/18/2016
 * Time: 12:14 PM
 */
class Blog
{
    public static function getArticlesList($page, $amount = AMOUNT_ARTICLES_BY_PAGE){
        $db = Db::getConnection();
        $offset = ($page - 1)*$amount;
        $sql = 'SELECT *'.' FROM `blog` '.'LIMIT :limit OFFSET :offset';
        $result = $db->prepare($sql);
        //$result->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
        $result->bindParam(':limit', $amount, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);
        $result->execute();
        $articlesList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $articlesList[$i]['id'] = $row['id'];
            $articlesList[$i]['date'] = $row['date'];
            $articlesList[$i]['name'] = $row['name'];
            $articlesList[$i]['description'] = $row['description'];
            $articlesList[$i]['image'] = $row['image'];
            $i++;
        }
        return $articlesList;
    }
    public static function getArticleById($id){
        $id = intval($id);
        if ($id){
            $db = Db::getConnection();
            $result = $db->query("SELECT *"."FROM `blog` "."WHERE id = " . $id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            return $result->fetch();
        } else {
            return null;
        }
    }
    public static function createArticle($article){
        $db =Db::getConnection();

        $sql = 'INSERT'.' INTO `blog` ( `category_id`, `name`, `description`, `full_text`, `date`, `image`)
        VALUES (:category_id, :name, :description, :full_text, NOW(), :image)';

        $result = $db->prepare($sql);

        $result->bindParam(':category_id', $article['category_id'], PDO::PARAM_INT);
        $result->bindParam(':name', $article['name'], PDO::PARAM_STR);
        $result->bindParam(':description', $article['description'], PDO::PARAM_STR);
        $result->bindParam(':full_text', $article['full_text'], PDO::PARAM_STR);
        $result->bindParam(':image', $article['image'], PDO::PARAM_STR);
        if ($result->execute()) {
            //If the request is successful, return the id the added record
            return true;
        }
        //Otherwise it returns false
        return false;
    }
    public static function getTotalArticles(){
        $db = Db::getConnection();
        $result = $db->query('SELECT count(id) AS count '.' FROM `blog` ');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        return $row['count'];
    }
    /**
     * @param $id
     * @param $article[] (array)
     * @return bool
     */
    public static function updateArticleById($id, $article) {
        $db = Db::getConnection();
        $sql = 'UPDATE'.' `blog`
            SET 
                `name` = :name,
                `category_id` = :category_id, 
                `description` = :description, 
                `full_text` = :full_text, 
                `image` = :image, 
                `author` = :author
            WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $article['name'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $article['category_id'], PDO::PARAM_INT);
        $result->bindParam(':description', $article['description'], PDO::PARAM_STR);
        $result->bindParam(':full_text', $article['full_text'], PDO::PARAM_STR);
        $result->bindParam(':image', $article['image'], PDO::PARAM_STR);
        $result->bindParam(':author', $article['author'], PDO::PARAM_STR);
        return $result->execute();
    }

    /**
     * @param $id
     * @return bool
     */
    public static function deleteArticleById($id) {
        #
        $db = Db::getConnection();
        $sql = 'DELETE'.' FROM `blog` WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }
}