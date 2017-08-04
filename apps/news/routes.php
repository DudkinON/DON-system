<?php
return array(
//    '^\/news/*$' => 'index',
//    '^\/news\/page/([A-z0-9\._-]+)\/*' => 'page',
    url('/news', 'news', 'news'),
    url('/news/{id}', 'page', 'one_news'),
);