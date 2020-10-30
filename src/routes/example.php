<?php
// Index example
$this->get('/', function ($app) {
    $app->json(["teste" => 'Home teste ok!', "teste2" => 'Home teste2 ok!'], 201);
});

//Endpoint with param string named of 'text'
$this->get('/home/{text}string', function ($app, $args) {
    $app->write("Home text arg string: " . $args->text);
});

//Endpoint with param integer|int named of 'id'
$this->get('/home/{id}int', function ($app, $args) {
    $app->write("Home id with arg int: " . $args->id);
}, 'example');

//The caracters '::' and '@' have the same function calling an Controller
$this->get('/controller/{id}:int', 'example::index', 'example');
$this->post('/controller/{id}:int', 'example@index', 'example');

//
$this->post('/example/{id}:int', function ($app, $args) {
    if ($args->teste !== null) {
        return $app->json($args, 200);
    }
    return $app->json("Teste id: ". $args->id, 200);
});
