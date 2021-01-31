<?php
/**
 * Basicis Framework project index file
 * @category Basicis/Basicis
 * @package  Basicis/Basicis
 * @author   Messias Dias <https://github.com/messiasdias> <messiasdias.ti@gmail.com>
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/basicis/basicis
 */

//Basicis $app configuration and bootstrap
$app = require_once "../config/app-config.php";

//Run Basicis $app
if ($app instanceof Basicis\Basicis) {
    $app->run();
    exit;
}
exit("Error on Start Basicis framework application!");
