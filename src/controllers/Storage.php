<?php
namespace App\Controllers;

use Basicis\Controller\Controller;
use Basicis\Http\Message\StreamFactory;
use Basicis\Http\Message\UploadedFileFactory;

class Storage extends Controller
{

    public function index($app, $args)
    {
         //Search and list public files
        $files = [];
        foreach (glob($app->path() . "storage/public/*") as $file) {
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


    public function upload($app, $args)
    {
        $files = [];

        foreach ($app->request()->getUploadedFiles() as $name => $infile) {
            //setting path with client uploaded filename
            $filename = sprintf(
                "%s%s%s",
                $app->path(),
                "storage/public/",
                str_replace(["%20", "(", ")", " "], ["-", "",  "",  "-"], $infile->getClientFilename())
            );
            
            $files[$name] = $app->clientFileupload($infile, strtolower($filename));
        }

        //return response ok in json format, with files informations
        return $app->json(["files" => $files], 200);
    }


    public function download($app, $args)
    {
        //Search file
        $filename = null;
        $name = str_replace(["%20", "(", ")"], [" ", "\(", "\("], $args->name);
    
        foreach (glob($app->path() . "storage/public/*") as $filepath) {
            if (preg_match("/$name.[a-z0-9]{2,}/", $filepath)) {
                $filename = $filepath;
            }
        }

        //If file exists, this no is null
        if ($filename !== null) {
            return $app->clientFileDownload($filename);
        }

        // if file not found
        return $app->response(404);
    }


    public function delete($app, $args)
    {
        //Search file
        $filename = null;
        $name = str_replace(["%20", "(", ")"], [" ", "\(", "\("], $args->name);

        foreach (glob($app->path() . "storage/public/*") as $filepath) {
            if (preg_match("/$name.[a-z0-9]{2,}/", $filepath)) {
                $filename = $filepath;
            }
        }

        //If file exists, this no is null
        if ($filename !== null &&  unlink($filename)) {
            return $app->json(["success" => true], 200);
        }

        // if file not found or no is deleted
        return $app->json(["success" => false], 404);
    }
}
