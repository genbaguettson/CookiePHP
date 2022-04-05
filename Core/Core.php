<?php

namespace Core;

require_once('src/routes.php');

class Core {
    public function run() {
        // Remove CookiePHP/ from the URL
        // TODO: make this less crap
        $currentRoute = substr($_SERVER['REQUEST_URI'], 10);
        
        // Get Controller and Action strings from Router
        $routeInfo = Router::get($currentRoute);

        $controllerName = 'Controller\\'.ucfirst($routeInfo['controller']).'Controller';
        $controllerAction = strtolower($routeInfo['action']).'Action';

        // Instanciate and execute Action
        $controller = new $controllerName;

        $controller->$controllerAction();
    }

    public function dynamicRun() {
        $routeInfo = explode('/', $_SERVER['REQUEST_URI']);

        // Set URL values or default for Controller and Action
        $controllerName = empty($routeInfo[2]) ? 'app' : $routeInfo[2];
        $controllerAction = empty($routeInfo[3]) ? 'index' : $routeInfo[3];

        // Set strings from values
        $controllerName = 'Controller\\'.ucfirst($controllerName).'Controller';
        $controllerAction = strtolower($controllerAction).'Action';

        try {
            // Instanciate and execute Action
            $controller = new $controllerName;

            $controller->$controllerAction();
        } catch (\Exception $e) {
            echo '404';
        }
    }
}