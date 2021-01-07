<?php
namespace App\Middlewares;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Basicis\Http\Message\ResponseFactory;
use Basicis\Http\Server\RequestHandler;

class AfterExample extends RequestHandler
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        /**
         *
         * Proccess here
         * All persoal middleware code implementation
         *
         */
        return ResponseFactory::create(200);
    }
}
