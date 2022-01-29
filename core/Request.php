<?php

namespace app\core;

use Symfony\Component\HttpFoundation\Request as SymfonyRequest;

class Request extends SymfonyRequest
{
    protected $symfonyRequest;

    public function __construct()
    {
        parent::__construct();
        $this->symfonyRequest = SymfonyRequest::createFromGlobals();
    }

    /**
     * get url
     *
     * @return string
     */
    public function getPath(): string
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');

        if (!$position) {
            return $path;
        }

        return substr($path, 0, $position);
    }

    /**
     * get request methode
     * @return string
     */
    public function getMethode(): string
    {
        return $this->symfonyRequest->getMethod();
    }


    /**
     * check if the request is get methode 
     *
     * @return boolean
     */
    public function isGet(): bool
    {
        return $this->symfonyRequest->getMethod() === 'GET';
    }

    /**
     * check if the request is post methode
     *
     * @return boolean
     */
    public function isPost(): bool
    {
        return $this->symfonyRequest->getMethod() === 'POST';
    }

    /**
     * get request body data
     *
     * @return array
     */
    public function all()
    {
        if ($this->isGet()) {

            return $this->symfonyRequest->query->all();
        }

        return $this->symfonyRequest->request->all();
    }
}
