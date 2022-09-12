<?php

namespace Core\Router;

class HttpResponse
{
    const RESPONSE_SUCCESS = 200;
    const BAD_REQUEST = 400;
    const NOT_FOUND = 404;
    const SERVER_ERROR = 500;

    const HTTP_MESSAGE_ERRORS = [
        '400' => 'BAD REQUEST',
        '404' => 'NOT FOUND',
        '500' => 'INTERNAL_SERVER_ERROR',
    ];
}