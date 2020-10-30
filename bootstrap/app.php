<?php
/**
 * Bootstrap Basicis App
 * PHP version 7
 *
 * @category Basicis/Core
 * @package  Basicis/Core
 * @author   Messias Dias <https://github.com/messiasdias> <messiasdias.ti@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/basicis/core
 */

require_once "../vendor/autoload.php";
use Basicis\Basicis;

/**
 * Create Basicis App and setting arguments
 */
$app = Basicis::createApp();

$appArguments = [
  'uri' => $_SERVER['REQUEST_URI'] ?? '/',
  'method' => $_SERVER['REQUEST_METHOD'] ?? 'GET',
  'cookie' => $_COOKIE ?? [],
  'session' => $_SESSION ?? [],
  'files' => $_FILES ?? [],
  'env' => $_ENV ?? [
    "APP_ENV" =>"dev",
    "APP_TIMEZONE" =>  "America/Recife",
  ],
];

$app->setArgs($appArguments);



/**
 * Setting Controllers definitions
 */
$app->setControllers([
  //key is required
  "example" => "App\\Controllers\\Example",
  "storage" => "App\\Controllers\\Storage",
  //...
]);



/**
 * Setting Middlewares definitions
 */
// Before route middlweares
$app->setBeforeMiddlewares([
  //key no is required
  "App\\Middlewares\\BeforeExample",
  //...
]);

// Route middlweares
$app->setRouteMiddlewares([
  //only here, key is required
  "example" => "App\\Middlewares\\Example",
  //...
]);

// After route middlweares
$app->setAfterMiddlewares([
  //key no is required
  "App\\Middlewares\\AfterExample"
  //...
]);



/**
 * Setting view filters, for html template view
 */
$app->setViewFilters([
  //key is required
  "test" => function ($test = true) {
    return "Test Ok 2!";
  },
  "testIsTrue" => function ($test = true) {
    return $test ;
  },
  //...
]);


return $app;
