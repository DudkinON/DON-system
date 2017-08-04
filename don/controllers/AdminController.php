<?php

/**
 * Copyright by Oleg Dudkin.
 * Project: www
 * File name: AdminController.php
 * Date: 11/14/2016
 * Time: 4:28 PM
 */
class AdminController extends AdminBase
{
    public function actionIndex(){
        self::checkAdmin();
        function get_server_cpu_usage(){

            $load = sys_getloadavg();
            return $load[0];

        }
        function get_server_memory_usage(){
            $free = shell_exec('free');
            $free = (string)trim($free);
            $free_arr = explode("\n", $free);
            $mem = explode(" ", $free_arr[1]);
            $mem = array_filter($mem);
            $mem = array_merge($mem);
            $memory_usage = $mem[2]/$mem[1]*100;
            return $memory_usage;
        }
        function getInfoMySQL($e){
            $db = Db::getConnection();
            $attributes = array(
                "AUTOCOMMIT", "ERRMODE", "CASE", "CLIENT_VERSION", "CONNECTION_STATUS",
                "ORACLE_NULLS", "PERSISTENT", "PREFETCH", "SERVER_INFO", "SERVER_VERSION",
                "TIMEOUT"
            );
            return $db->getAttribute(constant("PDO::ATTR_$e"));
        }
        $data = [];
        $data['php_os'] = php_uname();
        $data['phpversion'] = phpversion();
        $data['memory'] = round(((memory_get_peak_usage()/1024)/1024), 2).' mb';
        $data['zend_version'] = zend_version();
        $data['get_server_cpu_usage'] = get_server_cpu_usage().'%';
        $data['get_server_memory_usage'] = round(get_server_memory_usage(), 2).' mb';
        $data['mysql_product_amount'] = Product::getTotalProductsAll();
        if (getInfoMySQL('CONNECTION_STATUS') == true) $data['mysql_status'] = '<b style="color: green">active</b>';
        else $data['mysql_status'] = '<b style="color: grey">ofline</b>';
        $data['mysql_version'] = getInfoMySQL('SERVER_VERSION');
        $data['mysql_server_info'] = getInfoMySQL('SERVER_INFO');
        $data['mysql_error'] = getInfoMySQL('ERRMODE');
        $data['mysql_product_amount'] = Product::getTotalProductsAll();
        $data['mysql_articles_amount'] = Blog::getTotalArticles();
        $data['mysql_orders_amount'] = Order::getTotalOrders();

        require (ROOT.'/views/admin/index.php');
        return true;

    }

}