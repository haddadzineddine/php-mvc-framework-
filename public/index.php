<?php

use app\core\Router;
use app\core\Application;


$ROOT_DIR = dirname(__DIR__);

require_once $ROOT_DIR . '/vendor/autoload.php';

$config = require_once $ROOT_DIR . '/config/database.php';

$app = new Application($config);
$app->setRouteDirectory($ROOT_DIR);

// define Routes
require_once Router::getRoutes();


$app->run();
