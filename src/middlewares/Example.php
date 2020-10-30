<?php
namespace App\Middlewares;

use Psr\Http\Message\ResponseInterface;
use Basicis\Http\Message\ResponseFactory;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Basicis\Http\Server\Middleware;

class Example extends Middleware
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $app): ResponseInterface
    {
        /**
         *
         * Proccess here
         * All persoal middleware code implementation
         *
         */

        /*
            if ($app->getRequest()->getParsedBody()["teste"] !== null) {
                return $app->getResponse();
            }
        */

        return $app->getResponse();
    }
}
