<?php
namespace App\Middlewares;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Basicis\Http\Message\ResponseFactory;
use Basicis\Http\Server\Middleware;

class Guest extends Middleware
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        //If app auth === null this not is authenticated by authorization token
        if ($this->app->auth() === null) {
            return ResponseFactory::create(200);
        }
        return ResponseFactory::create(401);
    }
}
