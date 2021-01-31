<?php
namespace App\Middlewares;

use Psr\Http\Server\RequestHandlerInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Basicis\Http\Message\ResponseFactory;
use Basicis\Http\Server\Middleware;

class BeforeExample extends Middleware
{
    public function process(
        ServerRequestInterface $request,
        ResponseInterface $response,
        callable $next = null
    ): ResponseInterface {
        /**
         *
         * Process here
         * All persoal middleware code implementation
         *
         */
        return $next($request, $response);
    }
}
