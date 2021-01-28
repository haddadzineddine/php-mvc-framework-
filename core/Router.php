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


    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = $this->routes[$method][$path] ?? false;

        if (!$callback) {
            // Application::$app->response->setStatusCode(404);
            $this->response->setStatusCode(404);
            return "Page Not Found";
        }

        if (is_string($callback)) {
            return $this->renderView($callback);
        }

        return call_user_func($callback);
        
    }

    public function renderView($view)
    {
        include_once Application::$ROOT_DIR."/views/$view.php";
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
