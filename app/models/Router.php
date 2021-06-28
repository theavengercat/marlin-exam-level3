<?php
class Router {
    private $url = null;
    private $page404, $routes = [];

    /*
    $url -> URL request from broswser
    $action -> which controller to use
    */

    public function create($url, $action)
    {
        $this->routes += array($url => $action);
    }

    /*
     * $controller404 -> controller which used for 404 error
     */
    public function set404 ($controller404) {
        $this->page404 = $controller404;
    }

    /*
     * start our router
     */
    public function start()
    {
        $route = $_SERVER['REQUEST_URI'];

        if(array_key_exists($route, $this->routes)) {
            include "../".$this->routes[$route]; exit;
        } else {
            include $this->page404; exit;
        }
    }
}