<?php

$router->define([
    '/'=>'controllers/homeController.php',
    '/add-task'=>'controllers/addTaskController.php',
    '404'=>'controllers/404Controller.php'
]);
