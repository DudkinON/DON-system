<?php
/**
 * Created by Oleg Dudkin.
 * Project: CMS "DON e-Commerce"
 * File name: StartRouter.php
 * Date: 7/30/2017
 * Time: 8:54 AM
 */

class StartRouter extends Router
{
//    /**********| Define variable routers |************/
//    private $routers;

    /**********| Create construct routers |***********/
    protected $path = '/config/start_routes.php';
    public function __construct(){
        parent::__construct();
    }


    public function getURI(){
        parent::getURI();
    }
    public function run(){
        parent::start();
    }

//    public function __construct(){
//        $this->routers = require_once(ROOT.'/config/start_routes.php');
//    }

//
//    /*
//     * @function: request string
//     * @return URI
//     * @type string
//     */
//    public function getURI(){
//        #Returns request string
//        if (!empty($_SERVER['REQUEST_URI'])) return trim($_SERVER['REQUEST_URI'], '/');
//        else return false;
//    }
//
//    /*************| Create public function start |*************/
//    /**
//     * TODO: Routes control
//     * @define controller and action
//     * @find controller and action
//     * @include controller file
//     */
//    public function run(){
//        /*************| get URI string |*************/
//        $uri = $this->getURI();
//        #Define path fo each URI
//        foreach ($this->routers as $uriPattern => $path){
//            #Check mach URI
//            if (preg_match("~$uriPattern~", $uri)){
//                #Replace
//                $internalRouter = preg_replace("~$uriPattern~", $path, $uri);
//                #Define controller, action and parameters
//                $segments = explode('/', $internalRouter);
//                $controllerName = array_shift($segments).'Controller';
//                $controllerName = ucfirst($controllerName);
//                #Define action name
//                $actionName = 'action'.ucfirst(array_shift($segments));
//                #Define path to file class of controller
//                $controllerFile = ROOT.'/controllers/'.$controllerName.'.php';
//                #If exist file of controller include it
//                if (file_exists($controllerFile)) require_once ($controllerFile);
//                #Create object call method
//                $controllerObject = new $controllerName;
//                #Call callback function
//                $result = call_user_func_array(array($controllerObject, $actionName), $segments);
//                #If exist action, break loop else show 404 error file
//                if ($result != null) break;
//                else include (ROOT.'/template/'.TEMPLATE.'/404.html');  break;
//            }
//        }
//    }
}