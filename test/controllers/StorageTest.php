<?php
namespace Test\Controllers;

use PHPUnit\Framework\TestCase;
use App\Controllers\Storage;
use Basicis\Http\Message\UploadedFileFactory;
use Basicis\Http\Message\StreamFactory;
use Basicis\Basicis as App;
use Psr\Http\Message\ResponseInterface;

/**
 * Class StorageTest
 */

class StorageTest extends TestCase
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
     * @var Storage
     */
    private $controller;

    /**
     * Function __construct
     */
    public function __construct()
    {
        parent::__construct();
        $this->controller = new Storage();
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
        $this->assertInstanceof(Storage::class, $this->controller);
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
        $this->assertNotEmpty($response->getBody()->__toString());
        $this->assertEquals(200, $response->getStatusCode());
    }

    /**
     * Function testUpload
     *
     * @return void
     */
    public function testUpload()
    {
        $path = App::path()."storage/assets/";
        $this->app->getRequest()->withUploadedFiles(
            [
                (new UploadedFileFactory)->createUploadedFileFromFilename($path."img/logo.png"),
                (new UploadedFileFactory)->createUploadedFileFromFilename($path."js/script.js")
            ]
        );

        $response = $this->controller->upload($this->app);
        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertEquals(200, $response->getStatusCode());

        $files = (json_decode($response->getBody()->__toString()))->data->files;
        $this->assertEquals(2, count($files));
    }

    /**
     * Function testDownload
     *
     * @return void
     */
    public function testDownload()
    {
        $response = $this->controller->download($this->app, (object) ["filename" => "logo.png"]);

        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals("image/png", $response->getHeader("content-type")[0]);
        $this->assertEmpty($response->getBody()->__toString());
    }

    /**
     * Function testAssets
     *
     * @return void
     */
    public function testAssets()
    {
        $response = $this->controller->assets(
            $this->app,
            (object) [
                "filename" => "logo.png",
                "dirname" => "img"
            ]
        );
        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertEquals(200, $response->getStatusCode());


        $response = $this->controller->assets(
            $this->app,
            (object) [
                "filename" => "logo2.png",
                "dirname" => "img"
            ]
        );
        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertEquals(404, $response->getStatusCode());

        $response = $this->controller->assets(
            $this->app,
            (object) [
                "filename" => "script.js",
                "dirname" => "js"
            ]
        );
        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertEquals(200, $response->getStatusCode());

        $response = $this->controller->assets(
            $this->app,
            (object) [
                "filename" => "script2.js",
                "dirname" => "js"
            ]
        );
        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertEquals(404, $response->getStatusCode());
    }

    /**
     * Function testDeleteFile
     *
     * @return void
     */
    public function testDeleteFile()
    {
        $response = $this->controller->deleteFile($this->app, (object) ["filename" => "logo.png"]);
        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertEquals(200, $response->getStatusCode());

        $response = $this->controller->deleteFile($this->app, (object) ["filename" => "logo.png"]);
        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertEquals(404, $response->getStatusCode());

        $response = $this->controller->deleteFile($this->app, (object) ["filename" => "script.js"]);
        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertEquals(200, $response->getStatusCode());

        $response = $this->controller->deleteFile($this->app, (object) ["filename" => "script.js"]);
        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertEquals(404, $response->getStatusCode());
    }
}
