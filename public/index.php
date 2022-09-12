<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

ini_set('display_errors', true);


define('ROOT_FOLDER', dirname(__DIR__));

//global configuration
require ROOT_FOLDER.'/config/config.php';
//autoload
require ROOT_FOLDER.'/vendor/autoload.php';

$url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_STRING);

if ($url != '') {
    define('URL_WEBSITE', $url);
} else {
    define('URL_WEBSITE', 'index');
}

//routing
$router = new Core\Router\Route();
$router->callController();