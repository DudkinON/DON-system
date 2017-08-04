<?php

/**
 * Copyright by Oleg Dudkin.
 * Project: zaat.16mb.com
 * File name: BlogController.php
 * Date: 11/17/2016
 * Time: 6:15 PM
 */
class BlogController
{
    public function actionIndex($page = 1){
        #get blog categories
        $blogCategories = Category::getBlogCategories();
        #get articles list
        $articles = Blog::getArticlesList($page, AMOUNT_ARTICLES_BY_PAGE);
        #get amount articles
        $total = Blog::getTotalArticles();
        #create an instance of the page navigation class
        $pagination = new Pagination($total, $page, AMOUNT_ARTICLES_BY_PAGE, 'page-');
        #include the view file
        require(ROOT.'/views/blog/index.php');
        return true;
    }

    public function actionArticle($id){
        #get blog categories
        $blogCategories = Category::getBlogCategories();
        #get blog an article
        $article = Blog::getArticleById($id);
        #create variable for title
        $title = $article['name'];
        #create variable for description
        $description = $article['description'];
        #if author of the article exist show author name
        if ($article['author'] !== NULL) $author = $article['author'];
        #esle output the site name
        else $author = SITENAME;
        #include the view file
        require(ROOT.'/views/blog/article.php');
        return true;
    }
    public function actionCategory($id){
        
        return true;
    }
}