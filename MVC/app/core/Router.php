<?php
require_once (__DIR__ . '/../controllers/HomeController.php');
require_once (__DIR__ . '/../controllers/NoticiasController.php');
require_once (__DIR__ . '/../controllers/errors/HttpErrorController.php');



class Router
{
    public function dispatch($url)
    {
        $url = trim($url, '/');
        $parts = $url ? explode('/', $url) : [];
        $controllerName = $parts[0] ?? 'Home';
        $controllerName = ucfirst($controllerName) . 'Controller';
        
        
        if(!class_exists($controllerName)){
            $controller = new HttpErrorController();
            $controller->NotFound();
            exit;
        }

        $controller = new $controllerName();
        $actionName = $parts[1] ?? 'index';

        if(!method_exists($controller, $actionName)){
            $controller = new HttpErrorController();
            $controller->NotFound();
            exit;
        }

        $params = array_slice($parts, 2);

        
        call_user_func_array([$controller, $actionName], $params);
            
    }
}