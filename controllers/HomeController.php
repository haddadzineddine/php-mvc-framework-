<?php

namespace app\controllers;



class HomeController extends Controller
{

    public function index()
    {

        $params = [
            'name' => 'zineddine',
        ];

        $this->render('home', $params);
    }
}
