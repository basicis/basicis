<?php
namespace App\Middlewares;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use Basicis\Http\Message\ResponseFactory;
use Basicis\Http\Server\RequestHandler;

class Auth extends RequestHandler
{
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        // If app auth !== null this is authenticated user by authorization token
        if ($this->app->auth("App\Models\User") instanceof App\Models\User) {
            return ResponseFactory::create(200);
        }
        return ResponseFactory::create(401);
    }
}
