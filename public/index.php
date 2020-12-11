<?php
/**
 * Index Basicis App
 * PHP version 7
 *
 * @category Basicis/Core
 * @package  Basicis/Core
 * @author   Messias Dias <https://github.com/messiasdias> <messiasdias.ti@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/basicis/core
 */

use Basicis\Basicis as App;

$app = require_once "../bootstrap/app.php";

//Run App
if ($app instanceof App) {
    $app->run();
    exit;
}

echo "Error on Start Basicis application!";
