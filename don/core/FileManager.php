<?php
/**
 * Created by Oleg Dudkin.
 * Project: "DON" - framework
 * File name: FileManager.php
 * Date: 8/12/2017
 * Time: 10:30 PM
 */

namespace don\core;


class FileManager
{
    public static function createDbConfig($settings)
    {
        $file = BASE_DIR . '/db.php';
        $data = '<?php';
        $data .= "\n\n\n/*********| Define settings MySQL data base |*********/\n";
        $data .= "define('HOST', '{$settings['host']}');\n";
        $data .= "define('DB_NAME', '{$settings['db_name']}');\n";
        $data .= "define('USER_DB', '{$settings['db_user']}');\n";
        $data .= "define('PASSWORD_DB', '{$settings['db_password']}');\n";

        file_put_contents($file, $data);
        if (file_exists($file)) return true;
        else return false;
    }
}