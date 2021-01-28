<?php
namespace app\controllers;

use app\core\Application;

class ContactController {
    public  function index()
    {
        Application::$app->router->renderView('contact');
    }
}