<?php

/**
 * Home examples
 * The caracters "::" and "@" have the same function calling an Controller
 */
$this->get("/", "example::index");

$this->get("/home", "example::index");

$this->get("/home/{id}:int", "example@test");

$this->get("/home/{text}:string", function ($app, $args) {
    return $app->controller("example@test", $args);
});


/**
 * File storage examples
 * The caracters "::" and "@" have the same function calling an Controller
 */
$this->post("/storage", "storage::upload");

$this->get("/storage/{filename}:string", "storage::download");

$this->get("/storage", "storage::index", "example");

$this->delete("/storage/{filename}:string", "storage::delete");
