<?php

/**
 * Home examples
 * The caracters "::" and "@" have the same function calling an Controller
 */
$app->get("/", "example::index");

$app->get("/home", "example::index");

$app->get("/home/{id}:int", "example@test");

$app->get("/home/{text}:string", function ($app, $args) {
    return $app->controller("example@test", $args);
});


/**
 * File storage examples
 * The caracters "::" and "@" have the same function calling an Controller
 */
$app->post("/storage", "storage::upload");

$app->get("/storage/{filename}:string", "storage::download");

$app->get("/storage", "storage::index", "example");

$app->delete("/storage/{filename}:string", "storage::delete");
