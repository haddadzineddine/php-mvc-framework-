<?php

namespace app\core;

use app\core\Application;

class Router
{
    protected Request $request;
    protected Response $response;
    static protected array $routes = [];
    /*
        in this variable will save all route in this format 
        [
            'get':[
                'path': callback function,
            ],
        ]
    */

    static public function getRoutes()
    {
        return Application::$ROOT_DIR . '/routes/web.php';
    }

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    static public function get($path, $callback)
    {
        self::$routes['get'][$path] = $callback;
    }

    static public function post($path, $callback)
    {
        self::$routes['post'][$path] = $callback;
    }


    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->method();
        $callback = self::$routes[$method][$path] ?? false;

        if ($callback == false) {
            $this->response->setStatusCode(404);
            return $this->renderView('_404');;
        }

        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        if (is_array($callback)) {
            $callback[0] = new $callback[0]();
        }



        return call_user_func($callback, $this->request);
    }

    public function renderView($view, $params = [])
    {


        foreach ($params as $key => $value) {
            $$key = $value;
        }

        include_once Application::$ROOT_DIR . "/views/$view.php";
    }
}
