<?php
require_once realpath("vendor/autoload.php");
define( 'BASE_URL', "http://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']);

use App\Controllers\TodoController;
use App\Router;
use App\DB;

echo $_SERVER['REQUEST_URI'];

new Router;

?>
