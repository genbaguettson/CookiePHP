<?php

namespace Core;

class Controller {
    static private $_render;

    function __construct() {
    }

    function __destruct() {
        echo self::$_render;
    }

    protected function render($view, $scope = []) {
        extract($scope);
        $file = join(
            DIRECTORY_SEPARATOR,
            [
                dirname(__DIR__),
                'src',
                'View',
                str_replace(
                    'Controller',
                    '',
                    mb_basename(get_class($this))
                ),
                $view
            ]
        ) . '.php';

        if (file_exists($file)) {
            ob_start();
            include($file);
            $view = ob_get_clean();
            ob_start();
            include(join(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View', 'index']) . '.php');
            self::$_render = ob_get_clean();
        }
    }
}

// Apparently basename() doesn't work like I need it to on Windows so ...
function mb_basename($file) {
    return end(explode('\\',$file));
}