<?php
namespace App\Controllers;

use Basicis\Basicis as App;
use Basicis\Controller\Controller;
use Basicis\Http\Message\StreamFactory;
use Basicis\Http\Message\UploadedFileFactory;
use Psr\Http\Message\ResponseInterface;

class Storage extends Controller
{
    /**
     * Function replaceFilename
     *
     * @param string $filename
     * @return string
     */
    private function replaceFilename(string $filename) : string
    {
        return str_replace(["%20", " ", "-"], ["_", "_", "."], $filename);
    }

    /**
     * Function index
     *
     * @param App $app
     * @param object $args
     * @return void
     * @Route("/storage", "GET", "example")
     */
    public function index(App $app, object $args = null) : ResponseInterface
    {
        //Search and list public files
        $files = [];
        foreach (glob($app->path() . "storage/*.*") as $file) {
            $stream = (new StreamFactory)->createStreamFromFile($file, "r");

            $files[] = [
              "filename" => pathinfo($file)["basename"],
              "name" => pathinfo($file)["filename"],
              "extension" =>  pathinfo($file)["extension"],
              "type" => mime_content_type($file),
              "size" => $stream->getSize(),
              "modified" =>  filectime($file)
            ];

            $stream->close();
        }
        return $app->json(["files" => $files], 200);
    }


    /**
     * Function upload
     *
     * @param App $app
     * @param object $args
     * @return void
     * @Route("/storage", "POST")
     */
    public function upload(App $app, object $args = null)
    {
        $files = [];
        foreach ($app->request()->getUploadedFiles() as $key => $infile) {
            $filename = App::path()."storage/".$infile->getClientFilename();
            //New filename if this exists
            if (file_exists($filename)) {
                $filename = sprintf(
                    "%s%s%s.%s",
                    $app->path(),
                    "storage/",
                    (new \Datetime($app->getTimezone()))->format("YmdHis"),
                    pathinfo($infile->getClientFilename(), PATHINFO_EXTENSION)
                );
            }

            $files[$key] = $app->clientFileupload($infile, $filename);
            $files[$key]["name"] = $filename;
        }

        //return response ok in json format, with files informations
        return $app->json(["files" => $files], 200);
    }


    /**
     * Function download
     *
     * @param App $app
     * @param object $args
     * @return void
     * @Route("/storage/{filename}:string", "GET")
     */
    public function download(App $app, object $args = null)
    {
        $filename = sprintf(
            "%s%s%s",
            App::path(),
            "storage/",
            urldecode($args->filename)
        );
        return $app->clientFileDownload($filename);
    }


    /**
     * Function delete
     *
     * @param App $app
     * @param object $args
     * @return void
     * @Route("/storage/{filename}:string", "DELETE")
     */
    public function deleteFile(App $app, object $args = null)
    {
        $filename = sprintf(
            "%s%s%s",
            App::path(),
            "storage/",
            urldecode($args->filename)
        );

        //If file exists and this is deleted return success
        if (file_exists($filename) && unlink($filename)) {
            return $app->json(["success" => true], 200);
        }

        //If file not found or no is deleted
        return $app->json(["success" => false], 404, "File not found!");
    }

    /**
     * Function assets
     *
     * @param App $app
     * @param object $args
     * @return void
     * @Route("/assets/{dirname}:string/{filename}:string", "GET")
     */
    public function assets(App $app, object $args = null)
    {
        $filename = sprintf(
            "%s%s/%s/%s",
            App::path(),
            "storage/assets/",
            $args->dirname,
            $args->filename
        );
        return $app->clientFileDownload($filename)->withStatus(200);
    }
}
