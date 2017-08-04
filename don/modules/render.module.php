<?php
/**
 * Created by Oleg Dudkin.
 * Project: "DON" - framework
 * File name: render.module.php
 * Date: 8/4/2017
 * Time: 2:28 AM
 */


/**
 * @param $view
 * @param array $args
 */
function render($view, $args = array())
{
    $loader = new Twig_Loader_Filesystem(TEMPLATES_DIR);
    $loader->addPath(TEMPLATES_DIR . '/' . ACTIVE_APP);
    $cache_dir = false;
    if ((require(SETTINGS))['cache']) $cache_dir = TWIG_CACHE_DIR;
    $twig = new Twig_Environment($loader, array('cache' => $cache_dir,));
    require (MODULES.'/twig.url.php');
    $extension_class_name = '\\Twig_Extensions\\' . 'Urls_Twig_Extension';
    $twig->addExtension(new $extension_class_name());
    dump($view);
    $template = $twig->load($view . '.html.twig');

    $template->display($args);
}

function render_url($view, $args = array())
{
    return array('view' => $view, 'args' => $args);
}

function dump($var, $exit = false)
{
    echo '<pre>';
    print_r($var);
    echo '</pre>';

    if ($exit) exit();
}