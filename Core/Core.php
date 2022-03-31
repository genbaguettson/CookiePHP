<?php

namespace Core;

require_once('src/routes.php');

class Core {
    public function run() {
        $currentRoute = substr($_SERVER['REQUEST_URI'], 10);
        
        $routeInfo = Router::get($currentRoute);

        $ControllerName = 'Controller\\'.ucfirst($routeInfo['controller']).'Controller';
        $ControllerAction = strtolower($routeInfo['action']).'Action';

        $Controller = new $ControllerName;

        $Controller->$ControllerAction();
    }
}