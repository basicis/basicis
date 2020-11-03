<?php

//Index example
$this->get("/", function ($app) {
    return $app->view("welcome", ["teste" => "Teste Ok!"], 200);
});

// Index2 example
$this->get("/home", function ($app) {
    return $app->view("welcome2", ["teste" => "Teste Ok!"], 200);
});


//Endpoint with param string named of "text"
$this->get("/home/{text}string", function ($app, $args) {
    return $app->write("Home text arg string: " . $args->text);
});


//Endpoint with param integer|int named of "id"
$this->get("/home/{id}int", function ($app, $args) {
    return $app->write("Home id with arg int: " . $args->id);
}, "example");


//The caracters "::" and "@" have the same function calling an Controller
$this->get("/controller/{id}:int", "example::index", "example");
$this->post("/controller/{id}:int", "example@index", "example");


//post example
$this->post("/example/{id}:int", function ($app, $args) {
    if ($args->teste !== null) {
        return $app->json($args, 200);
    }
    return $app->json("Teste id: ". $args->id, 200);
});


//File upload example
$this->post("/storage", "storage::upload");

//File get one item example
$this->get("/storage/{filename}:string", "storage::download");

//File get all example
$this->get("/storage", "storage::index", "example");

//File delete example
$this->delete("/storage/{filename}:string", "storage::delete");
