<?php

class Router{
    protected $routes = [];

    private function addRoute($route,$controller,$action,$method)
    {
        $this->routes[$method][$route] = [
            'controller' => $controller,
            'action' => $action
        ];
    }

    public function get($route,$controller,$action){
        $this->addRoute($route,$controller,$action,"GET");
    }
    public function post($route,$controller,$action){
        $this->addRoute($route,$controller,$action,"POST");
    }
    public function put($route,$controller,$action){
        $this->addRoute($route,$controller,$action,"PUT");
    }

    public function dispatch(){
        $path = strtok($_SERVER['REQUEST_URI'],"?");
        $method = $_SERVER['REQUEST_METHOD'];
        $path = str_replace("/MVC","/",$path);    
        if(array_key_exists($path,$this->routes[$method])){
            $controller = $this->routes[$method][$path]['controller'];
            $action = $this->routes[$method][$path]['action'];

            $controller = new $controller();
            $controller->$action();
        }else{
            http_response_code(404);
            //TODO add 404 page
            echo ("404");
        }
    }

}