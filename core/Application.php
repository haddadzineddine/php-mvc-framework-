<?php

namespace app\core;

use app\exceptions\Handle;

class Application
{
    public static string $ROOT_DIR;
    public Request $request;
    public Router $router;
    public Response $response;
    public Database $database;

    public static Application $app;

    public function __construct(protected array $config)
    {
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->database = new Database($config);

    }

    /**
     * resolve routes
     *
     * @return void
     */
    public function run(): void
    {
        $this->router->resolve();
    }

    /**
     * set route directory
     *
     * @param string $ROOT_DIR
     * @return void
     */
    public function setRouteDirectory(string $ROOT_DIR): void
    {
        self::$ROOT_DIR = $ROOT_DIR;
    }
}
