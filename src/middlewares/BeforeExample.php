<?php
namespace App\Middlewares;

use Psr\Http\Message\ResponseInterface;
use Basicis\Http\Message\ResponseFactory;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Basicis\Http\Server\Middleware;

class BeforeExample extends Middleware
{
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        /**
         *
         * Proccess here
         * All persoal middleware code implementation
         *
         */
        if ($handler->getRoute()->getArguments() !== null) {
            return ResponseFactory::create(200);
        }
        return ResponseFactory::create(401);
    }
}
