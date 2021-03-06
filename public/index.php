<?php

use App\Exceptions\NotFoundException;
use Router\Router;

require '../vendor/autoload.php';
require '../env.php';
// Defines a VIEWS constant
// dirname Returns a parent directory's path
define('VIEWS', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);
// Defines a SCRPTS constant
define('SCRIPTS', dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR);
//echo SCRIPTS;
//exit;


$router = new Router($_GET['url']);

$router->get('/', 'App\Controllers\BlogController@welcome');
$router->get('/posts', 'App\Controllers\BlogController@index');
$router->get('/posts/:id', 'App\Controllers\BlogController@show');
$router->post('/posts/:id', 'App\Controllers\BlogController@createComment');
$router->get('/tags/:id', 'App\Controllers\BlogController@tag');

$router->get('/contact', 'App\Controllers\ContactController@contactForm');
$router->post('/contact', 'App\Controllers\ContactController@postContactForm');

$router->get('/login', 'App\Controllers\UserController@login');
$router->get('/registration', 'App\Controllers\UserController@registration');
$router->get('/checked/:id', 'App\Controllers\UserController@checked');
$router->post('/registration', 'App\Controllers\UserController@creationUser');
$router->get('/logout', 'App\Controllers\UserController@logout');
$router->post('/login', 'App\Controllers\UserController@loginPost');

$router->get('/admin/posts', 'App\Controllers\Admin\PostController@index');
$router->get('/admin/posts/create', 'App\Controllers\Admin\PostController@create');
$router->post('/admin/posts/create', 'App\Controllers\Admin\PostController@createPost');
$router->post('/admin/posts/delete/:id', 'App\Controllers\Admin\PostController@destroy');
$router->get('/admin/posts/edit/:id', 'App\Controllers\Admin\PostController@edit');
$router->post('/admin/posts/edit/:id', 'App\Controllers\Admin\PostController@update');

$router->get('/admin/comments', 'App\Controllers\Admin\CommentController@index');
$router->post('/admin/comments/delete/:id', 'App\Controllers\Admin\CommentController@destroy');
$router->get('/admin/comments/edit/:id', 'App\Controllers\Admin\CommentController@edit');
$router->post('/admin/comments/edit/:id', 'App\Controllers\Admin\CommentController@update');
$router->post('/admin/comments/checked/:id', 'App\Controllers\Admin\CommentController@checked');
$router->post('/admin/comments/nochecked/:id', 'App\Controllers\Admin\CommentController@noChecked');

try {
    $router->run();
} catch (NotFoundException $e){
    return $e->error404();
}
