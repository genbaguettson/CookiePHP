<?php

function my_autoloader($class) {
    $classNamespace = explode('\\', $class)[0];

    $className = ($classNamespace == "Core" ? '' : 'src/');

    $className .= str_replace('\\', '/', $class) . '.php';

    include $className;
}

spl_autoload_register('my_autoloader');