<?php
/**
 * Created by Oleg Dudkin.
 * Project: "DON" - framework
 * File name: Router.php
 * Date: 8/3/2017
 * Time: 9:51 AM
 */

namespace don\core;

class Router
{
    private $settings, $uri, $app, $app_controller;

    /**
     * Router constructor.
     * @param $settings
     */
    public function __construct($settings)
    {
        $this->settings = $settings;
        $this->uri = urldecode(preg_replace('/\?.*/iu', '', $_SERVER['REQUEST_URI']));
        $this->app = false;

        $this->define_path();
        $this->active_app_define();
        $this->run();
    }

    /**
     * TODO: define active app
     */
    public function active_app_define()
    {
        define('ACTIVE_APP', $this->app['0']);
    }

    /**
     * TODO: return current app
     */
    public function get_app()
    {
        return $this->app;
    }

    /**
     * TODO: Try to find matches in request by routes
     */
    protected function define_path()
    {
        foreach ($this->settings['apps'] as $_app) {
            $urls = require(APPS_DIR . '/' . $_app . $this->settings['routes']);
            foreach ($urls as $pattern => $method) {
                $matches = array();

                if (is_int($pattern) && is_array($method))
                {
//                    echo '<pre>';
//                    print_r($urls);
//                    print_r($pattern);
//                    print_r($method);

                    if (preg_match((@convert_url($method['route'])), $this->uri, $matches)) {
                        $url = convert_url($method['route']);
//                        echo '<pre>';
//                        print_r($url);
                        $this->app = array($_app, array('route' => $url, 'action' => $method['action'], 'name' => $method['name'], 'args' => $matches));
                        break(2);
                    }
                } else {
                    if (preg_match("~$pattern~", $this->uri, $matches)) {
                        $this->app = array($_app, array('pattern' => $pattern, 'action' => $method, 'args' => $matches));
                        break(2);
                    }
                }
            }
        }
if ($this->app === false)
{
exit('App not found');
}
}

/**
 * TODO: define path to controller and require it
 */
private
function getController()
{
    $this->app_controller = BASE_DIR . '/apps/' . $this->app[0] . $this->settings['controller'];
    if (file_exists($this->app_controller)) {
        require($this->app_controller);
        $controller_name = $this->app[0] . 'Controller';
        $this->app_controller = new $controller_name();
    }
}

/**
 * TODO: Run method in app
 */
protected
function run()
{
    if ($this->app || is_array($this->app))
    {
        if (is_array($this->app[1]['action'])) {
            $this->getController();
            render($this->app[1]['action']['view'], $this->app[1]['action']['args']);
        } else {
            $this->getController();
            $this->app_controller->{$this->app[1]['action']}($this->app[1]['args'], $this->getSettings(), $this->get_app());
        }
    }
}

/**
 * TODO: get settings
 * @return array()
 */
public
function getSettings()
{
    return $this->settings;
}
}