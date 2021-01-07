<?php
namespace App\Middlewares;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Basicis\Http\Message\ResponseFactory;
use Basicis\Http\Server\RequestHandler;

class Guest extends RequestHandler
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        //If header authorization count === 0 this not is authenticated by a token
        if (count($request->getHeader('authorization')) === 0) {
            return ResponseFactory::create(200);
        }
        return ResponseFactory::create(401);
    }
}
