<?php
namespace App\Middlewares;

use Psr\Http\Message\ResponseInterface;
use Basicis\Http\Message\ResponseFactory;
use Psr\Http\Message\ServerRequestInterface;
use Basicis\Http\Server\Middleware;

class BeforeExample extends Middleware
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
