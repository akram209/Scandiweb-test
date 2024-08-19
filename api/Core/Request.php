<?php

namespace Api\Core;

class Request
{
    public function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function getUri()
    {
        return trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
    }

    public function getInput()
    {
        return json_decode(file_get_contents('php://input'), true);
    }
}
