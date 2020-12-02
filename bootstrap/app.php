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
use Basicis\Http\Message\Uri;
use Basicis\Http\Message\ServerRequestFactory;

/**
 * Create Basicis App and setting arguments
 */


//Creating Server Request
$request = ServerRequestFactory::create(
    $_SERVER['REQUEST_METHOD'],
    (new Uri())
    ->withScheme(explode('/', $_SERVER['SERVER_PROTOCOL'])[0])
    ->withHost($_SERVER['HTTP_HOST'])
    ->withPort($_SERVER['SERVER_PORT'])
    ->withPath($_SERVER['REQUEST_URI'])
)
->withHeaders(getallheaders())
->withParsedBody(Basicis::input("php://input"))
->withUploadedFiles($_FILES)
->withCookieParams($_COOKIE);

$app = Basicis::createApp($request);


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
  //here, key is required
  "isTrue" => function ($test = true) {
    return $test ? true : false;
  },
  "isId" => function ($value) {
    return is_numeric($value);
  },
  "isText" => function ($value) {
    return is_string($value) && !is_numeric($value);
  }
  //...
]);


return $app;
