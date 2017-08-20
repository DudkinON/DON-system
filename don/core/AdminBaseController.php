<?php
/**
 * Created by Oleg Dudkin.
 * Project: "DON" - framework
 * File name: AdimnBaseController.php
 * Date: 8/6/2017
 * Time: 11:54 AM
 */

namespace don\core;


class AdminBaseController extends Base
{
    /**
     * TODO: check MySQL
     * @return bool
     */
    protected function checkMySQL()
    {
        return Database::isMySQLdb();
    }

    /**
     *
     */
    protected function isAdmin()
    {
        if (!$_SESSION['admin']) Functions::redirect('/');
    }

    /**
     * TODO: Create db and configure
     * @param $settings
     * @return array
     */
    protected function configurationDb($settings)
    {
        $language = LocalisationAdmin::get_language();
        $errors = array();
        if (Db::checkDbName($settings['host'], $settings['db_name'], $settings['db_user'], $settings['db_password']))
        {
            if (Db::createUsersDb($settings))
            {
                if (FileManager::createDbConfig($settings))
                {
                    Functions::redirect('/user/login');
                }
                else
                {
                    $errors[] = $language['error_create_file'];
                    return $errors;
                }
            }
            else
            {
                $errors[] = $language['error_create_table'] . $settings['db_name'];
                return $errors;
            }
        }
        else
        {
            if (Db::checkUserNamePassword($settings['host'], $settings['db_user'], $settings['db_password']))
            {
                if ($settings['super_user_password'] !== $settings['s_u_password_confirm'])
                {
                    $errors[] = $language['error_passwords_not_match'];
                    return $errors;
                }
                else
                {

                    if (Db::createDatabase($settings))
                    {
                        if (FileManager::createDbConfig($settings))
                        {
                            Functions::redirect('/user/login');
                        }
                        else
                        {
                            $errors[] = $language['error_create_file'];
                            return $errors;
                        }
                    }
                    else
                    {
                        $errors[] = $language['error_connect_db'];
                        return $errors;
                    }
                }
            }
            else
            {
                $errors[] = $language['error_connect_db'];
                $errors[] = $language['check_user_password'];
                return $errors;
            }
        }
        return $errors;
    }
}