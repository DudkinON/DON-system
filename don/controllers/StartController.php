<?php
/**
 * Created by Oleg Dudkin.
 * Project: CMS "DON e-Commerce"
 * File name: StartController.php
 * Date: 7/30/2017
 * Time: 8:17 AM
 */

class StartController
{
    public function actionIndex()
    {
        $is_db_exist = Db::isDbExist();
        if ($is_db_exist) $mysql_default_host = '127.0.0.1';
        if (!isset($host)) $host = false;
        if (!isset($db_name)) $db_name = false;
        if (!isset($db_user)) $db_user = false;
        if (!isset($db_password)) $db_password = false;

        if (isset($_POST['submit'])) {
            $create_db = array();
            $errors = array();
            $messages = array();
            $host = Functions::filter($_POST['host']);
            $db_name = Functions::filter($_POST['db_name']);
            $db_user = Functions::filter($_POST['db_user']);
            $db_password = Functions::filter($_POST['db_password']);

            if (empty($host)) $errors[] = 'The host field is empty';
            if (empty($db_name)) $errors[] = 'The database name field is empty';
            if (empty($db_user)) $errors[] = 'The database user field is empty';
            if (empty($db_password)) $errors[] = 'The database password field is empty';

            $db_bool = Db::checkDbName($host, $db_name, $db_user, $db_password);
            if (!$db_bool) {
                $errors[] = 'Could not connect to the database';
                $db_check_user = Db::checkUserNamePassword($host, $db_user, $db_password);
                if (!$db_check_user) {
                    if ($is_db_exist) $messages[] = 'detected: ' . substr($is_db_exist, 0, 19) . ' ...';
                    else $errors[] = 'MySQL database undetected';

                } else {
                    if ($db_name) $create_db[] = 'Database ' . $db_name . ' undetected. Create db: ' . $db_name . '? '
                        . '<div id="create"><button name="create" class="button button-main btn-width">yes</button></div>';
                }
            }
        }
        if (isset($_POST['create'])) {
            $errors = array();
            $host = Functions::filter($_POST['host']);
            $db_name = Functions::filter($_POST['db_name']);
            $db_user = Functions::filter($_POST['db_user']);
            $db_password = Functions::filter($_POST['db_password']);
            $result = Db::createDatabase($host, $db_name, $db_user, $db_password);

            if ($result) {
                $file = ROOT . '/' . SETTINGS_FILE;
                $data = '<?php';
                $data .= "\n\n\n/*********| Define settings MySQL data base |*********/\n";
                $data .= "define('HOST', '{$host}');\n";
                $data .= "define('DB_NAME', '{$db_name}');\n";
                $data .= "define('USER_DB', '{$db_user}');\n";
                $data .= "define('PASSWORD_DB', '{$db_password}');\n";
                file_put_contents($file, $data);
                header("Location: /");
            } else $errors[] = 'Error: database ' . $db_name . ' isn\'t created';
        }
        #include the view file
        require(ROOT . '/views/get_db_name.php');
        return true;
    }
}