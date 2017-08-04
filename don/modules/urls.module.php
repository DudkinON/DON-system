<?php
/**
 * Created by Oleg Dudkin.
 * Project: "DON" - framework
 * File name: urls.module.php
 * Date: 8/4/2017
 * Time: 4:51 AM
 */

/**
 * @param $route
 * @param $view
 * @param $name
 * @return array
 */
function url($route, $view, $name)
{
    return array(
        'route' => $route,
        'action' => $view,
        'name' => $name
    );
}


/**
 * @param $pattern
 * @return string
 */
function convert_url($pattern)
{
    $convert = array();
    $convert[] = '~^';
    $convert[] = preg_replace_callback('~\{[A-z0-9]+\}~', function () {return '(.+?)';}, $pattern);
    $convert[] = '/*$~';
//    echo join('', $convert).'<br>';
    return join('', $convert);

}
