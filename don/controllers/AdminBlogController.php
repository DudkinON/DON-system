<?php
/**
 * Copyright by Oleg Dudkin.
 * Project: CMS "DON e-Commerce"
 * File name: AdminBlogController.php
 * Date: 3/9/2017
 * Time: 7:55 AM
 */
class AdminBlogController extends AdminBase
{
    /**
     * @controller AdminBlog
     * @action Index
     * @param int $page
     * @return bool
     */
    public function actionIndex($page = 1){
        self::checkAdmin();
        $total = Blog::getTotalArticles();
        $articlesList = Blog::getArticlesList($page, COUNT_ARTICLES_ADMIN);
        $pagination = new Pagination($total, $page, COUNT_ARTICLES_ADMIN, 'page-');
        require (ROOT.'/views/admin/blog/index.php');
        return true;
    }

    /**
     * @controller AdminBlog
     * @action Create
     * @return bool
     */
    public function actionCreate(){
        self::checkAdmin();
        $categories = Category::getBlogCategories();
        if (isset($_POST['submit'])){
            $errors = false;
            $article = array();
            $maxSize = 1024*1024*MAX_SIZE_IMG;
            $image = $_FILES['img'];
            $type = '.'.str_replace("image/","",$image['type']);
            $article['category_id'] = $_POST['category_id'];
            $article['name'] = $_POST['title'];
            $article['description'] = $_POST['description'];
            $article['full_text'] = $_POST['text'];
            $article['author'] = $_POST['author'];

            $uniqueName = Functions::getUniqueName($type);
            $language = Language::getLanguage();
            $imgFile = $image['tmp_name'];

            $article['image'] = $uniqueName['path_file_type'];
            $q = Blog::createArticle($article);
            if ($q===true){
                if (!mkdir($uniqueName['full_path'], 0777, true))  $errors[] =  $language['error_create_folder'];
                if ($image['size']>$maxSize) $errors[] = $language['too_big_img_size'];
                list($width, $height) = getimagesize($imgFile);
                if ($width<800&&$height<800){
                    if (!file_exists($uniqueName['root_path_file_type'])) {
                        if (!move_uploaded_file($imgFile, $uniqueName['root_path_file_type'])) $errors[] = $language['error_upload_file'];
                    } else {$errors[] = $language['error_upload_file'];}
                } else {
                    if (!Functions::resizeImage($imgFile, $uniqueName['root_path_file_type'], 800, 800)) $errors[] = $language['error_upload_file'];
                }
                if (file_exists($uniqueName['root_path_file_type'])) header("Location: /admin/blog");
            }
        }
        require (ROOT.'/views/admin/blog/create.php');
        return true;
    }
    /**
     * @controller AdminBlog
     * @action Update
     * @param $id
     * @return bool
     */
    public function actionUpdate($id) {
        self::checkAdmin();
        $categories = Category::getBlogCategories();
        $article = Blog::getArticleById($id);
        if (isset($_POST['article'])){
            $oldImage = ROOT.$article['image'];
            $errors = false;
            $articleUpdate = array();
            $maxSize = 1024*1024*MAX_SIZE_IMG;
            $image = $_FILES['img'];
            $type = '.'.str_replace("image/","",$image['type']);
            $articleUpdate['category_id'] = $_POST['category_id'];
            $articleUpdate['name'] = $_POST['name'];
            $articleUpdate['description'] = $_POST['description'];
            $articleUpdate['full_text'] = $_POST['full_text'];
            $articleUpdate['author'] = $_POST['author'];

            $uniqueName = Functions::getUniqueName($type);
            $language = Language::getLanguage();
            $imgFile = $image['tmp_name'];

            $articleUpdate['image'] = $uniqueName['path_file_type'];
            $q = Blog::updateArticleById($id, $articleUpdate);
            if ($q===true){
                unlink($oldImage);
                if (!mkdir($uniqueName['full_path'], 0777, true))  $errors[] =  $language['error_create_folder'];
                if ($image['size']>$maxSize) $errors[] = $language['too_big_img_size'];
                list($width, $height) = getimagesize($imgFile);
                if ($width<800&&$height<800){
                    if (!file_exists($uniqueName['root_path_file_type'])) {
                        if (!move_uploaded_file($imgFile, $uniqueName['root_path_file_type'])) $errors[] = $language['error_upload_file'];
                    } else {$errors[] = $language['error_upload_file'];}
                } else {
                    if (!Functions::resizeImage($imgFile, $uniqueName['root_path_file_type'], 800, 800)) $errors[] = $language['error_upload_file'];
                }
                if (file_exists($uniqueName['root_path_file_type'])) header("Location: /admin/blog");
            } else {
                $errors[] = 'Error update database';
            }
        }
        require (ROOT.'/views/admin/blog/update.php');
        return true;
    }

    /**
     * @controller AdminBlog
     * @action Delete
     * @param $id
     * @return bool
     */
    public static function actionDelete($id) {
        self::checkAdmin();
        $article = Blog::getArticleById($id);
        if (isset($_POST['submit'])) {
            $path = ROOT.$article['image'];
            if (file_exists($path)) unlink($path);
            Blog::deleteArticleById($id);
            header("Location: /admin/blog");
        }
        require (ROOT.'/views/admin/blog/delete.php');
        return true;
    }
}