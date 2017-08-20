<?php
/**
 * Created by Oleg Dudkin.
 * Project: CMS "DON e-Commerce"
 * File name: queries.php
 * Date: 7/30/2017
 * Time: 6:00 AM
 */

$query = '';
$query .= "CREATE TABLE `users` (
                              `uid` int(11) NOT NULL,
                              `name` varchar(35) NOT NULL,
                              `email` varchar(40) NOT NULL,
                              `hash` varchar(200) NOT NULL,
                              `role` varchar(10) NOT NULL
                            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
$query .= "ALTER TABLE `users`
              ADD PRIMARY KEY (`uid`);
            ALTER TABLE `users`
              MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT;
               ";

return  $query;