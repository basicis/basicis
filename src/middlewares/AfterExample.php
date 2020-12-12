<?php
namespace App\Middlewares;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Basicis\Http\Message\ResponseFactory;
use Basicis\Http\Server\Middleware;

class AfterExample extends Middleware
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
