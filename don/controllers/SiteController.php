<?php

class SiteController
{

    /**
     * TODO: site controller > action index
     * @return bool
     */
    public function actionIndex()
    {
        #get the titles and links of categories list
        $categories_default = Category::getCategoriesList();
        if (!empty($categories_default))  $categories = $categories_default;
        #get the list of recommended products
        $recommend = Product::getRecommendProduct();
        #get the list of last products
        $last_products_default = Product::getLatesProducts();
        if (!empty($last_products_default))  $last_products = $last_products_default;
        #include the view file
        require(ROOT . '/views/index.php');
        return true;
    }

    /**
     * TODO: site controller > action about
     * @return bool
     */
    public function actionAbout()
    {
        #get the titles and links of categories list
        $categories = Category::getCategoriesList();
        #include the view file
        require(ROOT . '/views/pages/about.php');
        return true;
    }

    public function actionContact()
    {
        #get the titles and links of categories list
        $categories = Category::getCategoriesList();
        #create the events switch
        $result = false;
        if (isset($_POST['submit'])) {
            #if exist array $_POST, define variables
            $userEmail = Functions::filter($_POST['userEmail']);
            $userName = Functions::filter($_POST['userName']);
            $userText = Functions::filter($_POST['userText']);
            $userSubject = Functions::filter($_POST['userSubject']);
            #create variable for array of errors and define it false
            $errors = false;
            #the validation of data
            if (!User::checkName($userName)) $errors[] = NAME_MORE;
            if (!User::checkText($userText)) $errors[] = MESSAGE_EMPTY;
            if (!User::checkEmail($userEmail)) $errors[] = VALID_EMAIL;
            #if variable $errors = false send message admin eMail
            if ($errors == false) {
                $adminEmail = ADMIN_EMAIL;
                $message = "From: {$userName} | {$userEmail} Message: {$userText}";
                $subject = $userSubject;
                $result = mail($adminEmail, $subject, $message);
                #change the events switch (start event)
                $result = true;
            }
        }
        #include the view file
        require(ROOT . '/views/pages/contact.php');
        return true;
    }

    public function actionLanguage($lang)
    {
        User::getUserLanguage($lang);
        $ref = $_SERVER['HTTP_REFERER'];
        header("Location: $ref");
        return true;
    }
}