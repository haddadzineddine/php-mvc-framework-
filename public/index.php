<?php

use app\core\Application;

$ROOT_DIR = dirname(__DIR__);

require_once $ROOT_DIR.'/vendor/autoload.php';



$app = new Application($ROOT_DIR);

// define Routes

$app->router->get('/','home');  // HOME PAGE :: /
$app->router->get('/home','home');  // HOME PAGE :: /home


$app->router->get('/contact','contact');  // CoONTACT PAGE :: /contact




// end Routes


$app->run();

