<?php

use Core\Router;

Router::connect('/', ['controller' => 'app', 'action' => 'index']);
Router::connect('/signin', ['controller' => 'user', 'action' => 'signin']);
Router::connect('/register', ['controller' => 'user', 'action' => 'register']);
