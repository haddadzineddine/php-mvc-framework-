<?php

namespace app\controllers;



class HomeController extends Controller
{

    public function index()
    {

        dump("it's working !");

        $params = [
            'name' => 'zineddine',
        ];

        $this->render('home', $params);
    }
}
