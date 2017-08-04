<?php
/**
 * Created by Oleg Dudkin.
 * Project: CMS "DON e-Commerce"
 * File name: queries.php
 * Date: 7/30/2017
 * Time: 6:00 AM
 */
$query = "CREATE TABLE `category` (
                                  `id` int(11) NOT NULL,
                                  `name` varchar(25) NOT NULL,
                                  `name_ru` VARCHAR(25) NOT NULL ,
                                  `sort_order` int(11) NOT NULL DEFAULT '0',
                                  `status` int(11) NOT NULL DEFAULT '1'
                                ) ENGINE=InnoDB DEFAULT CHARSET=utf8; ";
$query .=  "CREATE TABLE `product` (
                                  `id` int(11) NOT NULL,
                                  `name` varchar(60) NOT NULL,
                                  `category_id` int(11) NOT NULL,
                                  `code` int(11) NOT NULL,
                                  `price` float NOT NULL,
                                  `availability` int(11) NOT NULL,
                                  `brand` varchar(60) NOT NULL,
                                  `description` text NOT NULL,
                                  `is_new` int(11) NOT NULL DEFAULT '0',
                                  `is_recommended` int(11) NOT NULL DEFAULT '0',
                                  `status` int(11) NOT NULL DEFAULT '1',
                                  `image` varchar(255) NOT NULL
                                ) ENGINE=InnoDB DEFAULT CHARSET=utf8; ";
$query .=  "CREATE TABLE `product_order` (
                                  `id` int(11) NOT NULL,
                                  `user_name` varchar(60) NOT NULL,
                                  `user_phone` varchar(60) NOT NULL,
                                  `user_comment` text NOT NULL,
                                  `user_id` int(11) DEFAULT NULL,
                                  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                                  `products` text NOT NULL,
                                  `status` int(11) NOT NULL DEFAULT '1'
                                ) ENGINE=MyISAM DEFAULT CHARSET=utf8; ";
$query .= "CREATE TABLE `user` (
                              `id` int(11) NOT NULL,
                              `name` varchar(60) NOT NULL,
                              `email` varchar(60) NOT NULL,
                              `password` varchar(60) NOT NULL,
                              `role` varchar(50) NOT NULL
                            ) ENGINE=InnoDB DEFAULT CHARSET=utf8; ";
$query .= "ALTER TABLE `category`
              ADD PRIMARY KEY (`id`);
            ALTER TABLE `product`
              ADD PRIMARY KEY (`id`);
            ALTER TABLE `product_order`
              ADD PRIMARY KEY (`id`);
            ALTER TABLE `user`
              ADD PRIMARY KEY (`id`);
            ALTER TABLE `category`
              MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
            ALTER TABLE `product`
              MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
            ALTER TABLE `product_order`
              MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
            ALTER TABLE `user`
              MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
               ";
return  $query;