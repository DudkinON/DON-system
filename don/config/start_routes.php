<?php
/*
 * Copyright: by Oleg Dudkin
 * Project: CMS "DON e-Commerce"
 * This is list of routes
 * Date: 11/5/2016
 * Time: 10:24 AM
 */
return array
(
    #language
    'lang/([a-z]+)' => 'site/language/$1',
    #Main page route
    '^$' => 'start/index',
);