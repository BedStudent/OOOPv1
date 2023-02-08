<?php

use ToDo\Database;
use ToDo\Task;

$connect = Database::connect();
$task = new Task($connect);

require "views/pages/home.view.php";

