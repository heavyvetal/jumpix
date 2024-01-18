<?php

namespace app\Http;

class Request
{
    public function post($key)
    {
        return !empty($_POST[$key]) ? $_POST[$key] : false;
    }
}
