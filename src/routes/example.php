<?php

$this->get('/', function () {
    echo 'Home teste ok!';
});

$this->get('/home/{text}string', function () {
    echo "Home text arg string: {$this->args->text}";
});

$this->get('/home/{id}int', function () {
    var_dump($this);
    echo "Home id with arg int: ".$this->args->id ?? "0";
}, 'example');

$this->get('/controller', 'example@index');

$this->post('/controller/{id}:int', 'example@index');
