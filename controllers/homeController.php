<?php

use ToDo\Database;

$connect = Database::connect();

require "views/pages/home.view.php";

