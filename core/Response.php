<?php
namespace app\core;


class Response {
    function setStatusCode(int $code)
    {
        http_response_code($code);
    }
}