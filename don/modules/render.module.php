<?php
/**
 * Created by Oleg Dudkin.
 * Project: "DON" - framework
 * File name: render.module.php
 * Date: 8/4/2017
 * Time: 2:28 AM
 */


/**
 * main render method the templates
 * @param $view
 * @param array $args
 */
function render($view, $args = array())
{
    $settings = (require(SETTINGS));
    $loader = new Twig_Loader_Filesystem(TEMPLATES_DIR);
    $loader->addPath(TEMPLATES_DIR . '/' . ACTIVE_APP);
    $cache_dir = false;
    if ($settings['cache']) $cache_dir = TWIG_CACHE_DIR;
    if ($settings['twig_ext']) $ext = $settings['twig_ext'];
    else $ext = '.html';
    $twig = new Twig_Environment($loader, array('cache' => $cache_dir,));
    require (MODULES.'/twig.url.php');
    $extension_class_name = '\\don\core\\' . 'UrlsTwigExtension';
    $twig->addExtension(new $extension_class_name());
    $template = $twig->load($view . $ext);

    $template->display($args);
}

/**
 * run render the url
 * @param $view
 * @param array $args
 * @return array
 */
function render_url($view, $args = array())
{
    return array('view' => $view, 'args' => $args);
}

/**
 * render page
 * @param $page
 */
function render_page($page)
{
    render($page[1]);
}

/**
 * developer method for print the data array
 * @param $var
 * @param bool $exit
 */
function dump($var, $exit = false)
{
    echo '<pre>';
    print_r($var);
    echo '</pre>';

    if ($exit) exit();
}
