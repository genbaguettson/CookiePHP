<?php

// This function will no doubt need an update later to handle more filepaths
function my_autoloader($class) {
    $className = str_replace('\\', '/', $class) . '.php';

    include $className;
}

spl_autoload_register('my_autoloader');