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

//Create Basicis App
$app = Basicis::createApp();

//Setting App arguments
$app->setArgs(
    [
      'uri' => $_SERVER['REQUEST_URI'] ?? '/',
      'method' => $_SERVER['REQUEST_METHOD'] ?? 'GET',
      'data' => $_POST ?? $_GET ?? [],
      'env' => $_ENV ?? ['APP_ENV' => 'dev'],
      'cookies' => $_COOKIE ?? [],
      'sessions' => $_SESSION ?? [],
      'files' => $_FILES ?? []
    ]
);

/**
 * Setting Controllers definitions
 */
$app->setControllers([
  //key is required
  "example" => "App\\Middlewares\\Example",
]);


/**
 * Setting Middlewares definitions
 */
//Before route middlweares
$app->setBeforeMiddlewares([
  //key no is required
  new App\Middlewares\BeforeExample(),
]);

//om oute middlweares
$app->setMiddlewares([
  //only here, key is required
  "example" => new App\Middlewares\Example(),
]);

//After route middlweares
$app->setAfterMiddlewares([
  //key no is required
  new App\Middlewares\AfterExample(),
]);

return $app;
