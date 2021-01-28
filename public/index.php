<?php

use app\core\Application;
use app\controllers\HomeController;
use app\controllers\ContactController;

$ROOT_DIR = dirname(__DIR__);

require_once $ROOT_DIR.'/vendor/autoload.php';


$app = new Application($ROOT_DIR);

// define Routes

$app->router->get('/',[HomeController::class,'index']);  // HOME PAGE :: /
$app->router->get('/home',[HomeController::class,'index']);  // HOME PAGE :: /home
$app->router->get('/contact',[ContactController::class , 'index']);  // CoONTACT PAGE :: /contact
$app->router->post('/contact',[ContactController::class, 'post']);




// end Routes


$app->run();

