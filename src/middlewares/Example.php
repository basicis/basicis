<?php
namespace App\Middlewares;

use Psr\Http\Message\ResponseInterface;
use Basicis\Http\Message\ResponseFactory;
use Psr\Http\Message\ServerRequestInterface;
use Basicis\Http\Server\Middleware;

class Example extends Middleware
{
    public function handle(ServerRequestInterface $request): ResponseInterface
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
