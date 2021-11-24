<?php

use app\core\Router;
use app\core\Application;
use app\controllers\AuthController;
use app\controllers\HomeController;
use app\controllers\ContactController;

$ROOT_DIR = dirname(__DIR__);

require_once $ROOT_DIR . '/vendor/autoload.php';

$app = new Application($ROOT_DIR);

// define Routes
require_once Router::getRoutes();



$app->run();
