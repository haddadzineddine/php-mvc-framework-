<?php

use app\core\Application;
use app\controllers\ContactController;

$ROOT_DIR = dirname(__DIR__);

require_once $ROOT_DIR.'/vendor/autoload.php';


$contact = new ContactController();
$app = new Application($ROOT_DIR);

// define Routes

$app->router->get('/','home');  // HOME PAGE :: /
$app->router->get('/home','home');  // HOME PAGE :: /home
$app->router->get('/contact',[$contact , 'index']);  // CoONTACT PAGE :: /contact

$app->router->post('/contact',[$contact, 'post']);




// end Routes


$app->run();

