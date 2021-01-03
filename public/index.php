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

//Basicis $app configuration bootstrap
$app = require_once "../config/app-config.php";

//Run Basicis $app
if ($app instanceof Basicis\Basicis) {
    $app->run();
    exit;
}
echo "Error on Start Basicis application!";
