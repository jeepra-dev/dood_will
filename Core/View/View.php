<?php

namespace Core\View;

use Core\Router\HttpResponse;
use JetBrains\PhpStorm\NoReturn;

class View extends HttpResponse
{
    #[NoReturn] public function render(array $data, int $httpCode = 200)
    {
        //sent status code to header
        http_response_code($httpCode);

        if (in_array($httpCode, self::HTTP_MESSAGE_ERRORS)) {
            $data = ['message' => self::HTTP_MESSAGE_ERRORS[$httpCode], 'status' => $httpCode];
        }

        die(
            json_encode(
                ['data' => $data]
            )
        );
    }
}
