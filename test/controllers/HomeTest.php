<?php
namespace Test\Controllers;

use PHPUnit\Framework\TestCase;
use App\Controllers\Home;
use Basicis\Basicis as App;
use Psr\Http\Message\ResponseInterface;

/**
 * Class HomeTest
 */

class HomeTest extends TestCase
{
     /**
     * $app variable
     *
     * @var App
     */
    private $app;

    /**
     * $controller variable
     *
     * @var Home
     */
    private $controller;

    /**
     * Function __construct
     */
    public function __construct()
    {
        parent::__construct();

        $this->controller = new Home();
        $this->app = App::createApp();

        $this->app->setViewFilters([
            //here, key is required
            "isTrue" => function ($test = true) {
                return $test ? true : false;
            },
            "isInt" => function ($value) {
                return $value > 0;
            },
            "isText" => function ($value) {
                return is_string($value) && !is_numeric($value);
            }
            //...
        ]);
    }

    /**
     * Funtion testConstruct
     *
     * @return void
     */
    public function testConstruct()
    {
        $this->assertInstanceof(Home::class, $this->controller);
    }

    /**
     * Function testIndex
     *
     * @return void
     */
    public function testIndex()
    {
        $response = $this->controller->index($this->app);
        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertNotEmpty($response->getBody()->getContents());
        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * Function testHome
     *
     * @return void
     */
    public function testHome()
    {
        $response = $this->controller->home($this->app);
        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertNotEmpty($response->getBody()->getContents());
        $this->assertEquals(307, $response->getStatusCode());
    }

    /**
     * Function testHome2
     *
     * @return void
     */
    public function testHome2()
    {
        $response = $this->controller->home2($this->app);
        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertNotEmpty($response->getBody()->getContents());
        $this->assertEquals(202, $response->getStatusCode());
    }

    /**
     * Function testArgId
     *
     * @return void
     */
    public function testArgId()
    {
        $response = $this->controller->argId($this->app, (object) ["id" => 1]);
        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertNotEmpty($response->getBody()->getContents());
        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * Function testArgText
     *
     * @return void
     */
    public function testArgText()
    {
        $response = $this->controller->argText($this->app, (object) ["text" => "Teste Ok!"]);
        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertNotEmpty($response->getBody()->getContents());
        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * Function testJson
     *
     * @return void
     */
    public function testJson()
    {
        $response = $this->controller->json($this->app);
        $content = $response->getBody()->getContents();
        $contentArray = (array) json_decode($content);
        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertNotEmpty($content);
        $this->assertEquals(["test" => "Test OK!", "test2" => "Test OK2!"], (array) $contentArray["data"]);
        $this->assertEquals(200, $response->getStatusCode());
    }
}
