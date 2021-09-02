<?php

use Router\Router;

require '../vendor/autoload.php';

// Defines a VIEWS constant
// dirname Returns a parent directory's path
define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
// Defines a SCRPTS constant
define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR);
//echo SCRIPTS;
//exit;

$router = new Router($_GET['url']);

$router->get('/', 'App\Controllers\BlogController@index');
$router->get('/posts/:id', 'App\Controllers\BlogController@show');

$router->run();
