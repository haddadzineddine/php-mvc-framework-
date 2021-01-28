<?php
namespace app\controllers;

use app\core\Application;


class HomeController {

    public function index() {
        $params = [
            'name' => 'zineddine',
            'family_name' => 'haddad'
        ];

        Application::$app->router->renderView('home',$params);
    }
}