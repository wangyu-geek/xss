<?php
defined('DIR') or define('DIR', __DIR__);
defined('STATIC') or define('STATIC', DIR.'/static');

date_default_timezone_set('Asia/Shanghai');

/**
 * Front controller
 *
 * PHP version 7.0
 */

/**
 * Composer
 */
require dirname(__DIR__) . '/vendor/autoload.php';


/**
 * Error and Exception handling
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');


/**
 * Routing
 */
$router = new \App\Router\Router();

// Add the routes
$router->add('', ['controller' => 'Post', 'action' => 'detail']);
$router->add('', ['controller' => 'Comment', 'action' => 'add']);
//最后一个actions是默认action
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('{controller}/{action}');
    
$router->dispatch($_SERVER['QUERY_STRING']);
