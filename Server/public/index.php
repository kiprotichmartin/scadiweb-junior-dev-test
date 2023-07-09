<?php

/**
 * Front controller
 *
 * PHP version 8.2.4
 */

/**
 * Twig
 */
// D:\xampp\htdocs\scandiweb\Server\vendor\autoload.php
require_once dirname(__DIR__) . '/vendor/autoload.php';


/**
 * Autoloader
 */
spl_autoload_register(function ($class) {
  $root = dirname(__DIR__); // get the parent directory
  $file = $root . '/' . str_replace('\\', '/', $class) . '.php';
  if (is_readable($file)) {
    // require $root . '/' . str_replace('\\', '/', $class) . '.php';
    require $file;
  }
});


/**
 * Routing
 */
$router = new Core\Router();

// Add the routes
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');
$router->add('admin/{controller}/{action}', ['namespace' => 'Admin']);

$router->dispatch($_SERVER['QUERY_STRING']);