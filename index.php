<?php require "vendor/autoload.php";

use ToDo\Request;
use ToDo\Router;
//echo Request::uri();
require Router::load('routes.php')->direct(Request::uri()); ///meta klaida

