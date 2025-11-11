<?php
require_once __DIR__ . '/App.php';
$config = require_once __DIR__ . '/../app/config.php';
require_once __DIR__ . '/Request.class.php';
require_once __DIR__ . '/../src/exceptions/NotFoundException.php';
require_once __DIR__ . '/../core/Router.class.php';

$router = Router::load('app/routes.php');
App::bind('config',$config); // Guardamos la configuración en el contenedor de servicios
App::bind('router', $router);