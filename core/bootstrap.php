<?php
require_once __DIR__ . '/../vendor/autoload.php';

use dwes\core\Router;

use dwes\core\App;
use dwes\app\utils\MyLog;

$config = require_once __DIR__ . '/../app/config.php';
$router = Router::load('app/routes.php');
App::bind('config', $config);
App::bind('router', $router);

$logger = MyLog::load('logs/curso.log');
App::bind('logger', $logger);
