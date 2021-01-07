<?php

use app\core\Application;

require_once __DIR__ . '/../vendor/autoload.php';

$app = new Application();

// define Routes

$app->router->get('/','home');  // HOME PAGE

$app->router->get('/contact','contact');  // HOME PAGE




// end Routes


$app->run();

