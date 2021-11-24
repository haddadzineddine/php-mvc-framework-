<?php

use app\core\Router;
use app\controllers\AuthController;
use app\controllers\HomeController;
use app\controllers\ContactController;

Router::get('/', [HomeController::class, 'index']);
Router::get('/home', [HomeController::class, 'index']);  
Router::get('/contact', [ContactController::class, 'index']);
Router::post('/contact', [ContactController::class, 'post']);

Router::get('/login', [AuthController::class, 'login']);
Router::post('/login', [AuthController::class, 'login']);

Router::get('/register', [AuthController::class, 'register']);
Router::post('/register', [AuthController::class, 'register']);
