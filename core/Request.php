<?php

namespace app\core;


class Request
{
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
     *
     * @return string
     */
    public function method(): string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    /**
     * check if the request is get methode 
     *
     * @return boolean
     */
    public function isGet(): bool
    {
        return $this->method() === 'get';
    }

    /**
     * check if the request is post methode
     *
     * @return boolean
     */
    public function isPost(): bool
    {
        return $this->method() === 'post';
    }

    /**
     * get request body data
     *
     * @return array
     */
    public function all() : array
    {
        $body = [];

        if ($this->isGet()) {
            foreach ($_GET as $key => $value) {
                $body[$key] = htmlspecialchars($value);
            }
        }

        if ($this->isPost()) {
            foreach ($_POST as $key => $value) {
                $body[$key] = htmlspecialchars($value);
            }
        }

        return $body;
    }
}
