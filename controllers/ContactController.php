<?php
namespace app\controllers;

use app\core\Request;

class ContactController extends Controller {
    public  function index(Request $request)
    {
        var_dump($request->all());
        $this->render('contact');
    }

    public  function post(Request $request)
    {
        // $this->render('contact');
        $request->all();
        var_dump($request->all());
        $this->render('contact');
    }
}