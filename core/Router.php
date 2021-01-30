<?php

namespace app\core;

class Router
{
    protected Request $request;
    protected Response $response;
    protected array $routes = [];
    /*
        in this variable will save all route in this format 
        [
            'get':[
                'path': callback function,
            ],
        ]
    */

    public function __construct(Request $request ,Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path, $callback)
    {
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback)
    {
        $this->routes['post'][$path] = $callback;
    }


    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->method();
        $callback = $this->routes[$method][$path] ?? false;

        if (!$callback) {
            // Application::$app->response->setStatusCode(404);
            $this->response->setStatusCode(404);
            return $this->renderView('_404');;
        }

        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        if (is_array($callback)) {
            $callback[0] = new $callback[0]();
        }

        return call_user_func($callback,$this->request);
        
    }

    public function renderView($view,$params =[])
    {

        foreach ($params as $key => $value)
        {
            $$key = $value;
        }

        include_once Application::$ROOT_DIR."/views/$view.php";

        /* 
            example :
            $foo = 'zineddine';
            $zineddine ='haddad';

            $$foo = 'haddad'; this is the result !
        
        */
       
        // $layoutContent = $this->layoutContent();
        // $viewContent = $this->renderView($view);
        // return str_replace('{{content}}',$viewContent,$layoutContent);    

    }

    // protected function layoutContent()
    // {
    //     ob_start();
    //     include_once Application::$ROOT_DIR.'/views/layout/main.php';
    //     return ob_get_clean();
    // }

    // protected function renderOnlyView($view)
    // {
    //     ob_start();
    //     include_once Application::$ROOT_DIR."/views/$view.php";
    //     return ob_get_clean();
    // }
}
