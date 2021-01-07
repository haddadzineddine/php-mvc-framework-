<?php

namespace app\core;

class Application 
{
    public Request $request;
    public Router $router;

  




    public function __construct()
    {   
        $this->request = new Request();
        $this->router = new Router($this->request);
    }

    public function run()
    {
        $this->router->get('/',function(){
            echo "home";
        });

        $this->router->get('/zino',function(){
            echo "hello zineddine";
        });

        $this->router->resolve();
    }
}