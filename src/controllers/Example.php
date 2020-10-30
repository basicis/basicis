<?php
namespace App\Controllers;

use Basicis\Controller\Controller;

class Example extends Controller
{

    public function index($app, $args)
    {
        if ($args->teste !== null) {
            return $app->json($args, 200);
        }
        return $app->json("Teste id: ". $args->id, 200);
    }
}
