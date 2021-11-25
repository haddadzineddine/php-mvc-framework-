<?php


use app\core\Application;


$ROOT_DIR = dirname(__DIR__);

require_once $ROOT_DIR . '/vendor/autoload.php';

$config = require_once $ROOT_DIR . '/config/database.php';

$app = new Application($config);
$app->setRouteDirectory($ROOT_DIR);
