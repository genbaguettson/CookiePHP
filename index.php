<?php

define('BASE_URI', str_replace('\\', '/', substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT']))));

require_once(join(DIRECTORY_SEPARATOR, ['Core', 'autoload.php']));

try {
    $app = new Core\Core();
    $app->run();
} catch (Exception $e) {
    echo $e->getMessage(), "\n";
}
