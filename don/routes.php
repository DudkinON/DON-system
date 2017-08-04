<?php
/*
 * Copyright: by Oleg Dudkin
 * Project: CMS "DON e-Commerce"
 * Date: 11/5/2016
 * Time: 10:24 AM
 */
return array
(
    # TODO: routes configuration
    # Main page route
    '^/*$' => 'don/site/index',
    # Product routes:
    '^product/([0-9]+)' => 'product/view/$1',
    # language
    '^lang/([a-z]+)' => 'site/language/$1',
    # Catalog routes:
    '^catalog$' => 'catalog/index',
    '^catalog/page-([0-9]+)' => 'catalog/index/$1',
    # Category routes:
    '^category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2',
    '^category/([0-9]+)' => 'catalog/category/$1',
    # Cart routes:
    '^cart/add/([0-9]+)' => 'cart/add/$1',
    '^cart/addAjax/([0-9]+)' => 'cart/addAjax/$1',
    '^cart/delete/([0-9]+)' => 'cart/delete/$1',
    '^cart/checkout' => 'cart/checkout',
    '^cart$' => 'cart/index',
    # Users routes:
    '^user/registration$' => 'user/registration',
    '^user/login$' => 'user/login',
    '^user/logout$' => 'user/logout',
    # Users profile routes:
    '^profile/reports$' => 'profile/reports',
    '^profile/sales$' => 'profile/sales',
    '^profile/orders$' => 'profile/orders',
    '^profile/address/edit$' => 'profile/address',
    '^profile/edit$' => 'profile/edit',
    '^profile$' => 'profile/profile',
    # Manage products routes:
    '^admin/product/create$' => 'adminProduct/create',
    '^admin/product/update/([0-9]+)' => 'adminProduct/update/$1',
    '^admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',
    '^admin/product/page-([0-9]+)' => 'adminProduct/index/$1',
    '^admin/product$' => 'adminProduct/index',
    # Manage categories routes:
    '^admin/category/create$' => 'adminCategory/create',
    '^admin/category/update/([0-9]+)' => 'adminCategory/update/$1',
    '^admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',
    '^admin/category$' => 'adminCategory/index',
    # Manage orders routes:
    '^admin/order/create$' => 'adminOrder/create',
    '^admin/order/update/([0-9]+)' => 'adminOrder/update/$1',
    '^admin/order/delete/([0-9]+)' => 'adminOrder/delete/$1',
    '^admin/order/view/([0-9]+)' => 'adminOrder/view/$1',
    '^admin/order/data$' => 'adminOrder/data',
    '^admin/order$' => 'adminOrder/index',
    # Admin blog controller
    '^admin/blog/create$' => 'adminBlog/create',
    '^admin/blog/update/([0-9]+)' => 'adminBlog/update/$1',
    '^admin/blog/delete/([0-9]+)' => 'adminBlog/delete/$1',
    '^admin/blog/page-([0-9]+)' => 'adminBlog/index/$1',
    '^admin/blog$' => 'adminBlog/index',
    # Admin panel routes:
    '^admin$' => 'admin/index',
    # Pages
    '^contacts$' => 'site/contact',
    '^about$' => 'site/about',
    # Blog pages routes:
    '^blog/category/([0-9]+)' => 'blog/category/$1',
    '^blog/page-([0-9]+)' => 'blog/index/$1',
    '^blog/([0-9]+)' => 'blog/article/$1',
    '^blog$' => 'blog/index',
    # Error pages routes
    '^error/([0-9]+)' => 'error/index/$1',
);