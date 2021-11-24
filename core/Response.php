<?php
namespace app\core;


class Response {

    /**
     * set the http response to a specific status code
     *
     * @param integer $code
     * @return void
     */
    function setStatusCode(int $code) : void
    {
        http_response_code($code);
    }
}