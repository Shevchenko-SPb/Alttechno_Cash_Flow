<?php
define('ROOT', dirname(__FILE__));
require_once('./vendor/autoload.php');
class Router {
    private $routes;
    function __construct($routesPath){
        $this->routes = include($routesPath);
    }
    function getURI(){
        if(!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
        if(!empty($_SERVER['PATH_INFO'])) {
            return trim($_SERVER['PATH_INFO'], '/');
        }
        if(!empty($_SERVER['QUERY_STRING'])) {
            return trim($_SERVER['QUERY_STRING'], '/');
        }
    }
    function run(){
        $uri = $this->getURI();

        if (!$uri) {
            $uri = "login";
        }
        foreach($this->routes as $pattern => $route){

            if(preg_match("~$pattern~", $uri)){

                $internalRoute = preg_replace("~$pattern~", $route, $uri);

                $segments = explode('/', $internalRoute);

                $controller = ucfirst(array_shift($segments)).'Controller';

                $action = 'action'.ucfirst(array_shift($segments));

                $parameters = [];

                if ($segments) {
                    $segments = str_replace('?', '', $segments[0]);
                    parse_str($segments, $parameters);
                }

                $controllerFile = ROOT.'/app/controllers/'.$controller.'.php';

                if(file_exists($controllerFile)){
                    include($controllerFile);
                }
                $obj = new $controller();
                $obj->$action(...$parameters);
            }
        }
    }
}
$routes = ROOT.'/routes.php';
$router = new Router($routes);
$router->run();
//header('location: ./cashflow');