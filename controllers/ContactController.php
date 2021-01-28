<?php
namespace app\controllers;


class ContactController extends Controller {
    public  function index()
    {
        $this->render('contact');
    }

    public  function post()
    {
        $this->render('contact');
        // var_dump($_SERVER);
    }
}