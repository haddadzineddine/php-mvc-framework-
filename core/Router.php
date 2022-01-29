<?php

namespace app\core;

use app\core\Application;
use Exception;

class Router
{
    protected Request $request;
    protected Response $response;

    static protected array $routes = [];

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    /**
     * get routes file path
     *
     * @return string
     */
    static public function getRoutes(): string
    {
        return Application::$ROOT_DIR . '/routes/web.php';
    }

    /**
     * add get route
     *
     * @param string $path
     * @param array|string|null $callback
     * @return void
     */
    static public function get(string $path, array|string|null $callback): void
    {
        self::$routes['get'][$path] = $callback;
    }

    /**
     * add post route
     *
     * @param string $path
     * @param array|string|null $callback
     * @return void
     */
    static public function post(string $path, array|string|null $callback)
    {
        self::$routes['post'][$path] = $callback;
    }

    /**
     * resolve url
     *
     * @return void
     */
    public function resolve(): void
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $callback = self::$routes[$method][$path] ?? false;

        if ($callback == false) {
            $this->renderView('_404');
            return;
        }

        if (is_string($callback)) {
            $this->renderView($callback);
            return;
        }

        if (is_array($callback)) {
            $callback[0] = new $callback[0]();
        }

        call_user_func($callback, $this->request);
    }

    /**
     * render view
     *
     * @param string $view
     * @param array $params
     * @return void
     */
    public function renderView(string $view, array $params = []): void
    {
        foreach ($params as $key => $value) {
            $$key = $value;
        }

        include_once Application::$ROOT_DIR . "/views/$view.php";
    }
}
