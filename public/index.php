<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/twig/twig/lib/Twig/Autoloader.php';
Twig_Autoloader::register();

/*Autoloader*/
spl_autoload_register(function ($class) {
    $root = dirname(__DIR__);
    $file = $root . '/' . str_replace('\\', '/', $class) . '.php';
    if (is_readable($file)) {
        require $root . '/' . str_replace('\\', '/', $class) . '.php';
    }
});

set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');

$router = new Core\Router;

$router->add('', ['controller'=>'Home', 'action'=>'index']);
$router->add('posts/{id:5}', ['controller'=>'Posts', 'action'=>'index']);
$router->add('{controller}/{action}');
//$router->add('admin/{action}/{controller}');
$router->add('{controller}/{id:\d+}/{action}');
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);


$url = $_SERVER['QUERY_STRING'];

$router->match($url);

$router->dispatch($url);

if ($router->match($url)) {
    echo "<pre>";
    var_dump($router->getParams());
    echo "</pre>";
} else {
    echo "No route found";
}
