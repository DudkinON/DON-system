<?php
/**
 * Created by Oleg Dudkin.
 * Project: "DON" - framework
 * File name: UrlsTwigExtension.php
 * Date: 8/5/2017
 * Time: 4:29 PM
 */

namespace don\core;


class UrlsTwigExtension extends \Twig_Extension
{
    protected $parameters;

    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('url', array($this, 'url'))
        );
    }

    public function url($name)
    {
        $this->parameters = array_slice(func_get_args(), 1);
        $data = explode('.', $name);
        if (count($data) > 1) {
            $app_name = array_shift($data);
            $action_name = join('.', $data);
        } else {
            $action_name = join('.', $data);
        }
        $_url = array();
        if (isset($app_name)) {
            $_url = require(APPS_DIR . '/' . strtolower($app_name) . '/routes.php');
        } else {
            $settings = (require SETTINGS);
            foreach ($settings['apps'] as $app) {
                $_url = array_merge($_url, (require(APPS_DIR . '/' . strtolower($app) . '/routes.php')));
            }
        }


        // return link
        if (isset($_url)) {
            foreach ($_url as $u) {
                if ($action_name == $u['name']) return $this->convert_urls($u['route']);
            }
        }

        return false;

    }

    public function getName()
    {
        return 'twig_urls';
    }

    public function getGlobals()
    {

    }

    public function initRuntime(\Twig_Environment $environment)
    {
    }

    public function convert_urls($pattern)
    {
        return preg_replace_callback('~\{[A-z0-9]+\}~', array($this, 'convert_url_callback'), $pattern);
    }

    public function convert_url_callback($match)
    {
        return array_shift($this->parameters);
    }
}