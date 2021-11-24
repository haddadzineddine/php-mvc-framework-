<?php

namespace app\core;

class Application
{
    public static string $ROOT_DIR;
    public Request $request;
    public Router $router;
    public Response $response;
    
    public static Application $app;

    public function __construct($ROOT_DIR) 
    {
        self::$app = $this;
        self::$ROOT_DIR = $ROOT_DIR;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request ,$this->response);
    }

    /**
     * resolve routes
     *
     * @return void
     */
    public function run()
    {
        echo $this->router->resolve();
    }
}
