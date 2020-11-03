<?php
namespace App\Controllers;

use Basicis\Controller\Controller;

class Example extends Controller
{

    public function index($app, $args)
    {
        return $app->view("welcome", ["test" => "Teste OK!"]);
    }

    public function test($app, $args)
    {
        return $app->view("welcome2", ["test" => $args->id ?? $args->text]);
    }
}
