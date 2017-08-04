<?php
/**
 * Created by Oleg Dudkin.
 * Project: "DON" - framework
 * File name: BaseView.php
 * Date: 8/3/2017
 * Time: 1:21 PM
 */

namespace don\core;


use Twig_Environment;
use Twig_Loader_Filesystem;

class BaseView
{
    /**
     * TODO: render template
     * @param $view
     * @param array $args
     */
    function render($view, $args = array())
    {
        $loader = new Twig_Loader_Filesystem(TEMPLATES_DIR);
        $twig = new Twig_Environment($loader, array('cache' => TWIG_CACHE_DIR,));
        $template = $twig->load($view.'.html');
        $template->display($args);
    }
}